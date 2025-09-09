<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Painel do Agente - DDK-Motos')</title>
    <script src="https://kit.fontawesome.com/60ac415b45.js" crossorigin="anonymous"></script>
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
                    <button type="submit" class="text-red-600 hover:underline"><i class="fa-solid fa-door-open" style="color: #ff0000;"></i></button>
                </form>
            </div>
        </div>
    </header>

    <!-- Menu lateral + conteúdo -->
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-69 bg-white  shadow-md hidden md:block">
<nav class="p-6 space-y-4 text-sm font-medium text-gray-700 flex flex-col gap-9">
    <a href="{{ route('dashboard') }}" class=" hover:text-red-600 text-md font-bold flex gap-3 items-center space-around">
    <i class="fa-solid fa-house" style="color: #ff0000;"></i> <p>Dashboard</p>
    </a>
    <!-- Gestão de Motoqueiros -->
    <a href="{{route('gestão-motoqueiro')}}" class=" hover:text-red-600 text-md font-bold flex items-center gap-3 align-center space-around">
        <i class="fa-solid fa-plus" style="color: #ff0606;"></i><p> Add Motoqueiro</p>
    </a>

    <!-- Gestão de Motos -->
    <a href="{{route('gestão-moto')}}" class=" hover:text-red-600 text-md font-bold flex gap-3 items-center space-around">
       <i class="fa-solid fa-plus" style="color: #ff0606;"></i> <p> Add Moto</p>
    </a>
    <!--motoqueiros colocar motoqueiros nas ruas -->
    <a href="{{route('motoqueiros-index')}}" class=" hover:text-red-600 text-md font-bold flex gap-3 items-center space-around">
       <i class="fa-solid fa-road" style="color: #ff0000;"></i> <p>Motoqueiros no Campo</p>
    </a>
    <!--recesão diaria de moto -->
 <a href="{{route('motos.garagem')}}" class=" hover:text-red-600 text-md font-bold flex gap-3 items-center space-around">
        <i class="fa-solid fa-right-to-bracket" style="color: #ff0000;"></i> <p> Receber Moto</p>
    </a>
    <!-- Relatórios -->
     <a href="{{route('relatorios.diario')}}" class=" hover:text-red-600 text-md font-bold flex gap-3 items-center space-around">
        <i class="fa-solid fa-file-contract" style="color: #ff0000;"></i> <p> Relatório Diário</p>
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