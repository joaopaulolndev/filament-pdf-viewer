<span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
    {{ $getLabel() }}
</span>

@if(!empty($getState()))
    <iframe src="{{ $getRoute(current($getState())) }}" style="min-height: {{ $getMinHeight() }};min-width: {{ $getMinWidth() }}"></iframe>
@elseif(!empty($getFileUrl()))
    <iframe src="{{ $getFileUrl() }}" style="min-height: {{ $getMinHeight() }};min-width: {{ $getMinWidth() }}"></iframe>
@endif
