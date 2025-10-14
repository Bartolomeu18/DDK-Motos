@extends('layouts.agente')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 ">
    <div class=" flex justify-around  gap-10">
    <div class="bg-blue-600 rounded-md p-11 w-2/3 text-white text-md font-bold shadow-lg shadow-gray-400">
        <h2>{{$motoqueiros }}  Motoqueiros</h2>
    </div>
    <div class="bg-red-600 rounded-md p-11 w-2/3 text-white text-md font-bold  shadow-lg shadow-gray-400">
        <h2>{{$motorizadas}}  Motorizadas</h2>
    </div>
    </div>
    <!-- Tabela de usuários -->
    <div class="overflow-x-auto bg-white shadow rounded-lg  mt-15">
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


@endsection
