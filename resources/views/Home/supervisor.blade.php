<x-app-layout>
    <x-slot name="header">
        <link rel="icon" type="image/png" href="{{ asset('lifav.png') }}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome .. <b>{{Auth::user()->name}}</b>
        </h2>
    </x-slot>
    <h1>Supervisors</h1>
</x-app-layout>
