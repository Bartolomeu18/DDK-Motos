@extends('layouts.agente')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 ">
    <h2 class="text-2xl font-bold text-red-600 mb-6 text-left">Receber Motos</h2>

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

    <!-- Botão de novo usuário 
    <div class="mb-4 text-right">
        <a href="{{route('motoqueiros.create')}}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Novo Usuário
        </a>
    </div>
-->
    @if(session('sucesso'))
        <div class="bg-green-100 text-green-400 p-4">
            {{session('sucesso')}}
        </div>
    @endif
        @if(session('error'))
        <div class="bg-red-100 text-red-400 p-4">
            {{session('error')}}
        </div>
    @endif
    <!-- Tabela de usuários -->
    <div class="overflow-x-auto bg-white shadow-2xl rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-red-500">
                <tr>
                   <th class="px-6 py-3 text-left text-sm font-medium text-white">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Motoqueiro</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Moto</th> 
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Data de saida</th> 
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Hora de chegada</th> 
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Ação</th>                    
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($dados as $dado)
                    <tr class="hover:bg-red-50 text-gray-600">
                      <td class="px-6 py-4">{{$dado['id']}}</td>
                       <td class="px-6 py-4">{{$dado['nomeMotoqueiro']}}</td>
                        <td class="px-6 py-4">{{$dado['modeloMoto']}}</td>
                        <td class="px-6 py-4 capitalize"> {{$data}} </td>
                        <td class="px-6 py-4 capitalize">{{$dado['horaDeChegada']??'motoqueiro ainda no campo'}}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{route('formulário-garagem', ['id'=>$dado['id'],'nome' => $dado['nomeMotoqueiro'],'modelo'=>$dado['modeloMoto']])}}"
                               class="text-blue-600 hover:underline"><i class="fa-solid fa-plus" style="color: #0080ff;"></i></a>
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