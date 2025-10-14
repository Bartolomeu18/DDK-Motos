@extends('layouts.Agente')

@section('content')
   <!-- Barra de pesquisa -->
    <form method="GET" action="" class="mb-6 mt-15 ">
        @csrf
        <div class="flex items-center space-x-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Buscar por nome ou email"
                   class="w-full px-4 py-2 border border-gray-200 shadow-md rounded-md focus:ring-blue-500 focus:border-blue-500">
            <button type="submit" class="bg-blue-600 text-white border border-blue-100 shadow-md px-4 py-2 roundedmd hover:bg-blue-700">
                Buscar
            </button>
        </div>
    </form>
        <!-- Botão de novo usuário -->
    <div class="mb-4 text-right">
        <a href="{{route('tela-cadastro')}}"
           class="bg-green-600 text-white px-4 py-2 my-2 border border-gray-200 shadow-md rounded-md hover:bg-green-700">
            + Novo Agente
        </a>
    </div>

    <!-- Tabela de usuários -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 scrollbar-hidden">
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
                    <tr class="text-gray-600 hover:bg-red-50">
                        <td class="px-6 py-4">{{ $usuario->name }}</td>
                        <td class="px-6 py-4">{{ $usuario->email }}</td>
                        <td class="px-6 py-4 capitalize">{{ $usuario->telefone }}</td>
                        <td class="px-6 py-4">{{ $usuario->bi_passaporte }}</td>
                        <td class="px-6 py-4 capitalize">{{ $usuario->endereco }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{route('editar-motoqueiro',['user'=>$usuario->id])}}"
                               class="text-blue-600 hover:underline"><i class="fa-solid fa-pen-to-square" style="color: #0080ff;"></i></a>
                            <form action="{{route('excluir-motoqueiro',['user'=>$usuario->id])}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
              
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection
