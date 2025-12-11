

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
                    <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#nuevoUsuario">Agregar</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaTrabajadores" class="table border mb-0">
                            <thead class="fw-semibold text-nowrap">
                                <tr class="align-middle">
                                    <th class="bg-body-secondary text-center">N°</th>
                                    <th class="bg-body-secondary">Nombre</th>
                                    <th class="bg-body-secondary text-center">Apellido</th>
                                    <th class="bg-body-secondary">DNI</th>
                                    <th class="bg-body-secondary text-center">Puesto</th>
                                    <th class="bg-body-secondary text-center">Sede</th>
                                    <th class="bg-body-secondary">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $trabajadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trabajador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="align-middle">
                                        <td class="text-center">
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <div class="text-nowrap"><?php echo e($trabajador->nombre); ?></div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-nowrap"><?php echo e($trabajador->apellido); ?></div>
                                        </td>
                                        <td>
                                            <div class="text-nowrap"><?php echo e($trabajador->dni); ?></div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-nowrap"><?php echo e($trabajador->puesto); ?></div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-nowrap"><?php echo e($trabajador->sede->nombre_sede); ?></div>
                                            <div class="small text-body-secondary text-nowrap">
                                                <?php echo e($trabajador->sede->nombre); ?>--- ><?php echo e($trabajador->sede->oficina); ?>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="icon"><use xlink:href="<?php echo e(asset('vendors/@coreui/icons/svg/free.svg#cil-options')); ?>"></use></svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" data-coreui-toggle="modal" data-coreui-target="#editTrabajadorModal-<?php echo e($trabajador->id_trabajador); ?>">Editar</a>
                                                    <a class="dropdown-item text-danger" data-coreui-toggle="modal" data-coreui-target="#deleteTrabajadorModal-<?php echo e($trabajador->id_trabajador); ?>">Eliminar</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr class="align-middle">
                                        <td colspan="6" class="text-center py-4">No se encontraron trabajadores en la base de datos.</td>
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
    <!-- Modal para crear usuario-->
    <div class="modal fade" id="nuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Trabajador</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('admin.trabajadores.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <p>Ingresa los datos para el nuevo trabajador.</p>
                                                                                    
                        <div class="mb-3">
                            <label for="nombre_crear" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre_crear" name="nombre" placeholder="Ej: Juan" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellido_crear" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="apellido_crear" name="apellido" placeholder="Ej: Pérez" required>
                        </div>

                        <div class="mb-3">
                            <label for="dni_crear" class="form-label">DNI:</label>
                            <input type="text" class="form-control" id="dni_crear" name="dni" placeholder="Ej: 12345678" required>
                        </div>

                        <div class="mb-3">
                            <label for="puesto_crear" class="form-label">Puesto:</label>
                            <input type="text" class="form-control" id="puesto_crear" name="puesto" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_sede_crear" class="form-label">Sede:</label>
                            <select class="form-select" id="id_sede" name="id_sede" required>
        
                                <option selected disabled value="">-- Seleccione una sede --</option>
                                
                                <?php $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sede->id_sede); ?>">
                                        <?php echo e($sede->nombre); ?>---- >Oficina: <?php echo e($sede->oficina); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                                                                                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $__currentLoopData = $trabajadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trabajador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!--Modal de actualización de trabajador-->
        <div class="modal fade" id="editTrabajadorModal-<?php echo e($trabajador->id_trabajador); ?>" tabindex="-1" aria-labelledby="editModalLabel-<?php echo e($trabajador->id_trabajador); ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel-<?php echo e($trabajador->id_trabajador); ?>">Editar Trabajador: <?php echo e($trabajador->nombre); ?></h5>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('admin.trabajadores.update', $trabajador)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?> 
                        <div class="modal-body">
                            <p>Estás editando los datos de <strong><?php echo e($trabajador->nombre); ?></strong>.</p>
                                                                                    
                            <div class="mb-3">
                                <label for="nombre-<?php echo e($trabajador->id_trabajador); ?>" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre-<?php echo e($trabajador->id_trabajador); ?>" name="nombre" value="<?php echo e($trabajador->nombre); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="apellido-<?php echo e($trabajador->id_trabajador); ?>" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellido-<?php echo e($trabajador->id_trabajador); ?>" name="apellido" value="<?php echo e($trabajador->apellido); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="dni-<?php echo e($trabajador->id_trabajador); ?>" class="form-label">DNI:</label>
                                <input type="text" class="form-control" id="dni-<?php echo e($trabajador->id_trabajador); ?>" name="dni" value="<?php echo e($trabajador->dni); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="puesto-<?php echo e($trabajador->id_trabajador); ?>" class="form-label">Puesto:</label>
                                <input type="text" class="form-control" id="puesto-<?php echo e($trabajador->id_trabajador); ?>" name="puesto" value="<?php echo e($trabajador->puesto); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="id_sede-<?php echo e($trabajador->id_trabajador); ?>" class="form-label">Sede:</label>
                                
                                <select class="form-control" id="id_sede-<?php echo e($trabajador->id_trabajador); ?>" name="id_sede" required>
                                    
                                    <option value="">-- Seleccione una sede --</option>
                                    
                                    <?php $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option 
                                            value="<?php echo e($sede->id_sede); ?>"
                                            
                                            <?php if($trabajador->id_sede == $sede->id_sede): ?> 
                                                selected 
                                            <?php endif; ?>
                                        >
                                            <?php echo e($sede->nombre); ?>--- > Oficina: <?php echo e($sede->oficina); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
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
        
        <!--Modal de eliminacion de trabajador-->
        <div class="modal fade" id="deleteModal-<?php echo e($trabajador->id_trabajador); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($trabajador->id_trabajador); ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel-<?php echo e($trabajador->id_trabajador); ?>">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('admin.trabajadores.destroy', $trabajador)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <div class="modal-body">
                            <p>¿Estás seguro de que quieres eliminar al  trabajador <strong><?php echo e($trabajador->nombre); ?></strong>?</p>                                                            
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
        // Para el DataTable de trabajadores
        $(document).ready(function () {
            
            // Inicializa DataTables en la tabla con el ID 'tablaUsuarios'
            $('#tablaTrabajadores').DataTable({
                // Opcional: Poner la tabla en español
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
            });

        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\resources\views/listadotrabajadores.blade.php ENDPATH**/ ?>