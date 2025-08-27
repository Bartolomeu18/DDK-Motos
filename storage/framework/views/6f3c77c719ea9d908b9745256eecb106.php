<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Painel do Agente - DDK-Motos'); ?></title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

</head>
<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-red-600 ml-3">DDK-Motos</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700"><?php echo e(Auth::user()->name); ?></span>
                <form method="POST" action="">
                    <?php echo csrf_field(); ?>
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
    <a href="<?php echo e(route('dashboard')); ?>" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
      <img src="<?php echo e(asset('img/botaoIni.png')); ?>" alt="icon home" class="w-10"> <p>Dashboard</p>
    </a>
    <!-- Gestão de Motoqueiros -->
    <a href="<?php echo e(route('gestão-motoqueiro')); ?>" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="<?php echo e(asset('img/botao-adicionar.png')); ?>" alt="icon motorizada"> <p> Add Motoqueiro</p>
    </a>

    <!-- Gestão de Motos -->
    <a href="<?php echo e(route('gestão-motoqueiro')); ?>" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="<?php echo e(asset('img/botao-adicionar.png')); ?>" alt="icon motorizada"> <p> Add Moto</p>
    </a>
    <!--motoqueiros colocar motoqueiros nas ruas -->
    <a href="<?php echo e(route('gestão-motoqueiro')); ?>" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="<?php echo e(asset('img/rua.png')); ?>" alt="icon motorizada" class="w-10"> <p>Motoqueiros na Rua</p>
    </a>
    <!--recesão diaria de moto -->
 <a href="<?php echo e(route('gestão-motoqueiro')); ?>" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="<?php echo e(asset('img/chegar.png')); ?>" alt="icon motorizada" class="w-10"> <p> Receber Moto</p>
    </a>
    <!-- Relatórios -->
     <a href="<?php echo e(route('gestão-motoqueiro')); ?>" class=" hover:text-red-600 text-lg font-bold flex gap-3 align-center space-around">
        <img src="<?php echo e(asset('img/relatorio.png')); ?>" alt="icon motorizada"> <p> Relatório Diário</p>
    </a>
</nav>
        </aside>

        <!-- Conteúdo principal -->
        <main class="flex-1 p-6">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- Rodapé -->
    <footer class="bg-gray-800 text-white py-4 text-center">
        <p>&copy; <?php echo e(date('Y')); ?> DDK-Motos. Sistema de Gestão de Moto Táxis em Angola.</p>
    </footer>

</body>
</html><?php /**PATH C:\laragon\www\DDK-Motos\resources\views/layouts/agente.blade.php ENDPATH**/ ?>