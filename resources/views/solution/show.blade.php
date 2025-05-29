<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solução') }}
        </h2>
    </x-slot>
    <div class="max-w-6xl mx-auto px-4 py-8 space-y-8">
        <!-- Título -->
        <h1 class="text-3xl font-bold">Título da solução</h1>

        <!-- Descrição -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Descrição da solução</h2>
            <p class="text-gray-700 leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus at quam tempor luctus.
                Integer luctus, mauris a luctus pretium, velit mauris pharetra sem, a cursus ex mi in mauris.
            </p>
        </div>

        <!-- Vídeos -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Vídeo</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @for ($i = 0; $i < 3; $i++)
                    <div class="bg-indigo-600 rounded-lg h-40 flex items-center justify-center text-white text-4xl">
                        ▶️
                    </div>
                @endfor
            </div>
        </div>

        <!-- Imagens -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Imagens</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @for ($i = 0; $i < 3; $i++)
                    <div class="bg-indigo-600 rounded-lg h-40 flex items-center justify-center text-white text-4xl">
                        🖼️
                    </div>
                @endfor
            </div>
        </div>

        <!-- Códigos -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Códigos</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @for ($i = 0; $i < 3; $i++)
                    <div class="bg-indigo-600 rounded-lg h-40 flex items-center justify-center text-white text-4xl">
                        < />
                    </div>
                @endfor
            </div>
        </div>

        <!-- Passo a passo -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Passo a passo</h2>
            <p class="bg-indigo-600 text-white rounded-lg p-4 leading-relaxed">
                1. Lorem ipsum dolor sit amet, consectetur.<br>
                2. Sed do eiusmod tempor incididunt ut labore.<br>
                3. Ut enim ad minim veniam.<br>
                4. Duis aute irure dolor in reprehenderit.
            </p>
        </div>
    </div>
</x-app-layout>
