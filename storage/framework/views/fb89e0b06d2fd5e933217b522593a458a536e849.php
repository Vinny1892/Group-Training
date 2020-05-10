<?php $__env->startSection('content'); ?>
<div class="tela-login">
  <?php if($errors->any()): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card red lighten-5">
            <div class="card-content  red-text"> <p><?php echo e($error); ?></p> </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
  <div class="row z-depth-3  login">
    <h4 class="center-align" >Registrar-se</h4>
  <form method="POST" action="<?php echo e(route('register.storage')); ?>" class="row">
      <?php echo e(csrf_field()); ?>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">person</i>
          <input id="user" name="name" type="text"   value="<?php echo e(old('name')); ?>" class="validate">
          <label for="user">Usuário</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" value="<?php echo e(old('email')); ?>" name="email" type="email" class="validate">
          <label for="user">Email</label>
        </div>
      </div>

      <div class="row">
          <div class="input-field col s12 ">
            <i class="material-icons prefix">lock</i>
            <input id="password" name="password" type="password" class="validate">
            <label class="" for="password">Senha</label>
      </div>
          <div class="row">
              <div class="input-field col s12 ">
                  <i class="material-icons prefix">lock</i>
                  <input id="password" name="password_confirmation" type="password" class="validate">
                  <label class="" for="password">Confirme sua Senha</label>
              </div>

      <div class="center-align">
          <button style="background-color: #7a297a" class=" waves-light waves-effect  btn" type="submit" >Cadastrar
              <i class="material-icons right">send</i>
          </button>
          <div> <div id='parent'>seleciona a cor</div> </div>

      </div>
  </form>
  </div>
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
<?php echo $__env->make('authentication.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/login/cadastro.blade.php ENDPATH**/ ?>