<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @if(!empty($getState()) && is_array($getState()))
        @foreach ($getState() as $state)
            <iframe
                class="w-full"
                src="{{ $getRoute($state) }}" style="min-height: {{ $getMinHeight() }};">
            </iframe>
        @endforeach
    @elseif(!empty($getFileUrl()) && is_array($getFileUrl()))
        @foreach ($getFileUrl() as $fileUrl)
            <iframe
                class="w-full"
                src="{{ $fileUrl }}" style="min-height: {{ $getMinHeight() }};">
            </iframe>
        @endforeach
    @elseif(!empty($getState()))
        <iframe
            class="w-full"
            src="{{ $getRoute($getState()) }}" style="min-height: {{ $getMinHeight() }};">
        </iframe>
    @elseif(!empty($getFileUrl()))
        <iframe
            class="w-full"
            src="{{ $getFileUrl() }}" style="min-height: {{ $getMinHeight() }};">
        </iframe>
    @endif
</x-dynamic-component>
