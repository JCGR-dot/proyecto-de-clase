@extends('layout.app')
@section('content')
<main class="container">
        <h1>Nuestros Productos</h1>
        
        <div class="product-grid">
            <!-- Producto 1 -->
            <div class="product-card">
                <div class="product-image">📱</div>
                <div class="product-info">
                    <h3>Smartphone X10</h3>
                    <p class="product-description">Teléfono inteligente con pantalla OLED de 6.5"</p>
                    <p class="product-price">$599.99</p>
                    <span class="product-status status-available">Disponible</span>
                </div>
                <div class="product-actions">
                    <a href="show.html?id=1" class="btn btn-primary">Ver detalles</a>
                    <button class="btn btn-outline">Comprar</button>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="product-card">
                <div class="product-image">💻</div>
                <div class="product-info">
                    <h3>Laptop Pro 15</h3>
                    <p class="product-description">Laptop profesional para diseño y programación</p>
                    <p class="product-price">$1,299.99</p>
                    <span class="product-status status-limited">Últimas unidades</span>
                </div>
                <div class="product-actions">
                    <a href="show.html?id=2" class="btn btn-primary">Ver detalles</a>
                    <button class="btn btn-outline">Comprar</button>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="product-card">
                <div class="product-image">🎧</div>
                <div class="product-info">
                    <h3>Auriculares Bluetooth</h3>
                    <p class="product-description">Auriculares inalámbricos con cancelación de ruido</p>
                    <p class="product-price">$89.99</p>
                    <span class="product-status status-available">Disponible</span>
                </div>
                <div class="product-actions">
                    <a href="show.html?id=3" class="btn btn-primary">Ver detalles</a>
                    <button class="btn btn-outline">Comprar</button>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="product-card">
                <div class="product-image">⌚</div>
                <div class="product-info">
                    <h3>Smartwatch Active</h3>
                    <p class="product-description">Reloj inteligente con monitor de actividad física</p>
                    <p class="product-price">$199.99</p>
                    <span class="product-status status-available">Disponible</span>
                </div>
                <div class="product-actions">
                    <a href="show.html?id=4" class="btn btn-primary">Ver detalles</a>
                    <button class="btn btn-outline">Comprar</button>
                </div>
            </div>

            <!-- Producto 5 -->
            <div class="product-card">
                <div class="product-image">📷</div>
                <div class="product-info">
                    <h3>Cámara Mirrorless</h3>
                    <p class="product-description">Cámara profesional con lente intercambiable</p>
                    <p class="product-price">$899.99</p>
                    <span class="product-status status-out">Agotado</span>
                </div>
                <div class="product-actions">
                    <a href="show.html?id=5" class="btn btn-primary">Ver detalles</a>
                    <button class="btn btn-outline" disabled>Comprar</button>
                </div>
            </div>
        </div>
</main>
@endsection