@extends('layouts.app')

@section('content')

    @if(auth()->check() && auth()->user()->is_admin)
        <div class="pt-3 flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-storme-secondary sm:rounded-lg">
                        <table class="min-w-full divide-y divide-storme-secondary">
                            <thead class="bg-storme-primary">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th><th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-storme-primary divide-y divide-storme-secondary">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-700">
                                            {{ $user->id ?? 'No ID' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}"
                                           class="text-storme-orange hover:text-orange-600">
                                            delete
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                           class="text-storme-orange hover:text-orange-600">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                {{ $users->links()}}
            </div>
        </div>
    @else
        c'est pas toi qui decide
    @endif

@endsection
