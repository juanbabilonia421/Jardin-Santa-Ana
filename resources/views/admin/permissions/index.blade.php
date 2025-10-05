@extends('layouts.admin')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('admin.dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Permisos</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Gestión de Permisos</h5>
    </nav>
@stop
@section('content')
    @can('Permission access')
    <div class="row my-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Permisos</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">{{ $permissions->count() }}</span> disponibles
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Permisos</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $permission->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <form id="userDelete" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        @can('Permission Edit')
                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar permiso">
                                            <i class="fa-solid fa-pen text-secondary"></i>
                                        </a>
                                        @endcan
                                        @can('Permission delete')
                                        <button class="cursor-pointer fas fa-trash text-secondary" style="border: none; background: no-repeat;" data-bs-toggle="tooltip" data-bs-original-title="Eliminar permiso"></button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @can('Permission create')
        <div class="col-lg-5">
            <div class="card h-auto">
                <div class="card-header pb-0">
                    <h6>Agregar Permiso</h6>
                </div>
                <div class="card-body p-3">
                    <form method="POST" action="{{ route('admin.permissions.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="permission" class="form-control-label">{{ __('Permiso') }}</label>
                                <div class="@error('name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Nombre del permiso" id="permission" name="name" required>
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-success btn-md mt-4 mb-4"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;{{ 'Agregar Permiso' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endcan
    </div>
    @endcan
@stop
