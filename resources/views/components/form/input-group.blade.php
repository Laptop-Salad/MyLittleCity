@props([
    'for',
    'label'
])

<x-form.input-label :$for :value="$label" />
{{$slot}}
<x-form.input-error :messages="$errors->get($for)" class="mt-2" />
