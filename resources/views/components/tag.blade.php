@props(['tag','size' => 'base'])

@php

    $classes = "font-bold bg-white/10 hover:bg-white/25 rounded-xl transition-colors duration-200";

    if($size === 'small') {
        $classes .= ' text-xs px-3 py-1';
    } elseif($size === 'base') {
        $classes .= ' text-sm px-5 py-2';
    }
@endphp
<a href="/pixel-positions/public/tags/{{strtolower($tag->name)}}"
   class="{{$classes}}">{{$tag->name}}</a>
