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

    public function getFileUrl(array|string|null $state = null): array|string|null
    {
        // Handle empty state
        if (empty($state)) {
            return is_array($this->fileUrl) ? array_map([$this, 'evaluate'], $this->fileUrl) : $this->evaluate($this->fileUrl);
        }

        // Convert single string to array for uniform processing
        $states = is_array($state) ? $state : [$state];

        $urls = [];

        foreach ($states as $singleState) {
            // Validate URL or data URL
            if ((filter_var($singleState, FILTER_VALIDATE_URL) !== false) || str($singleState)->startsWith('data:')) {
                $urls[] = $singleState;
                continue;
            }

            /** @var FilesystemAdapter $storage */
            $storage = $this->getDisk();

            if ($this->shouldCheckFileExistence()) {
                try {
                    if (! $storage->exists($singleState)) {
                        continue;
                    }
                } catch (UnableToCheckFileExistence $exception) {
                    continue;
                }
            }

            if ($this->getVisibility() === 'private') {
                try {
                    $urls[] = $storage->temporaryUrl(
                        $singleState,
                        now()->addMinutes(60),
                    );
                } catch (Throwable $exception) {
                    // Handle exception gracefully (e.g., log it)
                }
            } else {
                $urls[] = $storage->url($singleState);
            }
        }

        // Return the array of URLs if multiple, or the first URL if only one
        return count($urls) === 1 ? $urls[0] : $urls;
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
