@props(['label', 'name','checked'])

@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'checked' => $checked

    ];
@endphp

<x-forms.field :$label :$name>
    <div class="rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full">
        <input {{ $attributes($defaults) }}>
        <span class="pl-1">{{ $label }}</span>
    </div>
</x-forms.field>

