@php
    $classes = 'bg-white/5 p-4 rounded-xl border border-transparent hover:border-blue-700 group';
@endphp

<div {{ $attributes(['class'=>$classes])}}>
    {{$slot}}
</div>
