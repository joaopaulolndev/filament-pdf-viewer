<?php

namespace Joaopaulolndev\FilamentPdfViewer;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentPdfViewerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-pdf-viewer';

    public static string $viewNamespace = 'filament-pdf-viewer';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->askToStarRepoOnGitHub('joaopaulolndev/filament-pdf-viewer');
            });

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }
}
