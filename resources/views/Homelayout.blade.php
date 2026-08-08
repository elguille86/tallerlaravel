 
{{-- ('layouts.app') y  ('content') son directivas de Blade que se utilizan para definir una plantilla y una sección de contenido en una vista de Laravel.   --}}
@extends('layouts.app')
{{--  @section('title') ++  Esta es otro forma de definir el titulo de la pagina, en este caso se define el titulo de la pagina como "
    Aplicacion con Laravel 12 y Blade con Plantilla de Layout
@endsection --}}
@section('title','Aplicacion con Laravel 12 y Blade con Plantilla de Layout')
@push('css')
    <style>
        body {
            background-color: #c7dff5;
        }
    </style>
@endpush 
@push('css')
    <style>
        body {
            color: #6e2e2e;
        }
    </style>
@endpush 
@section('content')
    <div class="max-w-4xl mx-auto px-4">
         <x-alert type="danger"    class="mb-4">  
            <x-slot name="title">Titulo de la Alerta</x-slot>
            Contenido de la Alerta
        </x-alert>
        <p>Hola Mundo</p>
         <x-alert2 type="info"    class="mb-4">  
            <x-slot name="title">Titulo de la Alerta</x-slot>
            Contenido de la Alerta cona plantilla de Layout
        </x-alert2>        
    </div>
@endsection