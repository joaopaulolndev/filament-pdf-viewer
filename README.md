# Filament package to show pdf document viewer

[![Latest Version on Packagist](https://img.shields.io/packagist/v/joaopaulolndev/filament-pdf-viewer.svg?style=flat-square)](https://packagist.org/packages/joaopaulolndev/filament-pdf-viewer)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/joaopaulolndev/filament-pdf-viewer/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/joaopaulolndev/filament-pdf-viewer/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/joaopaulolndev/filament-pdf-viewer/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/joaopaulolndev/filament-pdf-viewer/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/joaopaulolndev/filament-pdf-viewer.svg?style=flat-square)](https://packagist.org/packages/joaopaulolndev/filament-pdf-viewer)

FilamentPHP package to show pdf documents with records saved in the database or show documents without a database in the form of your resource.
<div class="filament-hidden">

![Screenshot of Application Feature](https://raw.githubusercontent.com/joaopaulolndev/filament-pdf-viewer/main/art/joaopaulolndev-filament-pdf-viewer.jpg)

</div>

## Features & Screenshots

-   **Form Field:** Show a pdf document viewer in a form field.
-   **Infolist Entry:** Show a pdf document viewer in a infolist entry.
-   **Support**: [Laravel 11](https://laravel.com) and [Filament 3.x](https://filamentphp.com)

## Installation

You can install the package via composer:

```bash
composer require joaopaulolndev/filament-pdf-viewer
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-pdf-viewer-views"
```

## Usage in form field

```php
use Joaopaulolndev\FilamentPdfViewer\Forms\Components\PdfViewerField;

public static function form(Form $form): Form
{
    return $form
        ->schema([
            PdfViewerField::make('file')
                ->label('View the PDF')
                ->minHeight('40svh')
        ]);
}
```

## Usage in infolist entry

```php
use Joaopaulolndev\FilamentPdfViewer\Infolists\Components\PdfViewerEntry;

public static function infolist(Infolist $infolist): Infolist 
{
    return $infolist
        ->schema([
            PdfViewerEntry::make('file')
                ->label('View the PDF')
                ->minHeight('40svh')
        ]);
}
```

Optionally, you can use anothe methods to set the pdf viewer

```php
use Joaopaulolndev\FilamentPdfViewer\Infolists\Components\PdfViewerEntry;

public static function infolist(Infolist $infolist): Infolist 
{
    return $infolist
        ->schema([
            PdfViewerEntry::make('file')
                ->label('View the PDF')
                ->minHeight('40svh')
                ->fileUrl(Storage::url('dummy.pdf')) // Set the file url if you are getting a pdf without database
                ->columnSpanFull()
        ]);
}
``` 

Optionally, you can use section to set the pdf viewer

```php
use Joaopaulolndev\FilamentPdfViewer\Infolists\Components\PdfViewerEntry;

public static function infolist(Infolist $infolist): Infolist 
{
    return $infolist
        ->schema([
            \Filament\Infolists\Components\Section::make('PDF Viewer')
            ->description('Prevent the PDF from being downloaded')
            ->collapsible()
            ->schema([
                PdfViewerEntry::make('file')
                    ->label('View the PDF')
                    ->minHeight('40svh')
                    ->fileUrl(Storage::url('dummy.pdf')) // Set the file url if you are getting a pdf without database
                    ->columnSpanFull()
            ]);        
        ]);
}
``` 

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [João Paulo Leite Nascimento](https://github.com/joaopaulolndev)
- [Rômulo Ramos](https://github.com/rmsramos)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
