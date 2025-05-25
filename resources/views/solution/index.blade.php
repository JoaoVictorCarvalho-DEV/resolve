@extends('layouts.app')

@section('title', 'Soluções')

@section('content')
    <h1 class='text-xl font-semibold text-indigo-600 mb-2'>
        Todas as soluções
    </h1>

    <div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6'>
        @foreach ($solutions as $solution)
            <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition align-middle">
                <h3 class="text-lg font-semibold text-indigo-600 mb-2">{{ $solution->title }}</h3>
                <p class="text-gray-700 mb-4 line-clamp-3">{{ $solution->description }}</p>

                <div class="text-sm text-gray-500 mb-2">
                    Criado por: {{ $solution->user->name ?? 'Desconhecido' }}
                </div>

                <div class='grid grid-cols-2 gap-5'>
                    <a href="{{ route('solutions.show', $solution) }}"
                        class="inline-block bg-indigo-500 text-white text-sm px-4 py-2 rounded hover:bg-indigo-600 transition">
                        Ver detalhes
                    </a>
                    <a href="{{ route('solutions.edit', $solution) }}"
                        class="inline-block bg-orange-500 text-white text-sm px-4 py-2 rounded hover:bg-orange-600 transition">
                        Editar
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
