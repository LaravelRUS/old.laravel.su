<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

class Preloader
{
    /**
     * @var int
     */
    private static int $count = 0;

    /**
     * @var array
     */
    private array $ignores = [];

    /**
     * @var array|string[]
     */
    private array $paths;

    /**
     * @var array
     */
    private array $fileMap;

    /**
     * Preloader constructor.
     *
     * @param string ...$paths
     */
    public function __construct(string ...$paths)
    {
        $this->paths = $paths;

        // We'll use composer's classmap
        // to easily find which classes to autoload,
        // based on their filename
        $classMap = require __DIR__ . '/vendor/composer/autoload_classmap.php';

        $this->fileMap = array_flip($classMap);
    }

    /**
     * @param string ...$paths
     * @return \App\Services\Preloader
     */
    public function paths(string ...$paths): Preloader
    {
        $this->paths = array_merge(
            $this->paths,
            $paths
        );

        return $this;
    }

    /**
     * @param string ...$names
     * @return Preloader
     */
    public function ignore(string ...$names): Preloader
    {
        $this->ignores = array_merge(
            $this->ignores,
            $names
        );

        return $this;
    }

    /**
     * @return void
     */
    public function load(): void
    {
        // We'll loop over all registered paths
        // and load them one by one
        foreach ($this->paths as $path) {
            $this->loadPath(rtrim($path, '/'));
        }

        $count = self::$count;

        echo "[Preloader] Preloaded {$count} classes" . PHP_EOL;
    }

    /**
     * @param string $path
     * @return void
     */
    private function loadPath(string $path): void
    {
        // If the current path is a directory,
        // we'll load all files in it
        if (is_dir($path)) {
            $this->loadDir($path);

            return;
        }

        // Otherwise we'll just load this one file
        $this->loadFile($path);
    }

    /**
     * @param string $path
     * @return void
     */
    private function loadDir(string $path): void
    {
        $handle = opendir($path);

        // We'll loop over all files and directories
        // in the current path,
        // and load them one by one
        while ($file = readdir($handle)) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }
            $this->loadPath("{$path}/{$file}");
        }

        closedir($handle);
    }

    /**
     * @param string $path
     * @return void
     */
    private function loadFile(string $path): void
    {
        // We resolve the classname from composer's autoload mapping
        $class = $this->fileMap[$path] ?? null;

        // And use it to make sure the class shouldn't be ignored
        if ($this->shouldIgnore($class)) {
            return;
        }

        // Finally we require the path,
        // causing all its dependencies to be loaded as well
        require_once $path;

        self::$count++;

        echo "[Preloader] Preloaded `{$class}`" . PHP_EOL;
    }

    /**
     * @param string|null $name
     * @return bool
     */
    private function shouldIgnore(?string $name): bool
    {
        if ($name === null) {
            return true;
        }

        foreach ($this->ignores as $ignore) {
            if (strpos($name, $ignore) === 0) {
                return true;
            }
        }

        return false;
    }
}


(new Preloader())
    ->paths(__DIR__ . '/vendor/laravel')
    ->ignore(
        \Illuminate\Filesystem\Cache::class,
        \Illuminate\Log\LogManager::class,
        \Illuminate\Http\Testing\File::class,
        \Illuminate\Http\UploadedFile::class,
        \Illuminate\Support\Carbon::class,
    )
    ->load();
