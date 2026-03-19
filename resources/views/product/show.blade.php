@extends('layout.app')

@section('content')
<main class="container">
    <a href="{{ route('product.index') }}" class="back-button">← Volver al catálogo</a>
    
    <div class="product-detail">
        <div class="product-detail-header">
            <h2>{{ $producto->name }}</h2>
            <span class="badge badge-available">Disponible</span>
        </div>
        
        <div class="product-detail-body">
            @if($producto->image)
            <div style="text-align: center; margin-bottom: 2rem;">
                <img src="{{ asset('storage/'.$producto->image) }}" 
                     alt="{{ $producto->name }}" 
                     style="max-width: 100%; max-height: 300px; border-radius: 0.5rem; object-fit: contain;">
            </div>
            @endif

            <table class="specs-table">
                <tr>
                    <td>ID del Producto:</td>
                    <td><strong>#{{ $producto->id }}</strong></td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>{{ $producto->name }}</td>
                </tr>
                <tr>
                    <td>Categoría:</td>
                    <td>
                        @if($producto->category)
                            <strong>{{ $producto->category->name }}</strong>
                        @else
                            <span class="badge badge-out">Sin categoría</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><strong>${{ number_format($producto->price, 2) }}</strong></td>
                </tr>
                <tr>
                    <td>Estado:</td>
                    <td>
                        <span class="badge badge-available">Disponible</span>
                    </td>
                </tr>
                <tr>
                    <td>Fecha de registro:</td>
                    <td>{{ $producto->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            </table>

            <div class="product-detail-description">
                <h3>Descripción del producto</h3>
                <p>{{ $producto->description }}</p>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <button class="btn btn-primary" style="flex: 1;">Comprar ahora</button>
                <button class="btn btn-outline" style="flex: 1;">Añadir al carrito</button>
            </div>
        </div>
    </div>
</main>
@endsection