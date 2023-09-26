<x-layout title="Editar série {{ $series->nome }}">
    <x-form :action="route('series.update', $series)" :nome="$series->nome" :update="true" />
</x-layout>
