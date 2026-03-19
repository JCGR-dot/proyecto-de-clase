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
                <div class="stat-number">156</div>
                <small style="color: #10b981;">↑ 12% vs mes anterior</small>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon success">🛒</div>
            <div class="stat-info">
                <h3>Pedidos</h3>
                <div class="stat-number">45</div>
                <small style="color: #10b981;">↑ 8% vs mes anterior</small>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon warning">👥</div>
            <div class="stat-info">
                <h3>Usuarios</h3>
                <div class="stat-number">1,245</div>
                <small style="color: #f59e0b;">↑ 5% vs mes anterior</small>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon danger">💰</div>
            <div class="stat-info">
                <h3>Ventas</h3>
                <div class="stat-number">$12,450</div>
                <small style="color: #10b981;">↑ 23% vs mes anterior</small>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="admin-card">
        <div class="card-header">
            <h2>Pedidos Recientes</h2>
            <a href="{{ route('admin.orders') }}" class="admin-btn admin-btn-outline admin-btn-sm">Ver todos</a>
        </div>
        <div class="card-body">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>Juan Pérez</td>
                        <td>Smartphone X10</td>
                        <td>$599.99</td>
                        <td><span class="admin-badge badge-success">Completado</span></td>
                        <td>15/03/2026</td>
                        <td>
                            <a href="#" class="admin-btn admin-btn-outline admin-btn-sm">Ver</a>
                        </td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>María García</td>
                        <td>Laptop Pro</td>
                        <td>$1,299.99</td>
                        <td><span class="admin-badge badge-warning">Pendiente</span></td>
                        <td>15/03/2026</td>
                        <td>
                            <a href="#" class="admin-btn admin-btn-outline admin-btn-sm">Ver</a>
                        </td>
                    </tr>
                    <tr>
                        <td>#003</td>
                        <td>Carlos López</td>
                        <td>Auriculares BT</td>
                        <td>$89.99</td>
                        <td><span class="admin-badge badge-info">Enviado</span></td>
                        <td>14/03/2026</td>
                        <td>
                            <a href="#" class="admin-btn admin-btn-outline admin-btn-sm">Ver</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="admin-card">
        <div class="card-header">
            <h2>Productos Destacados</h2>
            <a href="{{ route('admin.products') }}" class="admin-btn admin-btn-outline admin-btn-sm">Gestionar productos</a>
        </div>
        <div class="card-body">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div style="text-align: center;">
                    <img src="https://via.placeholder.com/150" alt="Producto" style="width: 100%; border-radius: 0.375rem; margin-bottom: 0.5rem;">
                    <h3 style="font-size: 1rem;">Smartphone X10</h3>
                    <p style="color: #2563eb; font-weight: bold;">$599.99</p>
                </div>
                <div style="text-align: center;">
                    <img src="https://via.placeholder.com/150" alt="Producto" style="width: 100%; border-radius: 0.375rem; margin-bottom: 0.5rem;">
                    <h3 style="font-size: 1rem;">Laptop Pro</h3>
                    <p style="color: #2563eb; font-weight: bold;">$1,299.99</p>
                </div>
                <div style="text-align: center;">
                    <img src="https://via.placeholder.com/150" alt="Producto" style="width: 100%; border-radius: 0.375rem; margin-bottom: 0.5rem;">
                    <h3 style="font-size: 1rem;">Tablet Plus</h3>
                    <p style="color: #2563eb; font-weight: bold;">$399.99</p>
                </div>
                <div style="text-align: center;">
                    <img src="https://via.placeholder.com/150" alt="Producto" style="width: 100%; border-radius: 0.375rem; margin-bottom: 0.5rem;">
                    <h3 style="font-size: 1rem;">Smart Watch</h3>
                    <p style="color: #2563eb; font-weight: bold;">$249.99</p>
                </div>
            </div>
        </div>
    </div>
@endsection