<?php

namespace Joaopaulolndev\FilamentPdfViewer\Forms\Components;

use Filament\Forms\Components\ViewField;
use Illuminate\Support\Facades\Storage;

class PdfViewerField extends ViewField
{
    protected string $view = 'filament-pdf-viewer::filament.components.forms.pdf-viewer-field';

    protected string $minHeight = '50svh';

    protected string $fileUrl = '';

    protected function setUp(): void
    {
        parent::setUp();

        $this->hidden(fn (string $context): bool => $context === 'create');
    }

    public function minHeight(string $minHeight): self
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    public function getMinHeight(): string
    {
        return $this->minHeight;
    }

    public function fileUrl(string $fileUrl): self
    {
        $this->fileUrl = $fileUrl;

        return $this;
    }

    public function getFileUrl(): string
    {
        return $this->fileUrl;
    }

    /**
     * @param string $file
     *
     * @return null|string|void
     */
    public function getRoute(string $file)
    {
        if (Storage::disk('public')->exists($file)) {
            return Storage::url($file);
        }
    }
}
