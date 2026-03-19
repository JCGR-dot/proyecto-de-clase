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
            </table>

            <div class="product-detail-description">
                <h3>Descripción del producto</h3>
                <p>{{ $producto->description }}</p>
            </div>

            <!-- Formulario para agregar al carrito - SIN autenticación -->
            <form action="{{ route('cart.add', $producto) }}" method="POST" style="margin-top: 2rem;">
                @csrf
                <div style="display: flex; gap: 1rem; align-items: center; background: var(--light-color); padding: 1.5rem; border-radius: 0.5rem;">
                    <div style="flex: 1;">
                        <label for="quantity" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Cantidad:</label>
                        <input type="number" 
                               id="quantity" 
                               name="quantity" 
                               value="1" 
                               min="1" max="10"
                               style="width: 100px; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                    </div>
                    <button type="submit" class="btn btn-primary" style="padding: 0.75rem 2rem;">
                        Agregar al Carrito
                    </button>
                </div>
            </form>
            
            @if(session('success'))
                <div style="background-color: #d1fae5; border: 1px solid #10b981; color: #065f46; padding: 1rem; border-radius: 0.375rem; margin-top: 1rem;">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</main>
@endsection