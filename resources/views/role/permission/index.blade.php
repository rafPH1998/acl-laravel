@extends('layouts.template')

@section('content')

<div class="lg:flex p-10 lg:items-center lg:justify-between">
    <div class="min-w-0 flex-1 flex justify-between">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Permissões</h2>
    </div>
    <a href="{{route('roles.index')}}" type="button" class="inline-flex items-center rounded-md bg-red-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
        Voltar
    </a>
</div>

<div class="flex px-4 flex-col mt-6 container mx-auto">
    <form action="{{route('roles.permissions.store', $role->id)}}" method="POST">
        @csrf
        @foreach ($permissions as $p)
            <div class="relative flex gap-x-3">
                <div class="flex h-6 items-center">
                    <input
                        id="permissions.{{$p->id}}"
                        name="permissions[{{$p->id}}]"
                        type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 cursor-pointer"
                        @checked($role->permissions->contains($p->id))
                        >
                </div>
                <div class="text-sm leading-6">
                    <label for="permissions.{{$p->id}}" class="font-medium text-gray-900">{{$p->label}}</label>
                </div>
            </div>
        @endforeach
        <button type="submit" type="button" class="mt-6 inline-flex items-center rounded-md bg-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
            Salvar
        </button>
    </form>
</div>

@endsection
