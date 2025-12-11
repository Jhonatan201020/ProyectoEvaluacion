<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>INVENTARIO - Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('vendors/simplebar/css/simplebar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendors/simplebar.css')); ?>">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/examples.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/config.js')); ?>"></script>
    <script src="<?php echo e(asset('js/color-modes.js')); ?>"></script>
    <style>
      /* Estilos para el mensaje de error de Laravel */
      .is-invalid {
        border-color: #e55353 !important;
      }
      .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: #e55353;
      }
    </style>
  </head>
  <body>
    <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-body-secondary">Ingresa tus credenciales para acceder</p>

                  <form method="POST" action="<?php echo e(url('admin/login')); ?>">
                    <?php echo csrf_field(); ?> 
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-user')); ?>"></use>
                        </svg>
                      </span>
                      <input 
                        class="form-control <?php $__errorArgs = ['identificador'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        type="text" 
                        placeholder="Usuario" 
                        name="identificador" 
                        value="<?php echo e(old('identificador')); ?>" 
                        required 
                        autofocus
                      >
                      <?php $__errorArgs = ['identificador'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')); ?>"></use>
                        </svg>
                      </span>
                      <input 
                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        type="password" 
                        placeholder="Contraseña" 
                        name="password" 
                        required
                      >
                       <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="row">
                      <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">Ingresar</button>
                      </div>
                      <!-- <div class="col-6 text-end">
                        <button class="btn btn-link px-0" type="button">¿Olvidaste la contraseña?</button>
                      </div> -->
                    </div>
                  </form>
                  </div>
              </div>
              
              <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                  <div>
                    <h2>Sistema de Inventario</h2>
                    <p>Acceso exclusivo para personal administrativo. Si no tienes una cuenta, contacta a tu supervisor.</p>
                    <!-- <a class="btn btn-lg btn-outline-light mt-3" href="#">Contactar</a> -->
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo e(asset('vendors/@coreui/coreui/js/coreui.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/simplebar/js/simplebar.min.js')); ?>"></script>
  </body>
</html><?php /**PATH C:\laragon\www\proyecto\resources\views/login.blade.php ENDPATH**/ ?>