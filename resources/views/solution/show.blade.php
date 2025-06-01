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
        @if (!empty($solution->videos->isNotEmpty()))
            <div>
                <h2 class="text-lg font-semibold mb-4">Vídeos</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($solution->videos as $video)
                        <div>
                            {{ $video->title }}
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

        @if (!empty($solution->pictures->isNotEmpty()))
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
                    <h3 class="font-bold text-lg mt-4">{{ $snippet->title }}</h3>
                    <pre><code class="language-php">{{ $snippet->code }}</code></pre>
                @endforeach
            </div>
        </div>

    </div>

</x-app-layout>
