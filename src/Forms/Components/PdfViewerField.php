<?php

namespace Joaopaulolndev\FilamentPdfViewer\Forms\Components;

use Closure;
use Filament\Forms\Components\ViewField;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\UnableToCheckFileExistence;
use Throwable;

class PdfViewerField extends ViewField
{
    protected string $view = 'filament-pdf-viewer::filament.components.forms.pdf-viewer-field';

    protected string $minHeight = '50svh';

    protected string|Closure $fileUrl = '';

    protected string|Closure|null $disk = null;

    protected string|Closure $visibility = 'public';

    protected bool|Closure $shouldCheckFileExistence = true;

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

    public function fileUrl(string|Closure $fileUrl): self
    {
        $this->fileUrl = $fileUrl;

        return $this;
    }

    public function visibility(string|Closure $visibility): static
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getDisk(): Filesystem
    {
        return Storage::disk($this->getDiskName());
    }

    public function getDiskName(): string
    {
        return $this->evaluate($this->disk) ?? config('filament.default_filesystem_disk');
    }

    public function getFileUrl(?string $state = null): string
    {
        if (empty($state)) {
            return $this->evaluate($this->fileUrl);
        }

        if ((filter_var($state, FILTER_VALIDATE_URL) !== false) || str($state)->startsWith('data:')) {
            return $state;
        }

        /** @var FilesystemAdapter $storage */
        $storage = $this->getDisk();

        if ($this->shouldCheckFileExistence()) {
            try {
                if (! $storage->exists($state)) {
                    return null;
                }
            } catch (UnableToCheckFileExistence $exception) {
                return null;
            }
        }

        if ($this->getVisibility() === 'private') {
            try {
                return $storage->temporaryUrl(
                    $state,
                    now()->addMinutes(60),
                );
            } catch (Throwable $exception) {
                // This driver does not support creating temporary URLs.
            }
        }

        return $storage->url($state);
    }

    public function getVisibility(): string
    {
        return $this->evaluate($this->visibility);
    }

    public function checkFileExistence(bool|Closure $condition = true): static
    {
        $this->shouldCheckFileExistence = $condition;

        return $this;
    }

    public function shouldCheckFileExistence(): bool
    {
        return (bool) $this->evaluate($this->shouldCheckFileExistence);
    }

    /**
     * @return null|string|void
     */
    public function getRoute(string $file)
    {
        return $this->getFileUrl($file);
    }
}
