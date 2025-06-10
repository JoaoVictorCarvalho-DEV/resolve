<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar código') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md text-black">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-400 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('codeSnippets.update', $codeSnippet->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Título do código</label>
                <input type="text" name="title" value="{{ $codeSnippet->title }}" id="title"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="code" class="block text-sm font-medium text-gray-700">Código</label>
                <textarea name="code" id="code" rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" >{{ $codeSnippet->code }}</textarea>
            </div>
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md transition">
                    Enviar
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
