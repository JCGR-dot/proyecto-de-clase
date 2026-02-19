<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especificaciones del Producto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .specs-container {
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: 40px;
            box-shadow: 0 30px 70px rgba(0,0,0,0.2);
            overflow: hidden;
            position: relative;
        }

        .specs-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .specs-header::after {
            content: '📊';
            font-size: 150px;
            position: absolute;
            right: 20px;
            top: -20px;
            opacity: 0.1;
            transform: rotate(10deg);
        }

        .product-badge {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 20px;
            backdrop-filter: blur(5px);
        }

        .product-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .product-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .specs-content {
            padding: 40px;
        }

        .specs-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-bottom: 40px;
        }

        .spec-item {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 25px;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .spec-item:hover {
            border-color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102,126,234,0.1);
        }

        .spec-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #95a5a6;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .spec-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .spec-value.price {
            color: #27ae60;
            font-size: 2rem;
        }

        .spec-value.id {
            font-family: monospace;
            background: #ecf0f1;
            padding: 5px 15px;
            border-radius: 15px;
            display: inline-block;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 25px;
            border-radius: 30px;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .status-disponible {
            background: #d4edda;
            color: #155724;
        }

        .status-oferta {
            background: #fff3cd;
            color: #856404;
        }

        .description-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 30px;
            border-radius: 25px;
            margin-top: 30px;
        }

        .description-title {
            font-size: 1.3rem;
            color: #2c3e50;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .description-text {
            color: #34495e;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .features-list {
            margin-top: 40px;
        }

        .features-title {
            font-size: 1.5rem;
            color: #2c3e50;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .feature-item {
            background: white;
            border: 2px solid #e0e0e0;
            padding: 15px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
        }

        .feature-item:hover {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea10, #764ba210);
        }

        .feature-icon {
            font-size: 1.5rem;
        }

        .feature-text {
            font-size: 1rem;
            color: #2c3e50;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 40px;
        }

        .btn {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102,126,234,0.4);
        }

        .btn-secondary {
            background: #e0e0e0;
            color: #2c3e50;
        }

        .btn-secondary:hover {
            background: #d0d0d0;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .specs-grid {
                grid-template-columns: 1fr;
            }

            .product-title {
                font-size: 2rem;
            }

            .specs-header {
                padding: 30px;
            }

            .specs-content {
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <div class="specs-container">
        <div class="specs-header">
            <span class="product-badge">⚡ Producto Destacado</span>
            <div class="product-title">Laptop Pro X1</div>
            <div class="product-subtitle">Edición Especial - Rendimiento extremo</div>
        </div>

        <div class="specs-content">
            <div class="specs-grid">
                <div class="spec-item">
                    <div class="spec-label">🔑 ID del Producto</div>
                    <div class="spec-value id">PRO-001-2024</div>
                </div>

                <div class="spec-item">
                    <div class="spec-label">💰 Precio</div>
                    <div class="spec-value price">$1,299.99</div>
                </div>

                <div class="spec-item">
                    <div class="spec-label">📊 Estado</div>
                    <div class="spec-value">
                        <span class="status-badge status-disponible">✅ Disponible</span>
                    </div>
                </div>

                <div class="spec-item">
                    <div class="spec-label">📦 Categoría</div>
                    <div class="spec-value">Electrónica / Computadoras</div>
                </div>
            </div>

            <div class="description-box">
                <div class="description-title">
                    <span>📝</span> Descripción del Producto
                </div>
                <div class="description-text">
                    Laptop profesional de alto rendimiento con procesador Intel Core i9 de 13ª generación, 
                    32GB de RAM DDR5 y 1TB SSD NVMe. Ideal para desarrollo de software, edición de video 
                    y gaming. Incluye tarjeta gráfica dedicada NVIDIA RTX 4080.
                </div>
            </div>

            <div class="features-list">
                <div class="features-title">
                    <span>✨</span> Características Principales
                </div>
                <div class="features-grid">
                    <div class="feature-item">
                        <span class="feature-icon">💻</span>
                        <span class="feature-text">Pantalla 16" 4K OLED</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">⚡</span>
                        <span class="feature-text">Intel Core i9-13900H</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🎮</span>
                        <span class="feature-text">NVIDIA RTX 4080</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">💾</span>
                        <span class="feature-text">32GB RAM + 1TB SSD</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🔋</span>
                        <span class="feature-text">Batería 8 horas</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🎧</span>
                        <span class="feature-text">Audio Harman Kardon</span>
                    </div>
                </div>
            </div>

            <div class="specs-grid" style="margin-top: 30px; grid-template-columns: repeat(3, 1fr);">
                <div class="spec-item">
                    <div class="spec-label">📏 Dimensiones</div>
                    <div class="spec-value">35.6 x 24.5 x 1.8 cm</div>
                </div>
                <div class="spec-item">
                    <div class="spec-label">⚖️ Peso</div>
                    <div class="spec-value">2.1 kg</div>
                </div>
                <div class="spec-item">
                    <div class="spec-label">📅 Garantía</div>
                    <div class="spec-value">2 años</div>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary">🛒 Agregar al Carrito</button>
                <button class="btn btn-secondary">⭐ Agregar a Favoritos</button>
            </div>
        </div>
    </div>
</body>
</html>