@extends('layout.admin')

@section('title', 'Editar Categoría')

@section('admin-content')
    <div class="content-header">
        <div>
            <h1>Editar Categoría</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Inicio</a> / 
                <a href="{{ route('admin.categories') }}">Categorías</a> / 
                {{ $category->name }}
            </div>
        </div>
    </div>

    <div class="admin-card" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header">
            <h2>Editando: {{ $category->name }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="admin-form-group">
                    <label for="name">Nombre de la Categoría <span style="color: #ef4444;">*</span></label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="admin-form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name', $category->name) }}"
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
                              placeholder="Descripción opcional de la categoría...">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <small style="color: #ef4444;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="admin-form-group">
                    <label>Información adicional</label>
                    <div style="background-color: var(--admin-light); padding: 1rem; border-radius: 0.375rem;">
                        <p style="margin-bottom: 0.25rem;"><strong>ID:</strong> #{{ $category->id }}</p>
                        <p style="margin-bottom: 0.25rem;"><strong>Productos asociados:</strong> {{ $category->products_count }}</p>
                        <p style="margin-bottom: 0.25rem;"><strong>Creada:</strong> {{ $category->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Última actualización:</strong> {{ $category->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <button type="submit" class="admin-btn admin-btn-primary" style="flex: 1;">Actualizar Categoría</button>
                    <a href="{{ route('admin.categories') }}" class="admin-btn admin-btn-outline" style="flex: 1;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection