@props(['method' => 'GET', 'action' => '#'])

@php
    $formMethod = strtoupper($method);
    $spoofedMethod = in_array($formMethod, ['PUT', 'PATCH', 'DELETE']);
@endphp

<form
    method="{{ $spoofedMethod ? 'POST' : $formMethod }}"
    action="{{ $action }}"
    {{ $attributes->merge(['class' => 'max-w-2xl mx-auto space-y-6']) }}
    enctype="{{ $attributes->get('enctype', 'application/x-www-form-urlencoded') }}"
>
    @if($spoofedMethod)
        @csrf
        @method($formMethod)
    @elseif($formMethod !== 'GET')
        @csrf
    @endif

    {{ $slot }}
</form>
