<?php

declare(strict_types=1);

namespace Database\Seeders;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Connection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DocsSeeder extends Seeder
{
    /**
     * @param Connection $conn
     */
    public function __construct(
        private readonly Connection $conn,
    ) {
    }

    /**
     * @return Generator
     */
    private function faker(): Generator
    {
        return Factory::create();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function run(): void
    {
        $faker = $this->faker();
        $query = $this->conn->query();

        /** @var object{id:int, default_page:string, menu_page:string} $version */
        foreach ($query->from('versions')->get() as $version) {
            $docs = $this->conn->table('docs');

            $docs->insert([
                'id' => (string)Uuid::uuid4(),
                'version_id' => $version->id,
                'urn' => $version->menu_page,
                'title' => $faker->text(random_int(10, 100)),
                'content_source' => $this->generateMenu($faker),
            ]);

            $docs->insert([
                'id' => (string)Uuid::uuid4(),
                'version_id' => $version->id,
                'urn' => $version->default_page,
                'title' => $faker->text(random_int(10, 100)),
                'content_source' => $this->generateContent($faker),
            ]);
        }
    }

    /**
     * @param Generator $faker
     * @return string
     * @throws \Exception
     */
    private function generateMenu(Generator $faker): string
    {
        return collect($faker->words(20))
            ->map(fn (string $word): string => random_int(0, 10)
                ? $this->generateMenuItem($word)
                : $this->generateMenuTitle($faker))
            ->prepend(sprintf('    - [Menu](/docs/{{version}}/documentation)'))
            ->prepend(sprintf('    - [Installation](/docs/{{version}}/installation)'))
            ->prepend($this->generateMenuTitle($faker))
            ->implode("\n");
    }

    /**
     * @param string $title
     * @return string
     * @throws \Exception
     */
    private function generateMenuItem(string $title): string
    {
        // Generate internal link
        if (\random_int(0, 10)) {
            return sprintf('    - [%s](/docs/{{version}}/%s)', Str::ucfirst($title), Str::slug($title));
        }

        // Generate external link
        return sprintf('    - [%s](/api/{{version}})', 'External ' . Str::ucfirst($title));
    }

    /**
     * @param Generator $faker
     * @return string
     * @throws \Exception
     */
    private function generateMenuTitle(Generator $faker): string
    {
        return \random_int(0, 3)
            ? '- ## ' . Str::ucfirst($faker->word)  // Modern (4.2+) format
            : '- ' . Str::ucfirst($faker->word);    // Legacy (4.0 and 4.1) format
    }

    /**
     * @param Generator $faker
     * @return string
     * @throws \Exception
     */
    private function generateContentMenu(Generator $faker): string
    {
        return collect($faker->words(random_int(10, 30)))
            ->map(fn (string $word, int $key): string => $key !== 0 && random_int(0, 10)
                ? sprintf('    - [%s](#%s)', Str::ucfirst($word), Str::slug($word))
                : sprintf('- [%s](#%s)', Str::ucfirst($word), Str::slug($word)))
            ->implode("\n");
    }

    /**
     * @param Generator $faker
     * @param int $level
     * @return string
     * @throws \Exception
     */
    private function generateTitle(Generator $faker, int $level = 1): string
    {
        return \str_repeat('#', $level) . ' ' . Str::ucfirst($faker->text(
            random_int(10, 100)
        ));
    }

    private function generateContentCode(Generator $faker): string
    {
        /** @var \Traversable<SplFileInfo> $contents */
        $contents = (new Finder())
            ->files()
            ->size('<0.5K')
            ->in([__DIR__ . '/../../app', __DIR__ . '/../../libs'])
        ;

        $code = ['', 'php', 'html', 'js', 'css', 'sql'];
        return \implode("\n", [
            '```' . collect($code)->random(),
            collect($contents)->random()->getContents(),
            '```',
        ]);
    }

    /**
     * @param Generator $faker
     * @return string
     * @throws \Exception
     */
    private function generateContent(Generator $faker): string
    {
        $result = [
            $this->generateTitle($faker),
            $this->generateContentMenu($faker),
            $this->generateTitle($faker, 2),
        ];

        for ($i = 0, $len = random_int(1, 50); $i < $len; ++$i) {
            if (!random_int(0, 5)) {
                $result[] = $this->generateTitle($faker, \random_int(2, 4));
            }

            if (!random_int(0, 5)) {
                $result[] = $this->generateContentCode($faker);
            }

            $result[] = $faker->text(random_int(100, 1000));
        }

        return \implode("\n\n", $result);
    }
}
