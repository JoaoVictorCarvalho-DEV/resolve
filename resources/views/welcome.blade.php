<x-guest-layout>
    <div class="flex flex-col items-center justify-center text-indigo-700 py-3">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Bem-vindo ao Resolve</h1>
            <p class="text-lg md:text-xl mb-8">Tem um problema? Talvez alguém já tenha o tido! Vem e Resolve.</p>
            <a href="{{ route('solutions.index') }}" class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-gray-100 transition">
                Começar agora
            </a>
        </div>
    </div>
</x-guest-layout>
