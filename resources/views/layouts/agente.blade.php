<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Painel do Agente - DDK-Motos')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-red-600 ml-3">DDK-Motos</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">{{ Auth::user()->name }}</span>
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Sair</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Menu lateral + conteúdo -->
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-69 bg-white shadow-md hidden md:block">
<nav class="p-6 space-y-4 text-sm font-medium text-gray-700 flex flex-col gap-5">
    <a href="{{ route('dashboard') }}" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
      <img src="{{asset('img/botaoIni.png')}}" alt="icon home" class="w-10"> <p>Dashboard</p>
    </a>
    <!-- Gestão de Motoqueiros -->
    <a href="{{route('gestão-motoqueiro')}}" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="{{asset('img/botao-adicionar.png')}}" alt="icon motorizada"> <p> Add Motoqueiro</p>
    </a>

    <!-- Gestão de Motos -->
    <a href="{{route('gestão-moto')}}" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="{{asset('img/botao-adicionar.png')}}" alt="icon motorizada"> <p> Add Moto</p>
    </a>
    <!--motoqueiros colocar motoqueiros nas ruas -->
    <a href="{{route('motoqueiros-index')}}" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="{{asset('img/rua.png')}}" alt="icon motorizada" class="w-10"> <p>Motoqueiros no Campo</p>
    </a>
    <!--recesão diaria de moto -->
 <a href="{{route('motos.garagem')}}" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="{{asset('img/chegar.png')}}" alt="icon motorizada" class="w-10"> <p> Receber Moto</p>
    </a>
    <!-- Relatórios -->
     <a href="{{route('gestão-motoqueiro')}}" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="{{asset('img/relatorio.png')}}" alt="icon motorizada"> <p> Relatório Diário</p>
    </a>
</nav>
        </aside>

        <!-- Conteúdo principal -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Rodapé -->
    <footer class="bg-gray-800 text-white py-4 text-center">
        <p>&copy; {{ date('Y') }} DDK-Motos. Sistema de Gestão de Moto Táxis em Angola.</p>
    </footer>

</body>
</html>