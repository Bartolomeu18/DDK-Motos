@extends('layouts.Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-red-600 mb-6 text-center">Gestão de Motorizadas</h2>

    <!-- Barra de pesquisa -->
    <form method="GET" action="" class="mb-6">
        <div class="flex items-center space-x-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Buscar por modelo"
                   class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Buscar
            </button>
        </div>
    </form>

    <!-- Botão de novo usuário -->
    <div class="mb-4 text-right">
        <a href="{{route('motos.create')}}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Novo Moto
        </a>
    </div>

    <!-- Tabela de usuários -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
    <tr>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Modelo</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Marca</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Matrícula</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ano</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Cor</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Estado</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Motoqueiro</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ações</th>
    </tr>
</thead>
<tbody class="divide-y divide-gray-200">
    @forelse ($motos as $moto)
        <tr>
            <td class="px-6 py-4">{{ $moto->modelo }}</td>
            <td class="px-6 py-4">{{ $moto->marca }}</td>
            <td class="px-6 py-4">{{ $moto->matricula }}</td>
            <td class="px-6 py-4">{{ $moto->ano }}</td>
            <td class="px-6 py-4 capitalize">{{ $moto->cor }}</td>
            <td class="px-6 py-4 capitalize">{{ $moto->estado }}</td>
            <td class="px-6 py-4">
            {{ $moto->motoqueiro->name }}
            </td>
            <td class="px-6 py-4 space-x-2">
                <a href="{{ route('moto-editar',['id'=>$moto->id]) }}"
                   class="text-blue-600 hover:underline"><i class="fa-solid fa-pen-to-square" style="color: #0080ff;"></i></a>
                <form action="{{ route('moto-excluir', ['id' => $moto->id]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline"
                            onclick="return confirm('Tem certeza que deseja excluir esta moto?')">
                           <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="px-6 py-4 text-center text-gray-500">Nenhuma moto cadastrada.</td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>
</div>
@endsection