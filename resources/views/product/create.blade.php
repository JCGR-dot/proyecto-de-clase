<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .form-container {
            background: white;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '📝';
            font-size: 150px;
            position: absolute;
            bottom: -20px;
            right: -20px;
            opacity: 0.05;
            transform: rotate(15deg);
        }

        h1 {
            color: #2c3e50;
            font-size: 2.2rem;
            margin-bottom: 10px;
            position: relative;
        }

        .subtitle {
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        label i {
            margin-right: 8px;
            color: #3498db;
        }

        input, textarea, select {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s;
            background: #f8f9fa;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 4px rgba(52,152,219,0.1);
            background: white;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon input {
            padding-left: 45px;
        }

        .input-icon .icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #95a5a6;
            font-size: 1.2rem;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .estado-options {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .estado-option {
            flex: 1;
            position: relative;
        }

        .estado-option input[type="radio"] {
            display: none;
        }

        .estado-option label {
            display: block;
            padding: 15px;
            text-align: center;
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s;
            margin: 0;
            text-transform: none;
            letter-spacing: normal;
            font-weight: normal;
        }

        .estado-option input[type="radio"]:checked + label {
            background: #3498db;
            color: white;
            border-color: #3498db;
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(52,152,219,0.3);
        }

        button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(24,90,157,0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .preview-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            padding: 20px;
            margin-top: 30px;
            color: white;
        }

        .preview-title {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .preview-content {
            font-size: 1.2rem;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 25px;
            }

            .row {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>✨ Registrar Nuevo Producto</h1>
        <div class="subtitle">Completa todos los campos para agregar un producto al catálogo</div>

        <form>
            <div class="form-group">
                <label><i>🔑</i> ID del Producto</label>
                <div class="input-icon">
                    <span class="icon">#</span>
                    <input type="text" placeholder="Ej: PRO-006" value="PRO-006" readonly>
                </div>
                <small style="color: #7f8c8d; margin-top: 5px; display: block;">ID autogenerado</small>
            </div>

            <div class="row">
                <div class="form-group">
                    <label><i>📦</i> Nombre del Producto</label>
                    <input type="text" placeholder="Ej: Laptop Gaming" value="Smartwatch Ultra">
                </div>

                <div class="form-group">
                    <label><i>💰</i> Precio</label>
                    <div class="input-icon">
                        <span class="icon">$</span>
                        <input type="number" step="0.01" placeholder="0.00" value="299.99">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label><i>📝</i> Descripción</label>
                <textarea placeholder="Describe las características del producto...">Smartwatch con monitor de frecuencia cardíaca, GPS integrado y resistencia al agua. Ideal para deportistas y uso diario.</textarea>
            </div>

            <div class="form-group">
                <label><i>⚡</i> Estado del Producto</label>
                <div class="estado-options">
                    <div class="estado-option">
                        <input type="radio" name="estado" id="disponible" checked>
                        <label for="disponible">✅ Disponible</label>
                    </div>
                    <div class="estado-option">
                        <input type="radio" name="estado" id="oferta">
                        <label for="oferta">🔥 En Oferta</label>
                    </div>
                    <div class="estado-option">
                        <input type="radio" name="estado" id="agotado">
                        <label for="agotado">❌ Agotado</label>
                    </div>
                </div>
            </div>

            <div class="preview-section">
                <div class="preview-title">Vista previa del producto</div>
                <div class="preview-content">
                    Smartwatch Ultra - $299.99 (Disponible)
                </div>
            </div>

            <button type="submit">
                <span>📦 Registrar Producto</span>
            </button>
        </form>
    </div>
</body>
</html>