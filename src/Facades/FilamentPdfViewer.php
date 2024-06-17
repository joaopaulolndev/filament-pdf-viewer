<?php

namespace Joaopaulolndev\FilamentPdfViewer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Joaopaulolndev\FilamentPdfViewer\FilamentPdfViewer
 */
class FilamentPdfViewer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Joaopaulolndev\FilamentPdfViewer\FilamentPdfViewer::class;
    }
}
