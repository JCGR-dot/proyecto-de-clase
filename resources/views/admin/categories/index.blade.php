@extends('layout.admin')

@section('title', 'Gestionar Categorías')

@section('admin-content')
    <div class="content-header">
        <div>
            <h1>Categorías</h1>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Inicio</a> / Categorías
            </div>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="admin-btn admin-btn-primary">+ Nueva Categoría</a>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; border: 1px solid #10b981; color: #065f46; padding: 1rem; border-radius: 0.375rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background-color: #fee2e2; border: 1px solid #ef4444; color: #991b1b; padding: 1rem; border-radius: 0.375rem; margin-bottom: 1.5rem;">
            {{ session('error') }}
        </div>
    @endif

    <div class="admin-card">
        <div class="card-header">
            <h2>Todas las Categorías</h2>
            <div style="display: flex; gap: 0.5rem;">
                <input type="text" id="searchInput" placeholder="Buscar categorías..." class="admin-form-control" style="width: 250px;">
                <button class="admin-btn admin-btn-outline" onclick="filterTable()">Buscar</button>
            </div>
        </div>
        <div class="card-body">
            <table class="admin-table" id="categoriesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Productos</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>#{{ $category->id }}</td>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td>{{ $category->description ?? 'Sin descripción' }}</td>
                        <td>
                            <span class="admin-badge badge-info">{{ $category->products_count }} productos</span>
                        </td>
                        <td>{{ $category->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Editar</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $categories->links() }}
        </div>
    </div>

    <script>
        function filterTable() {
            var input = document.getElementById('searchInput');
            var filter = input.value.toUpperCase();
            var table = document.getElementById('categoriesTable');
            var tr = table.getElementsByTagName('tr');

            for (var i = 1; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName('td')[1];
                if (td) {
                    var txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }
    </script>
@endsection