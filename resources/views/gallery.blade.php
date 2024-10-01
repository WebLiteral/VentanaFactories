<x-layout>

    <x-slot:heading>
        LiteralGallery
    </x-slot:heading>

    <ul>
        @foreach ($artworks as $artwork)
            <a href="/artwork/{{$artwork['id']}}">
                <li>{{ $artwork['title']}} : {{ $artwork['id']}} </li>
            </a>
        @endforeach
    </ul>

</x-layout>