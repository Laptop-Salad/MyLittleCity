@php($model = $attributes->wire('model')?->value)

<select
    {{$attributes}}
    name="{{$model}}"
    id="{{$model}}"
    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
>
    {{$slot}}
</select>
