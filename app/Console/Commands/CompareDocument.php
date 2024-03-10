<?php

namespace App\Console\Commands;

use App\Docs;
use Illuminate\Console\Command;

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
    protected $description = 'Compare Russian and English documentation to find the discrepancies.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Iterate through supported versions of documentation
        collect(Docs::SUPPORT_VERSIONS)
            ->each(fn (string $version) => $this->updateVersion($version));
    }

    /**
     * Update the specified version of documentation.
     *
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
                // Log a warning if an error occurs during update
                $this->warn("Failed to update document: {$exception->getMessage()} {$exception->getFile()} {$exception->getLine()}");
            }
        });
    }
}
