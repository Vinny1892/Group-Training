<?php $__env->startSection('content'); ?>
<div class="tela-login">
<?php if($errors->any()): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card red lighten-5">
      <div class="card-content  red-text"> <p><?php echo e($error); ?></p> </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<section class="row z-depth-3 login ">
  <h4 class="center-align" >Login</h4>
  <form method="post" action="<?php echo e(route('login.login')); ?>" class="row">
    <?php echo csrf_field(); ?>
    <div class="row">
      <div class="input-field col s12" >
        <i class="material-icons prefix">person</i>
        <input id="email" name="email" value="<?php echo e(old('email')); ?>" type="email" class="validate"/>
        <label for="email">Email</label>
      </div>
    </div>

    <div class="row" >
      <div class="input-field col s12">

        <i class="material-icons prefix">lock</i>
        <input id="password"  name="password"  type="password" class="validate"/>
        <label class="" for="password">Senha</label>
      </div>
    </div>

    <div class="center-align">
      <button style="background-color: #7a297a" class="waves-effect waves-light btn" type="submit" >Login
        <i class="material-icons right">send</i>
      </button>
    </div>

    <div class=" center-align">
      <p>Não tem conta? <a href="<?php echo e(route('register')); ?>">Registre-se</a></p>
      <a href="<?php echo e(route('login.google')); ?>"><i class="fab fa-google color-icon-google"></i></a>
      <a href="<?php echo e(route('login.facebook')); ?>"><i class="fab fa-facebook color-icon-fb" ></i></a>
    </div>
    <div> <div id='parent'>seleciona a cor</div> </div>

  </form>
</section>
</div>
<script src="https://unpkg.com/vanilla-picker@2"></script>
<script>
   let colorBack = localStorage.getItem('color');
 
   let login = document.querySelector('.tela-login');
   let parent = document.querySelector('#parent');
   if(colorBack != null){
        login.style.background = colorBack;

   } 
   let picker = new Picker(parent);
   picker.onChange = function(color) {
        localStorage.setItem('color' , color.rgbaString);
        login.style.background = color.rgbaString;
    };

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('authentication.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/login/login.blade.php ENDPATH**/ ?>