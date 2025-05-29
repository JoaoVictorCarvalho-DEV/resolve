<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar solução') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md text-black">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('solutions.store') }}" method="POST" class="space-y-4" id="solution-form">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Título da solução</label>
                <input type="text" name="title" id="title" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea name="description" id="description" rows="4" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Campo oculto para user_id (pegará do usuário autenticado) -->
            {{-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> --}}

            <!-- Seção de Code Snippets -->
            <div class="space-y-4" id="code-snippets-container">
                <div class="flex justify-between items-center">
                    <label class="block text-sm font-medium text-gray-700">Blocos de Código</label>
                    <button type="button" onclick="addCodeSnippet()"
                        class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                        + Adicionar Bloco
                    </button>
                </div>

                <!-- Primeiro bloco de código -->
                <div class="code-snippet-group border border-gray-200 p-4 rounded-lg">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Título do Bloco</label>
                        <input type="text" name="code_snippets[0][title]" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Código</label>
                        <textarea name="code_snippets[0][code]" rows="4" required
                            class="mt-1 block w-full font-mono text-sm border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md transition">
                    Enviar
                </button>
            </div>
        </form>
    </div>

    <script>
        let snippetCounter = 1;

        function addCodeSnippet() {
            const container = document.getElementById('code-snippets-container');
            const newSnippet = document.createElement('div');
            newSnippet.className = 'code-snippet-group border border-gray-200 p-4 rounded-lg mt-4';
            newSnippet.innerHTML = `
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Título do Bloco</label>
                    <input type="text" name="code_snippets[${snippetCounter}][title]" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Código</label>
                    <textarea name="code_snippets[${snippetCounter}][code]" rows="4" required
                        class="mt-1 block w-full font-mono text-sm border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>
                <button type="button" onclick="removeCodeSnippet(this)" class="mt-2 text-red-600 hover:text-red-800 text-sm">
                    Remover Bloco
                </button>
            `;
            container.appendChild(newSnippet);
            snippetCounter++;
        }

        function removeCodeSnippet(button) {
            snippetCounter--;
            // Não permitir remover o último bloco
            if (document.querySelectorAll('.code-snippet-group').length > 1) {
                button.closest('.code-snippet-group').remove();
            } else {
                alert('Você precisa ter pelo menos um bloco de código.');
            }
        }
    </script>
</x-app-layout>
