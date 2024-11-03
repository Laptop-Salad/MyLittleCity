@props([
    'for',
    'label'
])

<div>
    <x-form.input-label :$for :value="$label" />
    {{$slot}}
    <x-form.input-error :messages="$errors->get($for)" class="mt-2" />

    @isset($help)
        <p class="text-xs text-muted">{{$help}}</p>
    @endisset
</div>
