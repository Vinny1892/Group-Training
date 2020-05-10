<?php $__env->startSection('modalities'); ?>
    <div class="modality-page-container">
        <ul id="user-dropdown" class="dropdown-content">
            <li><a href="#!">Conta</a></li>
            <li><a href="#!">Nova sala</a></li>
            <li><a href="#!">Minhas salas</a></li>
            <li class="divider">zzzzzzzz</li>
            <li><a href="#!">Sair</a></li>
        </ul>

        <nav class="navbar">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Group Training</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="<?php echo e(route('login')); ?>">Entrar</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="user-dropdown">Usuário</a></li>
                </ul>
            </div>
        </nav>

        <div class="main-content">
            <h2 class="title-search-rooms">Pesquisar salas</h2>

            <h3 class="title-categories">Modalidades</h3>
            <div class="search-categories">
                <div class="search-input">
                    <input type="text" placeholder="Pesquise por nome">
                </div>
                <div class="order">
                    <span class="title-order">Ordenar por:</span>

                    <div>
                        <div class="input-field">
                            <select>
                                <option value="" disabled selected>Selecione</option>
                                <option value="1">Nome</option>
                                <option value="2">Usuários ativos</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="grid-categories">
                <?php $__currentLoopData = $modalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="category">
                        <div class="image-category" style="background-image: url('<?php echo e($modality->url); ?>')">
                            <img src="" alt="">
                        </div>
                        <div class="description">
                            <span class="category-name"><?php echo e($modality->title); ?></span>
                           <!-- <span class="category-active-users"><?php echo e($modality->activeUsers); ?> usuarios ativos</span> -->
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('modality.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/modality/modalities.blade.php ENDPATH**/ ?>