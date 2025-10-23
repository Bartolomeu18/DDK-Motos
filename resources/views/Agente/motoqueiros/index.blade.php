@extends('layouts.agente')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-4">
    <h2 class="text-2xl font-bold text-red-600 mb-5 text-left ">Gestão de Motoqueiros</h2>

    <!-- Barra de pesquisa -->
    <form method="GET" action="" class="mb-6">
        @csrf
        <div class="flex items-center space-x-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Buscar por nome ou email"
                   class="w-full px-4 py-2 border border-gray-200 shadow-lg rounded-md focus:ring-blue-500 focus:border-blue-500">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 shadow-lg shadow-gray-400 rounded hover:bg-blue-700">
                Buscar
            </button>
        </div>
    </form>

    <!-- Botão de novo usuário -->
    <div class="mb-4 text-right">
        <a href="{{route('motoqueiros.create')}}"
           class="bg-green-600 text-white px-4 py-2 rounded  shadow-lg shadow-gray-400 hover:bg-green-700">
            + Novo Usuário
        </a>
    </div>

    <!-- Tabela de usuários -->
    <div class="overflow-x-auto bg-white shadow-2xl rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 py-2">
            <thead class="bg-red-500">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Nome</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Email</th> 
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Telefone</th>                    
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Bilhete de Identidade</th>                   
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Endereço</th> 
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse  ($usuarios as $usuario)
                    <tr class="hover:bg-red-50 text-gray-600">
                        <td class="px-6 py-4">{{ $usuario->name }}</td>
                        <td class="px-6 py-4">{{ $usuario->email }}</td>
                        <td class="px-6 py-4 capitalize">{{ $usuario->telefone }}</td>
                        <td class="px-6 py-4">{{ $usuario->bi_passaporte }}</td>
                        <td class="px-6 py-4 capitalize">{{ $usuario->endereco }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{route('editar-motoqueiro',['user'=>$usuario->id])}}"
                               class="text-blue-600 hover:underline"><i class="fa-solid fa-pen-to-square" style="color: #0080ff;"></i></a>
                     <!--       <form action="{{route('excluir-motoqueiro',['user'=>$usuario->id])}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                       <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                </button>
                            </form>-->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum usuário encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection