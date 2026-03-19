@extends('layout.app')
@section('content')
<main class="container">
        <h1>Nuestros Productos</h1>
        
        <div class="product-grid">
            @foreach($misProductos as $product)
            <div class="product-card">
                @if($product->image)
                <img class="catalogImage" src="{{ asset('storage/'.$product->image) }}" alt="Imagen">
                @else
                <img class="catalogImage" src="https://www.shutterstock.com/image-vector/defect-icon-element-design-600nw-2615276675.jpg" alt="Imagen por defecto">
                @endif
                <div class="product-info">
                    <h3>{{$product->name}}</h3>
                    <p class="product-description">{{ Str::limit($product->description, 60) }}</p>
                    <p class="product-price">${{ number_format($product->price, 2) }}</p>
                    <span class="product-status status-available">Disponible</span>
                </div>
                <div class="product-actions">
                    <a href="{{ route('product.show', $product) }}" class="btn btn-primary">Ver detalles</a>
                    <button class="btn btn-outline">Comprar</button>
                </div>
            </div>
            @endforeach
        </div>
</main>
@endsection