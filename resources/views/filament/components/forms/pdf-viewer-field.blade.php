@php
    use Filament\Support\Facades\FilamentView;

    $hasInlineLabel = $hasInlineLabel();
    $statePath = $getStatePath();
    $fileUrls = $getFileUrl($getState());
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
    :has-inline-label="$hasInlineLabel"
>
    <x-slot
        name="label"
        @class([
            'sm:mt-1.5' => $hasInlineLabel,
        ])
    >
        {{ $getLabel() }}
    </x-slot>

    <x-filament::input.wrapper
        :attributes="
            \Filament\Support\prepare_inherited_attributes($getExtraAttributeBag())
                ->class(['fi-fo-textarea overflow-hidden bg-transparent'])
        "
    >
        @if (is_array($fileUrls))
            @foreach($fileUrls as $fileUrl)
                <iframe
                    class="w-full"
                src="{{ $fileUrl }}" style="min-height: {{ $getMinHeight() }};">
                </iframe>
            @endforeach
        @elseif($fileUrls)
            <iframe
                class="w-full"
                src="{{ $fileUrls }}" style="min-height: {{ $getMinHeight() }};">
            </iframe>
        @endif
    </x-filament::input.wrapper>
</x-dynamic-component>
