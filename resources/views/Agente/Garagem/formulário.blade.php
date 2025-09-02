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
        <div class="text-center mb-6">
            <img src="{{ asset('img/ddk-logo-rbg.png') }}" alt="DDK-Motos" class="w-16 h-16 mx-auto mb-2">
            <h2 class="text-2xl font-bold text-red-600">Registrar Entrada</h2>
            <p class="text-sm text-gray-600">Motoqueiro</p>
        </div>
@if (session('sucesso'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('sucesso') }}
    </div>
@endif
@if($errors->any())
@foreach($errors->all() as $erro)
<div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{$erro}}
    </div>
    @endforeach
@endif
@if(session('$error'))
   <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{session('$error')}}
    </div>
    @endif 
    <form method="post" action="{{ route('store-garagem', ['nome' => $nome,'modelo'=> $modelo]) }}">
            @csrf
      <!-- Nome -->
<div class="mb-4">
   <label for="name" class="block text-sm font-medium text-gray-700">Nome do Motoqueiro</label>
   <input type="text" name="name" id="name" value='{{$nome}}' required
     class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>
            <!-- Moto -->
<div class="mb-4">
    <label for="moto" class="block text-sm font-medium text-gray-700">Moto</label>
    <input type="text" name="moto" id="moto" value='{{$modelo}}' required
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- Cota -->
<div class="mb-4">
    <label for="cota" class="block text-sm font-medium text-gray-700">Cota</label>
    <input type="number" name="cota" id="cota" step="0.01" required
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- Dívida -->
<div class="mb-4">
    <label for="divida" class="block text-sm font-medium text-gray-700">Dívida</label>
    <input type="number" name="divida" id="divida" step="0.01"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- Multa -->
<div class="mb-4">
    <label for="multa" class="block text-sm font-medium text-gray-700">Multa</label>
    <input type="number" name="multa" id="multa" step="0.01"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- Hora de Chegada -->
<div class="mb-6">
    <label for="hora_de_chegada" class="block text-sm font-medium text-gray-700">Hora de Chegada</label>
    <input type="time" name="hora_de_chegada" id="hora_de_chegada"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>
 <!-- Botão de cadastro -->
            <div class="text-center">
                <button type="submit"
                        class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                    Cadastrar
                </button>
            </div>
   </form>
    </div>

</body>
</html>