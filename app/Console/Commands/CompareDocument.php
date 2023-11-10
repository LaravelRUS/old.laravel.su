<?php

namespace App\Console\Commands;

use App\Docs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CompareDocument extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:compare-document';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        collect(Docs::SUPPORT_VERSION)->each(fn(string $version) => $this->updateVersion($version));
    }

    /**
     * @param string $version
     *
     * @return void
     */
    protected function updateVersion(string $version): void
    {
        Docs::every($version)->each(function (Docs $docs) {
            try {
                $docs->update();
            } catch (\Exception $exception) {
                $this->warn($exception->getMessage());
            }
        });
    }
}
