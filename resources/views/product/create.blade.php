@extends('layout.app')
@section('content')
<main class="container">
        <h1>Registrar Nuevo Producto</h1>
        
        <div class="form-container">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="id_producto">ID del Producto:</label>
                    <input type="text" id="id_producto" name="id_producto" required 
                           placeholder="Ej: PROD-001">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre del Producto:</label>
                    <input type="text" id="nombre" name="nombre" required 
                           placeholder="Ej: Smartphone X10">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="precio">Precio ($):</label>
                        <input type="number" id="precio" name="precio" step="0.01" required 
                               placeholder="0.00">
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select id="estado" name="estado" required>
                            <option value="">Selecciona un estado</option>
                            <option value="disponible">Disponible</option>
                            <option value="limitado">Últimas unidades</option>
                            <option value="agotado">Agotado</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required 
                              placeholder="Describe las características del producto..."></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">Registrar Producto</button>
                    <button type="reset" class="btn btn-cancel">Limpiar Formulario</button>
                </div>
            </form>
        </div>
</main>
@endsection