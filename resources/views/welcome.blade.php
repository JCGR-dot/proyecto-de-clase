@extends('layout.app')

@section('title', 'StoreUI - Tu Tienda Online')

@section('content')

{{-- Hero Section --}}
<section class="hero">
    <div class="container hero-content">
        <h1>Bienvenido a <span class="highlight">StoreUI</span></h1>
        <p class="hero-subtitle">Descubre productos increíbles con la mejor tecnología y los precios más competitivos. Simplificamos tus compras en línea.</p>
        <div class="hero-buttons">
            <a href="{{ route('product.index') }}" class="btn btn-primary btn-large">Ver Catálogo</a>
            <a href="{{ route('product.create') }}" class="btn btn-outline btn-large">Registrar Producto</a>
        </div>
    </div>
</section>

{{-- Features Section --}}
<section class="features">
    <div class="container">
        <h2>¿Por qué elegir <span class="highlight">StoreUI</span>?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🛒</div>
                <h3>Catálogo Extenso</h3>
                <p>Explora una amplia variedad de productos cuidadosamente seleccionados para ti.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Gestión Simple</h3>
                <p>Registra y administra tus productos de manera rápida e intuitiva.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Compra Segura</h3>
                <p>Tus transacciones y datos están protegidos con los más altos estándares.</p>
            </div>
        </div>
    </div>
</section>

{{-- Featured Products Section --}}
@if(isset($featuredProducts) && $featuredProducts->count() > 0)
<section class="featured-products">
    <div class="container">
        <h2>Productos <span class="highlight">Destacados</span></h2>
        
        <div class="product-grid">
            @foreach($featuredProducts as $product)
            <div class="product-card">
                @if($product->image)
                <img class="catalogImage" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                @else
                <img class="catalogImage" src="https://www.shutterstock.com/image-vector/defect-icon-element-design-600nw-2615276675.jpg" alt="Imagen por defecto">
                @endif
                <div class="product-info">
                    <h3>{{ $product->name }}</h3>
                    <p class="product-description">{{ Str::limit($product->description, 60) }}</p>
                    <p class="product-price">${{ number_format($product->price, 2) }}</p>
                    <span class="product-status status-available">Disponible</span>
                </div>
                <div class="product-actions">
                    <a href="{{ route('product.show', $product) }}" class="btn btn-primary">Ver detalles</a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center" style="margin-top: 2rem;">
            <a href="{{ route('product.index') }}" class="btn btn-outline">Ver todos los productos</a>
        </div>
    </div>
</section>
@endif

{{-- CTA Section --}}
<section class="cta-section">
    <div class="container cta-content">
        <h2>¿Tienes un producto para vender?</h2>
        <p>Únete a nuestra comunidad de vendedores y llega a miles de clientes potenciales.</p>
        <a href="{{ route('product.create') }}" class="btn btn-primary btn-large">Comenzar Ahora</a>
    </div>
</section>

{{-- Estilos específicos --}}
<style>
    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 5rem 0;
        text-align: center;
        margin-bottom: 3rem;
    }

    .hero-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .hero h1 {
        color: white;
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .hero .highlight {
        color: #ffd966;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        margin-bottom: 2rem;
        opacity: 0.95;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-large {
        padding: 0.75rem 2rem;
        font-size: 1.1rem;
    }

    /* Features Section */
    .features {
        padding: 4rem 0;
        background-color: white;
    }

    .features h2 {
        text-align: center;
        margin-bottom: 3rem;
        font-size: 2.2rem;
    }

    .features .highlight {
        color: var(--primary-color);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
    }

    .feature-card {
        text-align: center;
        padding: 2rem;
        border-radius: 0.5rem;
        background-color: var(--light-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow);
    }

    .feature-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .feature-card h3 {
        margin-bottom: 0.5rem;
        color: var(--dark-color);
    }

    .feature-card p {
        color: #6b7280;
        font-size: 0.95rem;
    }

    /* Featured Products Section */
    .featured-products {
        padding: 4rem 0;
        background-color: var(--light-color);
    }

    .featured-products h2 {
        text-align: center;
        margin-bottom: 3rem;
        font-size: 2.2rem;
    }

    .text-center {
        text-align: center;
    }

    /* CTA Section */
    .cta-section {
        background-color: var(--dark-color);
        color: white;
        padding: 4rem 0;
        text-align: center;
    }

    .cta-content {
        max-width: 700px;
        margin: 0 auto;
    }

    .cta-content h2 {
        color: white;
        font-size: 2.2rem;
        margin-bottom: 1rem;
    }

    .cta-content p {
        margin-bottom: 2rem;
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .cta-content .btn-primary {
        background-color: white;
        color: var(--dark-color);
    }

    .cta-content .btn-primary:hover {
        background-color: var(--light-color);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .features h2,
        .featured-products h2,
        .cta-content h2 {
            font-size: 1.8rem;
        }
    }
</style>

@endsection
