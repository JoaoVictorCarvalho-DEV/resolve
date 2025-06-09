<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solução') }}
        </h2>
    </x-slot>
    <div class="max-w-6xl mx-auto px-4 py-8 space-y-8">
        <!-- Título -->
        <h1 class="text-3xl font-bold">{{ $solution->title }}</h1>

        <!-- Descrição -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Descrição da solução</h2>
            <p class="text-gray-700 leading-relaxed">
                {{ $solution->description }}
            </p>
        </div>

        <!-- Vídeos -->
        @if ($solution->videos->isNotEmpty())
            <div>
                <h2 class="text-lg font-semibold mb-4">Vídeos</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($solution->videos as $video)
                        <div>
                            <h5>{{ $video->title }}</h5>
                            <div
                                class="bg-indigo-600 rounded-lg h-max flex items-center justify-center text-white text-4xl p-4">
                                <video width="320" height="240" controls>
                                    <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                                    Seu navegador não suporta vídeos
                                </video>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($solution->pictures->isNotEmpty())
            <!-- Imagens -->
            <div>
                <h2 class="text-lg font-semibold mb-4">Imagens</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($solution->pictures as $picture)
                        <div>
                            <h3>{{ $picture->title }}</h3>
                            <div
                                class="bg-indigo-600 rounded-lg flex items-center justify-center text-white text-4xl p-4">
                                <img src="{{ asset('storage/' . $picture->path) }}" alt="Imagem da solução">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <!-- Códigos -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Códigos</h2>
            <div class="grid grid-cols-1 gap-4">
                @foreach ($solution->codeSnippets as $snippet)
                    <div>
                        <h5 class="mt-4">{{ $snippet->title }}</h5>
                        <pre><code class="language-php">{{ $snippet->code }}</code></pre>
                    </div>
                @endforeach
            </div>
        </div>


        @if ($solution->comments->isNotEmpty())
            <!-- Seção de Comentários -->
            <div class="mt-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">Comentários
                    ({{ $solution->comments->count() }})</h2>

                <div class="space-y-4 mb-6">
                    @foreach ($solution->comments as $comment)
                        <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                            <div class="flex items-start space-x-3 gap-3">

                                <div class="mr-23">
                                    <div
                                        class="rounded-full h-7 w-7 bg-indigo-600 flex items-center justify-center p-2 text-white font-bold">
                                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                    </div>
                                </div>

                                <div class="flex-1 mx-2 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $comment->user->name }}
                                        </p>
                                        <span class="text-xs text-gray-500">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-700 whitespace-pre-line">
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif

        <!-- Formulário de Novo Comentário -->
        <div class="mt-6 border-t border-gray-200 pt-6">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="solution_id" value="{{ $solution->id }}">

                <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">
                    Adicionar comentário
                </label>
                <div class="flex space-x-2">
                    <textarea id="comment" name="comment" rows="3" required
                        class="flex-1 block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Escreva seu comentário..."></textarea>

                    <button type="submit"
                        class="self-end bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition h-min">
                        Enviar
                    </button>
                </div>
            </form>
        </div>


    </div>

</x-app-layout>
