@php
    $classes = 'bg-white/5 p-4 rounded-xl border border-transparent hover:border-blue-700 transition-colors duration-1000 group';
@endphp

<div {{ $attributes(['class'=>$classes])}}>
    {{$slot}}
</div>
