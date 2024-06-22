<?php

namespace Joaopaulolndev\FilamentPdfViewer;

use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Joaopaulolndev\FilamentPdfViewer\Commands\FilamentPdfViewerCommand;
use Joaopaulolndev\FilamentPdfViewer\Testing\TestsFilamentPdfViewer;

class FilamentPdfViewerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-pdf-viewer';

    public static string $viewNamespace = 'filament-pdf-viewer';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('joaopaulolndev/filament-pdf-viewer');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // Testing
        Testable::mixin(new TestsFilamentPdfViewer());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'joaopaulolndev/filament-pdf-viewer';
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentPdfViewerCommand::class,
        ];
    }
}
