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
        <img src="<?php echo e(asset('img/ddk-logo-rbg.png')); ?>" alt="Moto" class="w-16 h-16 mx-auto mb-2">
        <h2 class="text-2xl font-bold text-red-600">Cadastro de Moto</h2>
        <p class="text-sm text-gray-600">Informações da motorizada</p>
    </div>
<?php if(session('success')): ?>
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        <?php echo e(session('success')); ?>

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


    <form method="POST" action="<?php echo e(route('motos.store')); ?>">
        <?php echo csrf_field(); ?>

        <!-- Modelo -->
        <div class="mb-4">
            <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
            <input type="text" name="modelo" id="modelo" required
                   value="<?php echo e(old('modelo')); ?>"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Marca -->
        <div class="mb-4">
            <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
            <input type="text" name="marca" id="marca" required
                   value="<?php echo e(old('marca')); ?>"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Matrícula -->
        <div class="mb-4">
            <label for="matricula" class="block text-sm font-medium text-gray-700">Matrícula</label>
            <input type="text" name="matricula" id="matricula" required
                   value="<?php echo e(old('matricula')); ?>"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Ano -->
        <div class="mb-4">
            <label for="ano" class="block text-sm font-medium text-gray-700">Ano</label>
            <input type="number" name="ano" id="ano" required min="2000" max="<?php echo e(date('Y')); ?>"
                   value="<?php echo e(old('ano')); ?>"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Cor -->
        <div class="mb-4">
            <label for="cor" class="block text-sm font-medium text-gray-700">Cor</label>
            <input type="text" name="cor" id="cor" required
                   value="<?php echo e(old('cor')); ?>"
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
                <?php $__currentLoopData = $motoqueiros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motoqueiro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($motoqueiro->id); ?>">
                        <?php echo e($motoqueiro->name); ?> (<?php echo e($motoqueiro->email); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Data de Entrada -->
        <div class="mb-4">
            <label for="data_entrada" class="block text-sm font-medium text-gray-700">Data de Entrada</label>
            <input type="date" name="data_entrada" id="data_entrada" required
                   value="<?php echo e(old('data_entrada')); ?>"
                   class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Observações -->
        <div class="mb-6">
            <label for="observacoes" class="block text-sm font-medium text-gray-700">Observações</label>
            <textarea name="observacoes" id="observacoes" rows="3"
                      class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500"><?php echo e(old('observacoes')); ?></textarea>
        </div>

        <!-- Botão de envio -->
        <div class="text-right">
            <button type="submit"
                    class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                Cadastrar Moto
            </button>
        </div>
    </form>
</div>
</body>
</html><?php /**PATH C:\laragon\www\DDK-Motos\resources\views/Agente/moto/create.blade.php ENDPATH**/ ?>