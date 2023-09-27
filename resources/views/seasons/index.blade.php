<x-layout title="Temporadas">
    <ul class="list-group">
        @if ($seasons !== null)
            <h1>{{ gettype($seasons) }}</h1>
        @endif
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Temporada {{ $season->number }}

                <span class="badge bg-secondary">
                    {{ $season->episodes()->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
