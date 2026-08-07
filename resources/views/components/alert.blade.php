<!-- las variables @props(['type']) se pasan al componente desde la vista principal -->
@props(['type' => 'info'])
@php
switch ($type) {
    case 'info':
        $class = 'text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400';
        break;
    case 'danger':
        $class = 'text-red-800  bg-red-50 dark:bg-gray-800 dark:text-red-400';
        break;
    case 'success':
        $class = 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400';
        break;
    case 'warning':
        $class = 'text-yellow-800 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300';
        break;
    case 'dark':
        $class = 'text-gray-800 bg-gray-50 dark:bg-gray-800 dark:text-gray-300';
        break;
    default:
        $class = 'text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400';
}
@endphp

<!-- <div class="p-4  text-sm rounded-lg {{ $class }}"  {{ $attributes }} role="alert"> -->
<!-- $attributes es una  variable que contiene todos los atributos que se pasan al componente desde la vista principal, 
        por ejemplo: class="mb-4" y se puede usar en el componente para agregar clases adicionales al div del componente.
    con el merge se convinarios las clase para que solo exista un solo class en css -->
<div {{ $attributes->merge(['class' => "p-4 text-sm rounded-lg {$class}" ]) }} role="alert"> 
    @php
     //<span class="font-medium">{{ $title }}</span> {{ $slot }} 
    @endphp
    <span class="font-semibold  ">{{ $title }}</span> {{ $slot }}
</div>