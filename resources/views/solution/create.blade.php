@extends('layouts.app')

@section('title', 'Criar solução')
@section('content')
<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <form action="/solutions" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Título da solução</label>
            <input type="text" name="title" id="title"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>

        <div>
            <label for="code_snippet" class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" name="code_snippet" id="code_snippet"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700">ID do Usuário</label>
            <input type="number" name="user_id" id="user_id"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md transition">
                Enviar
            </button>
        </div>
    </form>
</div>
@endsection

