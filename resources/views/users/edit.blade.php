@extends('layouts.template')

@section('content')

<div class="lg:flex p-10 lg:items-center lg:justify-between">
    <div class="min-w-0 flex-1 flex justify-between">
        <h2 class="text-2xl font-bold leading-7 text-red-900 sm:truncate sm:text-3xl sm:tracking-tight">Back End Developer</h2>
        <a href="{{route('users.index')}}" type="button" class="inline-flex items-center rounded-md bg-red-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
            Voltar
        </a>
    </div>
</div>

<div class="p-4">
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="border p-8 rounded shadow">
        @csrf
        @method("PUT")
        <div class="grid gap-2 grid-cols-2">
            <div class="mb-3">
                <label for="name" class="block text-sm text-gray-600">Nome</label>
                <input type="text" value="{{$user->name}}" id="name" name="name" class="w-full px-4 py-2 font-light rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-500 shadow">
            </div>
            @error('name')
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <div class="mb-3">
                <label for="email" class="block text-sm text-gray-600">E-mail</label>
                <input type="email" value="{{$user->email}}" id="email" name="email" class="w-full px-4 py-2 font-light rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-500 shadow">
            </div>
            @error('email')
               <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>
        <div class="grid gap-2 grid-cols-2">
            <div class="mb-3">
                <label for="password" class="block text-sm text-gray-600">Senha</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 font-light rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-500 shadow">
            </div>
            @error('password')
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <div class="mb-3">
                <label for="password_confirmation" class="block text-sm text-gray-600">Confirmar senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 font-light rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-500 shadow">
            </div>
        </div>
        <div class="mb-3">
            <label for="role_id" class="block text-sm text-gray-600">Permissõe</label>
            <select type="text" id="role_id" name="role_id" class="w-full px-4 py-2 font-light rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-500 shadow">
                <option value="">Selecione</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}" @selected($role->role_id == $role->id)>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex">
            <button type="submit" type="button" class="inline-flex items-center rounded-md bg-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Atualizar
            </button>
        </div>
    </form>
</div>

@endsection


