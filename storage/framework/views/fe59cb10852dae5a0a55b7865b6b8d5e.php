<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - DDK-Motos</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-6 m-10">
        <div class="text-center mb-6">
            <img src="<?php echo e(asset('img/ddk-logo-rbg.png')); ?>" alt="DDK-Motos" class="w-16 h-16 mx-auto mb-2">
            <h2 class="text-2xl font-bold text-red-600">Editar Usuário</h2>
            <p class="text-sm text-gray-600">Motoqueiro</p>
        </div>
<?php if(session('sucesso')): ?>
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        <?php echo e(session('sucesso')); ?>

    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $erro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <?php echo e($erro); ?>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>




        <form method="POST" action="<?php echo e(route('atualizar-motoqueiro',['user'=>$user->id])); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <!-- Nome -->
<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700">Nome Completo</label>
    <input type="text" name="name" id="name" required
           value="<?php echo e(old('name', $user->name)); ?>"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- Email -->
<div class="mb-4">
    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" name="email" id="email" required
           value="<?php echo e(old('email', $user->email)); ?>"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- Telefone -->
<div class="mb-4">
    <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
    <input type="text" name="telefone" id="telefone" required
           value="<?php echo e(old('telefone', $user->telefone)); ?>"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- BI ou Passaporte -->
<div class="mb-4">
    <label for="bi_passaporte" class="block text-sm font-medium text-gray-700">BI ou Passaporte</label>
    <input type="text" name="bi_passaporte" id="bi_passaporte" required
           value="<?php echo e(old('bi_passaporte', $user->bi_passaporte)); ?>"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- Endereço -->
<div class="mb-4">
    <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço</label>
    <input type="text" name="endereco" id="endereco" required
           value="<?php echo e(old('endereco', $user->endereco)); ?>"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- Função -->
<div class="mb-4">
    <label for="role" class="block text-sm font-medium text-gray-700">Função</label>
    <select name="role" id="role" required
            class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        <option value="motoqueiro">Motoqueiro</option>
    </select>
</div>

<!-- Status -->
<div class="mb-4">
    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
    <select name="status" id="status" required
            class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        <option value="ativo" >Ativo</option>
        <option value="inativo">Inativo</option>
    </select>
</div>

<!-- Senha -->
<div class="mb-4">
    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
    <input type="password" name="password" id="password"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

<!-- Confirmação de senha -->
<div class="mb-6">
    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
    <input type="password" name="password_confirmation" id="password_confirmation"
           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
</div>

            <!-- Botão de cadastro -->
            <div class="text-right">
                <button type="submit"
                        class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                    Editar
                </button>
            </div>
        </form>
    </div>

</body>
</html><?php /**PATH C:\laragon\www\DDK-Motos\resources\views/Agente/motoqueiros/Editar.blade.php ENDPATH**/ ?>