<?php

namespace Joaopaulolndev\FilamentPdfViewer\Infolists\Components;

use Closure;
use Illuminate\Support\Facades\Storage;
use Filament\Infolists\Components\ViewEntry;

class PdfViewerEntry extends ViewEntry
{
    protected string $view = 'filament-pdf-viewer::filament.components.infolists.pdf-viewer-entry';

    protected string $minHeight = '50svh';

    protected string | Closure $fileUrl = '';
    
    public function minHeight(string $minHeight): self
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    public function getMinHeight(): string
    {
        return $this->minHeight;
    }

    public function fileUrl(string | Closure $fileUrl): self    
    {
        $this->fileUrl = $fileUrl;

        return $this;
    }

    public function getFileUrl(): string
    {
        return $this->evaluate($this->fileUrl);
    }

    public function getRoute(string $file)
    {
        if (Storage::disk('public')->exists($file)) {
            return Storage::url($file);
        }
    }
}
