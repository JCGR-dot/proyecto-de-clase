<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    @include('layout.navbar')

    <main class="container">
        <a href="index.html" class="back-button">← Volver al catálogo</a>
        
        <div class="product-detail">
            <div class="product-detail-header">
                <h2>Smartphone X10</h2>
                <span class="badge badge-available">Disponible</span>
            </div>
            
            <div class="product-detail-body">
                <table class="specs-table">
                    <tr>
                        <td>ID del Producto:</td>
                        <td><strong>PROD-001</strong></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td>Smartphone X10</td>
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
                    <p>
                        El Smartphone X10 es un dispositivo de última generación que combina 
                        potencia y elegancia. Cuenta con una pantalla OLED de 6.5 pulgadas con 
                        resolución 4K, procesador de 8 núcleos, 8GB de RAM y 256GB de 
                        almacenamiento interno. Su cámara triple de 48MP te permitirá capturar 
                        momentos increíbles con calidad profesional.
                    </p>
                    <p style="margin-top: 1rem;">
                        <strong>Características adicionales:</strong><br>
                        • Batería de 5000mAh con carga rápida<br>
                        • Resistencia al agua IP68<br>
                        • Android 14 con actualizaciones garantizadas<br>
                        • Desbloqueo facial y huella dactilar bajo pantalla
                    </p>
                </div>

                <div class="product-detail-price">
                    Precio: $599.99
                </div>

                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <button class="btn btn-primary" style="flex: 1;">Comprar ahora</button>
                    <button class="btn btn-outline" style="flex: 1;">Añadir al carrito</button>
                </div>
            </div>
        </div>
    </main>
    @include('layout.footer')
</body>
</html>