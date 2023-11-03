<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Login</title>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col justify-center">
        <form action="{{ route('login') }}" method="post" class="p-14 bg-white max-w-sm mx-auto rounded-xl shadow-xl overflow-hidden space-y-10 mt-10 relative">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-600">E-mail</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 font-light rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-500 shadow" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-600">Senha</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 font-light rounded-lg focus:outline-none focus:ring-1 focus:ring-yellow-500 shadow" required>
            </div>
            <div class="flex">
                <button type="submit" class="mt-4 text-white font-bold rounded-full text-xs px-2 py-1 bg-blue-700 hover:bg-blue-800 mr-2">
                    Entrar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
