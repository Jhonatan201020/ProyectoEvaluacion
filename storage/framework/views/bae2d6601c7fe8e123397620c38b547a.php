

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success" role="alert" id="success-alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger" role="alert">
            <strong>¡Error de Validación!</strong>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <!-- Listado de Usuarios-->
    <!-- /.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de Usuarios</span>
                    <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#nuevaSede">Agregar</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaSedes" class="table border mb-0">
                            <thead class="fw-semibold text-nowrap">
                                <tr class="align-middle">
                                    <th class="bg-body-secondary text-center">N°</th>
                                    <th class="bg-body-secondary">Nombre</th>
                                    <th class="bg-body-secondary text-center">Oficina</th>
                                    <th class="bg-body-secondary">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="align-middle">
                                        <td class="text-center">
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <div class="text-nowrap"><?php echo e($sede->nombre); ?></div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-nowrap"><?php echo e($sede->oficina); ?></div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="icon"><use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-options')); ?>"></use></svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" data-coreui-toggle="modal" data-coreui-target="#editModal-<?php echo e($sede->id_sede); ?>">Editar</a>
                                                    <a class="dropdown-item text-danger" data-coreui-toggle="modal" data-coreui-target="#deleteModal-<?php echo e($sede->id_sede); ?>">Eliminar</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr class="align-middle">
                                        <td colspan="6" class="text-center py-4">No se encontraron usuarios en la base de datos.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <!-- /.row-->
     <!-- Modal para crear sede-->
    <div class="modal fade" id="nuevaSede" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Sede</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('admin.sedes.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <p>Ingresa los datos para la nueva sede.</p>
                                                                                    
                        <div class="mb-3">
                            <label for="nombre_crear" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre_crear" name="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="oficina_crear" class="form-label">Oficina:</label>
                            <input type="text" class="form-control" id="oficina_crear" name="oficina" required>
                        </div>
                                                                                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear Sede</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!--Modal de actualización de sede-->
        <div class="modal fade" id="editModal-<?php echo e($sede->id_sede); ?>" tabindex="-1" aria-labelledby="editModalLabel-<?php echo e($sede->id_sede); ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel-<?php echo e($sede->id_sede); ?>">Editar Usuario: <?php echo e($sede->nombre); ?></h5>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('admin.sedes.update', $sede)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?> 
                        <div class="modal-body">
                            <p>Estás editando los datos de la sede.</p>
                                                                                    
                            <div class="mb-3">
                                <label for="nombre-<?php echo e($sede->id_sede); ?>" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre-<?php echo e($sede->id_sede); ?>" name="nombre" value="<?php echo e($sede->nombre); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="oficina-<?php echo e($sede->id_sede); ?>" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="oficina-<?php echo e($sede->id_sede); ?>" name="oficina" value="<?php echo e($sede->oficina); ?>">
                            </div>
                                                                                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!--Modal de eliminacion de usuario-->
        <div class="modal fade" id="deleteModal-<?php echo e($sede->id_sede); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($sede->id_sede); ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel-<?php echo e($sede->id_sede); ?>">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('admin.sedes.destroy', $sede)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <div class="modal-body">
                            <p>¿Estás seguro de que quieres eliminar la sede <strong><?php echo e($sede->oficina); ?></strong>?</p>                                                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('DataTables/datatables.min.js')); ?>"></script>
    <script>
        // Para el DataTable de sedes
        $(document).ready(function () {
            
            // Inicializa DataTables en la tabla con el ID 'tablaUsuarios'
            $('#tablaSedes').DataTable({
                // Opcional: Poner la tabla en español
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
            });

        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\resources\views/sedes.blade.php ENDPATH**/ ?>