<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @if(!empty($getState()))
        <iframe class="w-full" src="{{ $getRoute(is_array($getState()) ? current($getState()) : $getState()) }}" style="min-height: {{ $getMinHeight() }};"></iframe>
    @elseif(!empty($getFileUrl()))
        <iframe class="w-full" src="{{ $getFileUrl() }}" style="min-height: {{ $getMinHeight() }};"></iframe>
    @endif
</x-dynamic-component>
