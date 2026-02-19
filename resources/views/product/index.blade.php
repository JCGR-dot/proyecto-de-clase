<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: white;
            font-size: 2.5rem;
            margin-bottom: 40px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .productos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .producto-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            position: relative;
        }

        .producto-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        .producto-imagen {
            height: 200px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            position: relative;
            overflow: hidden;
        }

        .producto-imagen::after {
            content: '📦';
            font-size: 5rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.3;
        }

        .producto-info {
            padding: 20px;
        }

        .producto-id {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .producto-id::before {
            content: '🔖';
            font-size: 1rem;
        }

        .producto-nombre {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .producto-precio {
            font-size: 1.8rem;
            font-weight: bold;
            color: #4ecdc4;
            margin-bottom: 15px;
        }

        .producto-precio::before {
            content: '$';
            font-size: 1.2rem;
            margin-right: 2px;
        }

        .producto-descripcion {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .producto-estado {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .estado-disponible {
            background: #d4edda;
            color: #155724;
        }

        .estado-agotado {
            background: #f8d7da;
            color: #721c24;
        }

        .estado-oferta {
            background: #fff3cd;
            color: #856404;
        }

        .badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #ff6b6b;
            color: white;
            padding: 5px 15px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.9rem;
            box-shadow: 0 3px 10px rgba(255,107,107,0.3);
        }

        @media (max-width: 768px) {
            .productos-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 Catálogo de Productos</h1>
        
        <div class="productos-grid">
            <!-- Producto 1 -->
            <div class="producto-card">
                <div class="badge">Nuevo</div>
                <div class="producto-imagen"></div>
                <div class="producto-info">
                    <div class="producto-id">ID: PRO-001</div>
                    <div class="producto-nombre">Laptop Pro</div>
                    <div class="producto-precio">999.99</div>
                    <div class="producto-descripcion">Laptop de alta gama con procesador i7, 16GB RAM y 512GB SSD</div>
                    <span class="producto-estado estado-disponible">Disponible</span>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="producto-card">
                <div class="producto-imagen"></div>
                <div class="producto-info">
                    <div class="producto-id">ID: PRO-002</div>
                    <div class="producto-nombre">Smartphone X</div>
                    <div class="producto-precio">699.99</div>
                    <div class="producto-descripcion">Smartphone con pantalla AMOLED 6.5", cámara 108MP</div>
                    <span class="producto-estado estado-oferta">En Oferta</span>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="producto-card">
                <div class="producto-imagen"></div>
                <div class="producto-info">
                    <div class="producto-id">ID: PRO-003</div>
                    <div class="producto-nombre">Tablet Air</div>
                    <div class="producto-precio">449.99</div>
                    <div class="producto-descripcion">Tablet ligera con pantalla retina, ideal para diseño</div>
                    <span class="producto-estado estado-disponible">Disponible</span>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="producto-card">
                <div class="producto-imagen"></div>
                <div class="producto-info">
                    <div class="producto-id">ID: PRO-004</div>
                    <div class="producto-nombre">Audífonos Pro</div>
                    <div class="producto-precio">199.99</div>
                    <div class="producto-descripcion">Audífonos inalámbricos con cancelación de ruido</div>
                    <span class="producto-estado estado-agotado">Agotado</span>
                </div>
            </div>

            <!-- Producto 5 -->
            <div class="producto-card">
                <div class="badge">Nuevo</div>
                <div class="producto-imagen"></div>
                <div class="producto-info">
                    <div class="producto-id">ID: PRO-005</div>
                    <div class="producto-nombre">Monitor 4K</div>
                    <div class="producto-precio">399.99</div>
                    <div class="producto-descripcion">Monitor 27" 4K UHD con HDR, ideal para profesionales</div>
                    <span class="producto-estado estado-disponible">Disponible</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>