

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-red-600 mb-6 text-center">Gestão de Motoqueiros</h2>

    <!-- Barra de pesquisa -->
    <form method="GET" action="" class="mb-6">
        <div class="flex items-center space-x-2">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                   placeholder="Buscar por nome ou email"
                   class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Buscar
            </button>
        </div>
    </form>

    <!-- Botão de novo usuário -->
    <div class="mb-4 text-right">
        <a href="<?php echo e(route('motoqueiros.create')); ?>"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Novo Usuário
        </a>
    </div>

    <!-- Tabela de usuários -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nome</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Email</th> 
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Telefone</th>                    
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Bilhete de Identidade</th>                   
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Endereço</th> 
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php $__empty_1 = true; $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-6 py-4"><?php echo e($usuario->name); ?></td>
                        <td class="px-6 py-4"><?php echo e($usuario->email); ?></td>
                        <td class="px-6 py-4 capitalize"><?php echo e($usuario->telefone); ?></td>
                        <td class="px-6 py-4"><?php echo e($usuario->bi_passaporte); ?></td>
                        <td class="px-6 py-4 capitalize"><?php echo e($usuario->endereco); ?></td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="<?php echo e(route('editar-motoqueiro',['user'=>$usuario->id])); ?>"
                               class="text-blue-600 hover:underline">Editar</a>
                            <form action="<?php echo e(route('excluir-motoqueiro',['user'=>$usuario->id])); ?>" method="POST" class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum usuário encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.agente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\DDK-Motos\resources\views/Agente/motoqueiros/index.blade.php ENDPATH**/ ?>