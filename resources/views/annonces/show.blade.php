@extends('layouts.app')

@section('content')
    {{--    @dump($annonce)--}}
    <div class="flex justify-center">
        <div class="max-w-xs my-10 mr-0 overflow-hidden bg-white rounded-lg shadow-xl md:mr-4">
            <div class="px-4 py-2">
                <h1 class="text-xl font-bold text-gray-900 uppercase">{{ $annonce->title }}</h1>
                <p class="mt-2 text-sm text-gray-600">{!! $annonce->description !!}</p>
            </div>
            <img class="object-cover w-full h-56 mt-2" src="{{ $annonce->image }}" alt="{{ $annonce->title }}">
            <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
                <h1 class="text-xl font-bold text-gray-200">{{ $annonce->getPrice() }}</h1>
            </div>
        </div>
    </div>
@endsection
