<?php

namespace Joaopaulolndev\FilamentPdfViewer\Commands;

use Illuminate\Console\Command;

class FilamentPdfViewerCommand extends Command
{
    public $signature = 'filament-pdf-viewer';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
