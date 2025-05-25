<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Resolve')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 min-h-screen">

    <header class="bg-white dark:bg-gray-800 shadow fixed w-full top-0 left-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-indigo-600">Resolve</h1>
            <nav class="space-x-4">
                <a href="{{ url('/') }}" class="text-gray-700 dark:text-gray-200 hover:text-indigo-500">Início</a>
                <a href="{{ url('/solutions') }}"
                    class="text-gray-700 dark:text-gray-200 hover:text-indigo-500">Soluções</a>
                <a href="{{ url('/solutions/create') }}"
                    class="text-gray-700 dark:text-gray-200 hover:text-indigo-500">Criar solução</a>
                <a href="{{ url('/tags') }}" class="text-gray-700 dark:text-gray-200 hover:text-indigo-500">Tags</a>
                <!-- Adicione mais links conforme necessário -->
            </nav>
        </div>
    </header>

    <main class="max-w-5xl mx-auto pt-16 px-4 py-8">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-gray-500 py-6">
        &copy; {{ date('Y') }} - Resolve. Todos os direitos reservados.
    </footer>

</body>

</html>
