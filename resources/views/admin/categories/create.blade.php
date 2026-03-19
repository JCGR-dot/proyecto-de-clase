@extends('layout.admin')

@section('title', 'Nueva Categoría')

@section('admin-content')
    <div class="content-header">
        <div>
            <h1>Nueva Categoría</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Inicio</a> / 
                <a href="{{ route('admin.categories') }}">Categorías</a> / 
                Nueva
            </div>
        </div>
    </div>

    <div class="admin-card" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header">
            <h2>Crear Categoría</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                
                <div class="admin-form-group">
                    <label for="name">Nombre de la Categoría <span style="color: #ef4444;">*</span></label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="admin-form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}"
                           placeholder="Ej: Electrónica, Ropa, Hogar..."
                           required>
                    @error('name')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="admin-form-group">
                    <label for="description">Descripción</label>
                    <textarea id="description" 
                              name="description" 
                              class="admin-form-control @error('description') is-invalid @enderror" 
                              rows="3"
                              placeholder="Descripción opcional de la categoría...">{{ old('description') }}</textarea>
                    @error('description')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>

                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <button type="submit" class="admin-btn admin-btn-primary" style="flex: 1;">Guardar Categoría</button>
                    <a href="{{ route('admin.categories') }}" class="admin-btn admin-btn-outline" style="flex: 1;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection