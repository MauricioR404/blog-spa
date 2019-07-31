
@extends('layout.layout')

@section('content')

    <!-- Nos ayuda a forzar el renderizado para que actualice la pagina -->
    <transition name="fade" mode="out-in">
        <router-view :key="$route.fullPath"></router-view>>
    </transition>
@endsection

@push('styles')
    <style>
        .fade-enter-active, .fade-leave-active {
            transition: opacity .5s;
        }
        .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
            opacity: 0;
        }
    </style>
@endpush