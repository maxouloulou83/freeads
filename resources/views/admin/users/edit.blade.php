@extends('layouts.app')

@section('content')

    <div class="bg-gray-600">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
                <div>

                    <h2 class="text-white">
                        EDIT {{$user->name}}
                    </h2>

                    <div>
                        <form action="{{ route('admin.users.edit.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <label for="name" class="block text-sm font-medium text-gray-700">name</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" value="{{ $user->name }}" class="shadow-sm focus:ring-gray-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="maxouloulou">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1">
                                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com">
                                </div>
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">password</label>
                                <div class="mt-1">
                                    <input type="text" name="password" id="password" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="*********">
                                </div>
                            </div>

                            <div class="w-0 flex-1 flex items-center">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </div>

                            <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                                <button type="submit" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-grey-600 bg-white hover:bg-gray-50">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
