<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
    <nav class="bg-[#fef9c3]">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
          <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
              <!-- Mobile menu button-->
              <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <!--
                  Icon when menu is closed.

                  Menu open: "hidden", Menu closed: "block"
                -->
                <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!--
                  Icon when menu is open.

                  Menu open: "block", Menu closed: "hidden"
                -->
                <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="{{route('dashboard')}}" @class([
                            'rounded-md px-3 py-2 text-sm font-light',
                            'border border-gray-400' => request()->routeIs('dashboard')
                            ])>Home
                        </a>

                        @can('user_view')
                            <a href="{{route('users.index')}}" @class([
                                'rounded-md px-3 py-2 text-sm font-light',
                                'border border-gray-400' => request()->routeIs('users.*')
                            ])>Usuários
                            </a>
                        @endcan

                        @can('post_view')
                            <a href="{{route('posts.index')}}" @class([
                                'rounded-md px-3 py-2 text-sm font-light',
                                'border border-gray-400' => request()->routeIs('posts.*')
                            ])>Posts</a>
                        @endcan

                        @if(auth()->user()->hasRole("Super Admin"))
                            <a href="{{route('roles.index')}}" @class([
                                'rounded-md px-3 py-2 text-sm font-light',
                                'border border-gray-400' => request()->routeIs('roles.*')
                            ])>Funções</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <a
                    class="rounded-md px-3 py-2 text-sm font-medium"
                    href="{{route('logout')}}"
                    onclick="event.preventDefault();
                    document.getElementById('form-logout').submit()">Sair</a>
                <form action="{{route('logout')}}" method="POST" id="form-logout">
                    @csrf
                </form>
            </div>
          </div>
        </div>
      </nav>

    @yield('content')

    <script src="{{ url('resources/js/app.js') }}"></script>
</body>
</html>
