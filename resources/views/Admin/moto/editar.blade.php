<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - DDK-Motos</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-6 m-10">
<div class="max-w-3xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-red-600 mb-6">Editar Moto</h2>
@if (session('sucesso'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('sucesso') }}
    </div>
@endif
@if (session('error'))
    <div class="bg-red100 text-red-700 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
@foreach($errors->all() as $erro)
<div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{$erro}}
    </div>
    @endforeach
@endif
    <form method="POST" action="{{ route('moto-atualizar',['id'=>$moto->id]) }}">
        @csrf
        @method('PUT')

        <!-- Modelo -->
        <div class="mb-4">
            <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
            <input type="text" name="modelo" id="modelo" required
                   value="{{ old('modelo', $moto->modelo) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Marca -->
        <div class="mb-4">
            <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
            <input type="text" name="marca" id="marca" required
                   value="{{ old('marca', $moto->marca) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Matrícula -->
        <div class="mb-4">
            <label for="matricula" class="block text-sm font-medium text-gray-700">Matrícula</label>
            <input type="text" name="matricula" id="matricula" required
                   value="{{ old('matricula', $moto->matricula) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Ano -->
        <div class="mb-4">
            <label for="ano" class="block text-sm font-medium text-gray-700">Ano</label>
            <input type="number" name="ano" id="ano" required min="2000" max="{{ date('Y') }}"
                   value="{{ old('ano', $moto->ano) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Cor -->
        <div class="mb-4">
            <label for="cor" class="block text-sm font-medium text-gray-700">Cor</label>
            <input type="text" name="cor" id="cor" required
                   value="{{ old('cor', $moto->cor) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Estado -->
        <div class="mb-4">
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="estado" id="estado" required
                    class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
                <option value="ativa">Ativa</option>
                <option value="manutencao">Manutenção</option>
                <option value="parada">Parada</option>
            </select>
        </div>

        <!-- Motoqueiro -->
        <div class="mb-4">
            <label for="motoqueiro_id" class="block text-sm font-medium text-gray-700">Motoqueiro Responsável</label>
            <select name="motoqueiro_id" id="motoqueiro_id" required
                    class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
                <option value="">Selecione...</option>
                    <option value="{{ $moto->motoqueiro_id }}">
                       {{$motoqueiroNome}}
                    </option>
            </select>
        </div>

        <!-- Data de entrada -->
        <div class="mb-4">
            <label for="data_entrada" class="block text-sm font-medium text-gray-700">Data de Entrada</label>
            <input type="date" name="data_entrada" id="data_entrada" required
                   value="{{ old('data_entrada', $moto->data_entrada) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Data de saída -->
        <div class="mb-4">
            <label for="data_saida" class="block text-sm font-medium text-gray-700">Data de Saída</label>
            <input type="date" name="data_saida" id="data_saida"
                   value="{{ old('data_saida', $moto->data_saida) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Observações -->
        <div class="mb-6">
            <label for="observacoes" class="block text-sm font-medium text-gray-700">Observações</label>
            <textarea name="observacoes" id="observacoes" rows="3"
                      class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">{{ old('observacoes', $moto->observacoes) }}</textarea>
        </div>

        <!-- Botão de envio -->
        <div class="text-right">
            <button type="submit"
                    class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                Atualizar Moto
            </button>
        </div>
    </form>
</div>
</div>
</body>
</html>