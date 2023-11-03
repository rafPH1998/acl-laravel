@extends('layouts.template')

@section('content')

<div class="lg:flex p-10 lg:items-center lg:justify-between">
    <div class="min-w-0 flex-1 flex justify-between">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Funções</h2>
        <a href="{{route('roles.create')}}" type="button" class="inline-flex items-center rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
            Cadastrar permissão
        </a>
    </div>
</div>

<div class="overflow-x-auto p-10">
    <table class="min-w-full shadow-lg mt-2 border">
        <thead class="bg-white border-b">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-2 md:px-6 md:py-4 text-left">#</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-2 md:px-6 md:py-4 text-left">NOME</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr
                    class="transition duration-300 ease-in-out rounded-md bg-white hover:bg-gray-100">
                    <td class="px-3 py-2 md:px-6 md:py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$role->id}}</td>
                    <td class="text-sm text-gray-900 font-light px-3 py-2 md:px-6 md:py-4 whitespace-nowrap">
                        {{$role->name}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-3 py-2 md:px-6 md:py-4 whitespace-nowrap">
                        <div class="flex">
                            <a href="{{route('roles.permissions.index', $role->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" stroke="currentColor" class="w-5 h-5 stroke-yellow-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </a>
                            <a href="{{route('roles.edit', $role->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                            </a>
                            <a href="{{ route('roles.destroy', $role->id) }}"
                                onclick="event.preventDefault(); document.getElementById('form-delete-{{ $role->id }}').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-gray-500 w-5 h-5 cursor-pointer stroke-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667" />
                                </svg>
                            </a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" id="form-delete-{{ $role->id }}" style="display: none;">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$roles->links()}}
</div>


@endsection
