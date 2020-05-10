</p> Bem vindo <?php echo e($user->name); ?> </p>

<form method="post" action="<?php echo e(route('login.logout')); ?>" >
    <?php echo csrf_field(); ?>
    <input type="submit" value="sair">
</form><?php /**PATH /var/www/html/resources/views/dashboard/index.blade.php ENDPATH**/ ?>