<x-layout>

    <x-slot:heading>
        LiteralGallery
    </x-slot:heading>

    <h2 class="font-bold text-lg">Welcome to the Gallery.</h2>
    <p>Some description.</p>
    <br>


    <div class="space-y-2">
        @foreach ($artworks as $artwork)
            <a href="/artwork/{{$artwork['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{$artwork->collection->name}}</div>
                <div>
                    <b>{{ $artwork['id']}} -</b> <span>{{ $artwork['name']}}</span>
                </div>
            </a>
        @endforeach

<div>
    {{$artworks->links()}}
</div>

    </div>

</x-layout>