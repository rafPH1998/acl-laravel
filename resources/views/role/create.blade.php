@extends('layouts.template')

@section('content')

<div class="lg:flex p-10 lg:items-center lg:justify-between">
    <div class="min-w-0 flex-1 flex justify-between">
        <h2 class="text-2xl font-bold leading-7 text-red-900 sm:truncate sm:text-3xl sm:tracking-tight">Cadastrar uma nova permissão</h2>
        <a href="{{route('roles.index')}}" type="button" class="inline-flex items-center rounded-md bg-red-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
            Voltar
        </a>
    </div>
</div>

<div class="p-4">
    <form action="{{ route('roles.store') }}" method="POST" class="border p-8 rounded shadow">
        @csrf
        <div class="grid gap-2  grid-cols-1">
            <div class="mb-3">
                <label for="name" class="block text-sm text-gray-600">Nome</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 font-light rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-500 shadow" required>
            </div>
        </div>
        <div class="flex">
            <button type="submit" type="button" class="inline-flex items-center rounded-md bg-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Cadastrar
            </button>
        </div>
    </form>
</div>

@endsection


