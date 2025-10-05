@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-info text-white">
                    <h5 class="mb-0">Gestión de Ventas - Jardín Infantil Santa Ana</h5>
                </div>
                <div class="card-body">
                    <!-- FILTROS -->
                    <form method="GET" action="{{ route('admin.ventas.index') }}" class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select name="categoria" id="categoria" class="form-select">
                                <option value="">-- Todas --</option>
                                <option value="Uniformes" {{ request('categoria') == 'Uniformes' ? 'selected' : '' }}>Uniformes</option>
                                <option value="Útiles Escolares" {{ request('categoria') == 'Útiles Escolares' ? 'selected' : '' }}>Útiles Escolares</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_inicio" class="form-label">Desde</label>
                            <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_fin" class="form-label">Hasta</label>
                            <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="vendedor" class="form-label">Vendedor</label>
                            <input type="text" name="vendedor" class="form-control" placeholder="Buscar por vendedor..." value="{{ request('vendedor') }}">
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-info">Filtrar</button>
                            <a href="{{ route('admin.ventas.index') }}" class="btn btn-secondary">Limpiar</a>
                        </div>
                    </form>

                    <!-- FORMULARIO NUEVA VENTA -->
                    <form method="POST" action="{{ route('admin.ventas.store') }}" class="mb-5">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Producto</label>
                                <input type="text" name="producto" class="form-control" placeholder="Ej: Camisa, Cuaderno" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Categoría</label>
                                <select name="categoria" class="form-select" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Uniformes">Uniformes</option>
                                    <option value="Útiles Escolares">Útiles Escolares</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Cantidad</label>
                                <input type="number" name="cantidad" class="form-control" min="1" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Precio Unitario</label>
                                <input type="number" step="0.01" name="precio_unitario" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Fecha de Venta</label>
                                <input type="date" name="fecha_venta" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Vendedor</label>
                                <input type="text" name="vendedor" class="form-control" value="{{ auth()->user()->name }}" required>
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-success mt-2">Registrar Venta</button>
                            </div>
                        </div>
                    </form>

                    <!-- TABLA DE VENTAS -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-info">
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Categoría</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Vendedor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ventas as $venta)
                                    <tr>
                                        <td>{{ $venta->id }}</td>
                                        <td>{{ $venta->producto }}</td>
                                        <td>{{ $venta->categoria }}</td>
                                        <td>{{ $venta->cantidad }}</td>
                                        <td>${{ number_format($venta->precio_unitario, 2) }}</td>
                                        <td><strong>${{ number_format($venta->total, 2) }}</strong></td>
                                        <td>{{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') }}</td>
                                        <td>{{ $venta->vendedor }}</td>
                                        <td>
                                            <form action="{{ route('admin.ventas.destroy', $venta->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta venta?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No hay ventas registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $ventas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
