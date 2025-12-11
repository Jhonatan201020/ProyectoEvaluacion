@extends('layouts.admin')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>¡Error de Validación!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Listado de Usuarios-->
    <!-- /.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de Bienes</span>
                    <button type="button" class="btn btn-primary" id="btnAgregar" style="display: none;">
                            <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use></svg>
                            Agregar <span id="tipoTexto"></span>
                    </button>
                    <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#nuevoBien" style="display: none;">Agregar</button>
                </div>
                <div class="card-body">
                    <!-- BOTONES DE FILTRO -->
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="btn-group" role="group" id='filtros_tipo'>
                            <button type="button" class="btn btn-outline-secondary btn-filtro active" data-color="secondary" data-tipo="">
                                <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use></svg>
                                Todos
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-filtro" data-color="primary" data-tipo="informatico">
                                <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-laptop') }}"></use></svg>
                                Informáticos
                            </button>
                            <button type="button" class="btn btn-outline-success btn-filtro" data-color="success" data-tipo="mobiliario">
                                <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-couch') }}"></use></svg>
                                Mobiliarios
                            </button>
                            <button type="button" class="btn btn-outline-info btn-filtro" data-color="info" data-tipo="movilidad">
                                <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-truck') }}"></use></svg>
                                Movilidades
                            </button>
                        </div>

                        <div id="botones-agregar">
                            <button class="btn btn-success d-none" id="btnAgregarInformatico" data-coreui-toggle="modal" data-coreui-target="#modalInformatico">
                                <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use></svg>
                                Agregar
                            </button>
                            
                            <button class="btn btn-success d-none" id="btnAgregarMobiliario" data-coreui-toggle="modal" data-coreui-target="#modalMobiliario">
                                <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use></svg>
                                Agregar
                            </button>
                            
                            <button class="btn btn-success d-none" id="btnAgregarMovilidad" data-coreui-toggle="modal" data-coreui-target="#modalMovilidad">
                                <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use></svg>
                                Agregar
                            </button>
                        </div>
                        
                    </div>

                    <!-- DATATABLE -->
                    <div class="table-responsive">
                        <table id="tablaBienes" class="table border mb-0">
                            <thead class="fw-semibold text-nowrap">
                                <tr class="align-middle">
                                    <th class="bg-body-secondary text-center">N°</th>
                                    <th class="bg-body-secondary text-center">Código</th>
                                    <th class="bg-body-secondary text-center">Nombre</th>
                                    <th class="bg-body-secondary text-center">Tipo</th>
                                    <th class="bg-body-secondary text-center">Estado</th>
                                    <th class="bg-body-secondary text-center">Fecha Adquisición</th>
                                    <th class="bg-body-secondary text-center">Orden Compra</th>
                                    <th class="bg-body-secondary text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bienes as $bien)
                                    <tr class="align-middle">
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="text-center">
                                            <div class="text-nowrap">{{ $bien->codigo_patrimonial }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-nowrap">{{ $bien->nombre_bien }}</div>
                                        </td>
                                        <td>
                                            <div class="text-nowrap">{{ $bien->tipo }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-nowrap">{{ $bien->estado }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-nowrap">{{ $bien->fecha_adquisicion->format('d/m/Y') }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-nowrap">{{ $bien->orden_compra}}</div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="icon"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-options')}}"></use></svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" data-coreui-toggle="modal" data-coreui-target="#editBienModal-{{ $bien->id_bien }}">Editar</a>
                                                    <a class="dropdown-item" data-coreui-toggle="modal" data-coreui-target="#detalleBienModal-{{ $bien->id_bien }}">Detalle</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="align-middle">
                                        <td colspan="6" class="text-center py-4">No se encontraron bienes en la base de datos.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <!-- /.row-->
    <!-- MODAL INFORMÁTICOS -->
    <div class="modal fade" id="modalInformatico" tabindex="-1" aria-labelledby="modalInformaticoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.bienes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo" value="informatico">
                    
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="modalInformaticoLabel">
                            <svg class="icon me-2"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-laptop') }}"></use></svg>
                            <span id="tituloInformatico">Agregar</span> Bien Informático
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre del Bien *</label>
                                    <input type="text" class="form-control" name="nombre_bien" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Código Patrimonial</label>
                                    <input type="text" class="form-control" name="codigo_patrimonial">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Orden de Compra *</label>
                                    <input type="text" class="form-control" name="orden_compra" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Fecha de Adquisición</label>
                                    <input type="date" class="form-control" name="fecha_adquisicion">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select class="form-select" name="estado">
                                <option value="bueno" selected>Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="mantenimiento">Mantenimiento</option>
                                <option value="malo">Malo</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>

                        <hr>
                        <h6 class="text-primary mb-3">Datos Específicos</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Marca *</label>
                                    <input type="text" class="form-control" name="marca" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Modelo *</label>
                                    <input type="text" class="form-control" name="modelo" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Número de Serie *</label>
                                    <input type="text" class="form-control" name="numero_serie" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Procesador</label>
                                    <input type="text" class="form-control" name="procesador">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">
                            <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-x') }}"></use></svg>
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-save') }}"></use></svg>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL MOBILIARIOS -->
    <div class="modal fade" id="modalMobiliario" tabindex="-1" aria-labelledby="modalMobiliarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.bienes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo" value="mobiliario">
                    
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="modalMobiliarioLabel">
                            <svg class="icon me-2"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-couch') }}"></use></svg>
                            <span id="tituloMobiliario">Agregar</span> Bien Mobiliario
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre del Bien *</label>
                                    <input type="text" class="form-control" name="nombre_bien" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Código Patrimonial</label>
                                    <input type="text" class="form-control" name="codigo_patrimonial">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Orden de Compra *</label>
                                    <input type="text" class="form-control" name="orden_compra" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Fecha de Adquisición</label>
                                    <input type="date" class="form-control" name="fecha_adquisicion">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select class="form-select" name="estado">
                                <option value="bueno" selected>Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="mantenimiento">Mantenimiento</option>
                                <option value="malo">Malo</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>

                        <hr>
                        <h6 class="text-success mb-3">Datos Específicos</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Color</label>
                                    <input type="text" class="form-control" name="color">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Dimensiones</label>
                                    <input type="text" class="form-control" name="dimensiones" placeholder="Ej: 2m x 1m x 0.5m">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">
                            <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-x') }}"></use></svg>
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-success">
                            <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-save') }}"></use></svg>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL MOVILIDADES -->
    <div class="modal fade" id="modalMovilidad" tabindex="-1" aria-labelledby="modalMovilidadLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.bienes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo" value="movilidad">
                    
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="modalMovilidadLabel">
                            <svg class="icon me-2"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-truck') }}"></use></svg>
                            <span id="tituloMovilidad">Agregar</span> Movilidad
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre del Bien *</label>
                                    <input type="text" class="form-control" name="nombre_bien" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Código Patrimonial</label>
                                    <input type="text" class="form-control" name="codigo_patrimonial">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Orden de Compra *</label>
                                    <input type="text" class="form-control" name="orden_compra" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Fecha de Adquisición</label>
                                    <input type="date" class="form-control" name="fecha_adquisicion">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select class="form-select" name="estado">
                                <option value="bueno" selected>Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="mantenimiento">Mantenimiento</option>
                                <option value="malo">Malo</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>

                        <hr>
                        <h6 class="text-info mb-3">Datos Específicos</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Placa *</label>
                                    <input type="text" class="form-control" name="placa" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Año de Fabricación</label>
                                    <input type="number" class="form-control" name="año_fabricacion" 
                                           min="1900" max="{{ date('Y') + 1 }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Número de Motor *</label>
                                    <input type="text" class="form-control" name="numero_motor" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Chasis</label>
                                    <input type="text" class="form-control" name="chasis">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">
                            <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-x') }}"></use></svg>
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <svg class="icon me-1"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-save') }}"></use></svg>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @forelse ($bienes as $bien)
        <!-- MODAL VER DETALLE -->
        <div class="modal fade" id="detalleBienModal-{{ $bien->id_bien }}" tabindex="-1" aria-labelledby="detalleBienModal-{{ $bien->id_bien }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="detalleBienModal-{{ $bien->id_bien }}">
                            <svg class="icon me-2"><use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-info') }}"></use></svg>
                            Detalle del Bien: {{ $bien->nombre_bien }}
                        </h5>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 class="text-primary">Datos Generales</h6>
                        <dl class="row">
                            <dt class="col-sm-4">Código Patrimonial:</dt>
                            <dd class="col-sm-8">{{ $bien->codigo_patrimonial ?? 'No asignado' }}</dd>

                            <dt class="col-sm-4">Orden de Compra:</dt>
                            <dd class="col-sm-8">{{ $bien->orden_compra ?? 'N/A' }}</dd>

                            <dt class="col-sm-4">Fecha Adquisición:</dt>
                            <dd class="col-sm-8">{{ $bien->fecha_adquisicion ?? 'N/A' }}</dd>

                            <dt class="col-sm-4">Estado:</dt>
                            <dd class="col-sm-8">
                                <span class="badge bg-success">{{ $bien->estado }}</span>
                            </dd>
                        </dl>
                        <hr>

                        <h6 class="text-primary">Detalles Específicos (Tipo: {{ $bien->tipo }})</h6>
                        
                        @if ($bien->tipo == 'informatico')
                        <dl class="row">
                            <dt class="col-sm-4">Marca:</dt>
                            <dd class="col-sm-8">{{ $bien->marca ?? 'N/A' }}</dd>

                            <dt class="col-sm-4">Modelo:</dt>
                            <dd class="col-sm-8">{{ $bien->modelo ?? 'N/A' }}</dd>
                            
                            <dt class="col-sm-4">N° Serie:</dt>
                            <dd class="col-sm-8">{{ $bien->numero_serie ?? 'N/A' }}</dd>

                            <dt class="col-sm-4">Procesador:</dt>
                            <dd class="col-sm-8">{{ $bien->procesador ?? 'N/A' }}</dd>
                        </dl>
                        
                        @elseif ($bien->tipo == 'mobiliario')
                        <dl class="row">
                            <dt class="col-sm-4">Color:</dt>
                            <dd class="col-sm-8">{{ $bien->color ?? 'N/A' }}</dd>

                            <dt class="col-sm-4">Dimensiones:</dt>
                            <dd class="col-sm-8">{{ $bien->dimensiones ?? 'N/A' }}</dd>
                        </dl>

                        @elseif ($bien->tipo == 'movilidad')
                        <dl class="row">
                            <dt class="col-sm-4">Placa:</dt>
                            <dd class="col-sm-8">{{ $bien->placa ?? 'N/A' }}</dd>

                            <dt class="col-sm-4">N° Chasis:</dt>
                            <dd class="col-sm-8">{{ $bien->chasis ?? 'N/A' }}</dd>

                            <dt class="col-sm-4">N° Motor:</dt>
                            <dd class="col-sm-8">{{ $bien->numero_motor ?? 'N/A' }}</dd>
                            
                            <dt class="col-sm-4">Año Fabricación:</dt>
                            <dd class="col-sm-8">{{ $bien->año_fabricacion ?? 'N/A' }}</dd>
                        </dl>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL PARA ACTUALIZAR BIEN-->
        <div class="modal fade" id="editBienModal-{{ $bien->id_bien }}" tabindex="-1" aria-labelledby="editBienModalLabel-{{ $bien->id_bien }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
                    <form action="{{ route('admin.bienes.update', $bien->id_bien) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel-{{ $bien->id_bien }}">
                                Editar Bien: {{ $bien->codigo_patrimonial ?? $bien->nombre_bien }}
                            </h5>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            
                            <h6 class="text-primary">Datos Generales</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nombre del Bien *</label>
                                    <input type="text" name="nombre_bien" class="form-control" value="{{ $bien->nombre_bien }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Código Patrimonial</label>
                                    <input type="text" name="codigo_patrimonial" class="form-control" value="{{ $bien->codigo_patrimonial }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Orden de Compra *</label>
                                    <input type="text" name="orden_compra" class="form-control" value="{{ $bien->orden_compra }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Fecha de Adquisición</label>
                                    <input type="date" name="fecha_adquisicion" class="form-control" value="{{ $bien->fecha_adquisicion }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-select" name="estado">
                                    <option value="bueno" @if($bien->estado == 'bueno') selected @endif>Bueno</option>
                                    <option value="regular" @if($bien->estado == 'regular') selected @endif>Regular</option>
                                    <option value="malo" @if($bien->estado == 'malo') selected @endif>Malo</option>
                                </select>
                            </div>
                            
                            <hr>

                            <h6 class="text-primary">Detalles Específicos (Tipo: {{ $bien->tipo }})</h6>
                            
                            @if ($bien->tipo == 'informatico')
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Marca</label>
                                    <input type="text" name="marca" class="form-control" value="{{ $bien->marca }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Modelo</label>
                                    <input type="text" name="modelo" class="form-control" value="{{ $bien->modelo }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Serie</label>
                                    <input type="text" name="numero_serie" class="form-control" value="{{ $bien->numero_serie }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Procesador</label>
                                    <input type="text" name="procesador" class="form-control" value="{{ $bien->procesador }}">
                                </div>
                            </div>
                            
                            @elseif ($bien->tipo == 'mobiliario')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Color</label>
                                    <input type="text" name="color" class="form-control" value="{{ $bien->color }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Dimensiones</label>
                                    <input type="text" name="dimensiones" class="form-control" value="{{ $bien->dimensiones }}">
                                </div>
                            </div>

                            @elseif ($bien->tipo == 'movilidad')
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Placa</label>
                                    <input type="text" name="placa" class="form-control" value="{{ $bien->placa }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>N° Chasis</label>
                                    <input type="text" name="chasis" class="form-control" value="{{ $bien->chasis }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>N° Motor</label>
                                    <input type="text" name="numero_motor" class="form-control" value="{{ $bien->numero_motor }}">
                                </div>
                            </div>
                            @endif
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach    
@endsection

@push('scripts')
    <script src="{{ asset('vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('js/datatables.js')}}"></script>
    <script src="{{ asset('DataTables/datatables.min.js')}}"></script>
    <script>
        // Para el DataTable de bienes
        $(document).ready(function () {
            
            var table = $('#tablaBienes').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
            });

            // Escucha los clics en los botones de filtro
            $('#filtros_tipo').on('click', '.btn-filtro', function() {
                
                var $thisButton = $(this);
                var tipo = $thisButton.data('tipo');
                
                // --- Lógica de Filtro ---
                table.column(3).search(tipo).draw(); // Asumiendo que 'Tipo' es la columna 3


                // LÓGICA DE RESALTADO CON COLOR PROPIO
                
                // 1. Itera sobre CADA botón en el grupo
                $('#filtros_tipo .btn-filtro').each(function() {
                    var $btn = $(this);
                    var color = $btn.data('color'); // Lee el data-color (ej: 'primary', 'success')
                    
                    // Resetea el botón: quita el sólido y pone el outline
                    $btn.removeClass('btn-' + color).addClass('btn-outline-' + color);
                });
                
                // 2. Activa solo el botón cliqueado
                var activeColor = $thisButton.data('color'); // Lee el color del botón activo
                $thisButton
                    .removeClass('btn-outline-' + activeColor) // Quita su outline
                    .addClass('btn-' + activeColor); // Pone su color sólido

                // Lógica para mostrar el botón "Agregar"
                $('#botones-agregar .btn').addClass('d-none');

                if (tipo === 'informatico') {
                    $('#btnAgregarInformatico').removeClass('d-none');
                } else if (tipo === 'mobiliario') {
                    $('#btnAgregarMobiliario').removeClass('d-none');
                } else if (tipo === 'movilidad') {
                    $('#btnAgregarMovilidad').removeClass('d-none');
                }
            });

        });
    </script>
@endpush