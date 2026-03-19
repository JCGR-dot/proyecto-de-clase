@extends('layout.admin')

@section('title', 'Dashboard')

@section('admin-content')
    <div class="content-header">
        <div>
            <h1>Dashboard</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Inicio</a> / Dashboard
            </div>
        </div>
        <a href="#" class="admin-btn admin-btn-primary">Descargar Reporte</a>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon primary">📦</div>
            <div class="stat-info">
                <h3>Productos</h3>
                <div class="stat-number">{{ $stats['products'] }}</div>
                <small style="color: #10b981;">Total en catálogo</small>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon success">🏷️</div>
            <div class="stat-info">
                <h3>Categorías</h3>
                <div class="stat-number">{{ $stats['categories'] }}</div>
                <small style="color: #10b981;">Para clasificar</small>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon warning">👥</div>
            <div class="stat-info">
                <h3>Usuarios</h3>
                <div class="stat-number">{{ $stats['users'] }}</div>
                <small style="color: #f59e0b;">Registrados</small>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon danger">💰</div>
            <div class="stat-info">
                <h3>Ventas</h3>
                <div class="stat-number">$0</div>
                <small style="color: #64748b;">Próximamente</small>
            </div>
        </div>
    </div>

    <!-- Productos Recientes -->
    <div class="admin-card">
        <div class="card-header">
            <h2>Productos Recientes</h2>
            <a href="{{ route('admin.products') }}" class="admin-btn admin-btn-outline admin-btn-sm">Ver todos</a>
        </div>
        <div class="card-body">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['recent_products'] as $product)
                    <tr>
                        <td>#{{ $product->id }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 0.25rem;">
                            @else
                                <div style="width: 40px; height: 40px; background: #e2e8f0; border-radius: 0.25rem;"></div>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('product.show', $product) }}" class="admin-btn admin-btn-outline admin-btn-sm" target="_blank">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection