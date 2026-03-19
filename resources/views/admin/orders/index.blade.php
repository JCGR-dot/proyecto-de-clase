@extends('layout.admin')

@section('title', 'Gestionar Pedidos')

@section('admin-content')
    <div class="content-header">
        <div>
            <h1>Pedidos</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Inicio</a> / Pedidos
            </div>
        </div>
    </div>

    <div class="admin-card">
        <div class="card-header">
            <h2>Todos los Pedidos</h2>
        </div>
        <div class="card-body">
            <p style="text-align: center; color: #64748b; padding: 2rem;">
                Módulo de pedidos en construcción. Próximamente podrás gestionar todos los pedidos aquí.
            </p>
        </div>
    </div>
@endsection