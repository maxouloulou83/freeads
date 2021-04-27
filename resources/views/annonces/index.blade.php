@extends('layouts.app')

@section('content')


    <div class="relative mt-6 max-w-lg mx-auto">
        <span class="absolute inset-y-0 left-0 pl-3 flex justify-items-end">
            @include('recherche.search')
        </span>
    </div>


    <div class="container mx-auto px-6">
        <h3 class="text-gray-700 text-2xl font-medium">Petites annonces de Maxouloulou</h3>
            <button type="button" class="focus:outline-none text-gray-800 text-sm py-2.5 px-5 rounded-full border border-gray-800 hover:bg-gray-200">
                <a href="{{ route('annonce.create.show') }}">Create</a>
            </button>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">

                    @foreach($annonces as $annonce)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style=background-image:url("{{ $annonce->image }}")>
                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <a href="{{ route('annonce.show', ['id' => $annonce->id]) }}"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg></a>
                            </button>
                        </div>
                        <div class="px-5 py-3">
                            <div class="text-gray-700 uppercase">{{ $annonce->title }}</div>
                            <span class="text-gray-500 mt-2">{{ $annonce->getPrice() }}</span>
                        </div>
                        @if(auth()->check() && auth()->user()->id === $annonce->user_id)
                        {{--si t'es authentifié et que l'authentifié "id" est le même que le gars qui
                        a crée l'annonce alors c'est bon--}}
                            <button class="">
                                <a href="{{ route('annonce.delete', ['id' => $annonce->id]) }}">Delete</a>
                            </button>

                            <button class="">
                                <a href="{{ route('annonce.edit', ['id' => $annonce->id]) }}">Edit</a>
                            </button>


                        @endif
                    </div>
                @endforeach
        </div>
    </div>

@endsection
