<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login - DDK-Motos</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <div class="text-center mb-6">
            <img src="<?php echo e(asset('img/ddk-logo-rbg.png')); ?>" alt="DDK-Motos" class="w-16 h-16 mx-auto mb-2">
            <h2 class="text-2xl font-bold text-red-600">Acesso ao Sistema</h2>
            <p class="text-sm text-gray-600">Agentes autorizados</p>
        </div>

        <?php if(session('error')): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login-Attempt')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required autofocus
                       class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
            </div>

            <!-- Botão de login -->
            <div class="mb-4">
                <button type="submit"
                        class="w-full bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 transition">
                    Entrar
                </button>
            </div>

            <!-- Link de recuperação -->
            <div class="text-center text-sm text-gray-600">
                <a href="" class="hover:underline">Esqueceu a senha?</a>
            </div>
        </form>
    </div>

</body>
</html><?php /**PATH C:\laragon\www\DDK-Motos\resources\views/auth/login.blade.php ENDPATH**/ ?>