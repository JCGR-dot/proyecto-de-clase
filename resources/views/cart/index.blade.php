@extends('layout.app')

@section('title', 'Mi Carrito')

@section('content')
<main class="container">
    <h1>Mi Carrito de Compras</h1>
    
    @if(session('success'))
        <div style="background-color: #d1fae5; border: 1px solid #10b981; color: #065f46; padding: 1rem; border-radius: 0.375rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <div style="text-align: center; padding: 3rem; background: white; border-radius: 0.5rem; box-shadow: var(--shadow);">
            <p style="font-size: 1.2rem; color: #6b7280; margin-bottom: 1.5rem;">Tu carrito está vacío</p>
            <a href="{{ route('product.index') }}" class="btn btn-primary">Ver Productos</a>
        </div>
    @else
        <div class="cart-container" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
            <!-- Lista de productos -->
            <div style="background: white; border-radius: 0.5rem; box-shadow: var(--shadow); padding: 1.5rem;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--border-color);">
                            <th style="padding: 1rem; text-align: left;">Producto</th>
                            <th style="padding: 1rem; text-align: center;">Precio</th>
                            <th style="padding: 1rem; text-align: center;">Cantidad</th>
                            <th style="padding: 1rem; text-align: center;">Subtotal</th>
                            <th style="padding: 1rem; text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr style="border-bottom: 1px solid var(--border-color);">
                            <td style="padding: 1rem; display: flex; align-items: center; gap: 1rem;">
                                @if($item->product->image)
                                    <img src="{{ asset('storage/'.$item->product->image) }}" 
                                         alt="{{ $item->product->name }}"
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 0.375rem;">
                                @else
                                    <div style="width: 60px; height: 60px; background: var(--light-color); border-radius: 0.375rem;"></div>
                                @endif
                                <div>
                                    <strong>{{ $item->product->name }}</strong>
                                    <br>
                                    <small style="color: #6b7280;">{{ Str::limit($item->product->description, 50) }}</small>
                                </div>
                            </td>
                            <td style="padding: 1rem; text-align: center;">
                                ${{ number_format($item->product->price, 2) }}
                            </td>
                            <td style="padding: 1rem; text-align: center;">
                                <form action="{{ route('cart.update', $item) }}" method="POST" style="display: flex; justify-content: center; gap: 0.5rem;">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" 
                                           name="quantity" 
                                           value="{{ $item->quantity }}" 
                                           min="1" max="10"
                                           style="width: 70px; padding: 0.25rem; text-align: center; border: 1px solid var(--border-color); border-radius: 0.25rem;">
                                    <button type="submit" class="btn btn-outline" style="padding: 0.25rem 0.75rem;">✓</button>
                                </form>
                            </td>
                            <td style="padding: 1rem; text-align: center; font-weight: bold; color: var(--primary-color);">
                                ${{ number_format($item->product->price * $item->quantity, 2) }}
                            </td>
                            <td style="padding: 1rem; text-align: center;">
                                <form action="{{ route('cart.remove', $item) }}" method="POST" onsubmit="return confirm('¿Eliminar producto del carrito?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-cancel" style="padding: 0.25rem 0.75rem;">🗑️</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div style="margin-top: 2rem; display: flex; justify-content: space-between;">
                    <a href="{{ route('product.index') }}" class="btn btn-outline">← Seguir Comprando</a>
                    <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('¿Vaciar carrito?');">
                        @csrf
                        <button type="submit" class="btn btn-cancel">Vaciar Carrito</button>
                    </form>
                </div>
            </div>
            
            <!-- Resumen de compra -->
            <div style="background: white; border-radius: 0.5rem; box-shadow: var(--shadow); padding: 1.5rem; height: fit-content;">
                <h2 style="margin-bottom: 1.5rem;">Resumen de Compra</h2>
                
                <div style="border-bottom: 1px solid var(--border-color); padding-bottom: 1rem; margin-bottom: 1rem;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                        <span>Subtotal ({{ $cartItems->sum('quantity') }} productos):</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                        <span>Envío:</span>
                        <span>Por calcular</span>
                    </div>
                </div>
                
                <div style="display: flex; justify-content: space-between; font-size: 1.2rem; font-weight: bold; margin-bottom: 2rem;">
                    <span>Total:</span>
                    <span style="color: var(--primary-color);">${{ number_format($total, 2) }}</span>
                </div>
                
                <a href="#" class="btn btn-primary" style="display: block; text-align: center; padding: 1rem;">
                    Proceder al Pago
                </a>
            </div>
        </div>
    @endif
</main>

<style>
    @media (max-width: 768px) {
        .cart-container {
            grid-template-columns: 1fr !important;
        }
        
        table {
            font-size: 0.9rem;
        }
        
        td {
            padding: 0.5rem !important;
        }
    }
</style>
@endsection