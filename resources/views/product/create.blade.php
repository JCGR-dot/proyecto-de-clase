@extends('layout.app')
@section('content')
<main class="container">
        <h1>Registrar Nuevo Producto</h1>
        
        <div class="form-container">
            <form action="{{route('product.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre del Producto:</label>
                    <input type="text" id="nombre" name="nombre"  
                           placeholder="Ej: Smartphone X10">
                    @error('nombre')
                        <span style="color:red;font-size:14px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="precio">Precio ($):</label>
                        <input type="number" id="precio" name="precio" step="0.01"
                               placeholder="0.00">
                        @error('precio')
                            <span style="color:red;font-size:14px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select id="estado" name="category" >
                            @foreach($categoryList as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion"  
                              placeholder="Describe las características del producto..."></textarea>
                    @error('id_producto')
                        <span style="color:red;font-size:14px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" name="imagen" type="file"  accept="image/*">
                    @error('imagen')
                        <span style="color:red;font-size:14px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">Registrar Producto</button>
                    <button type="reset" class="btn btn-cancel">Limpiar Formulario</button>
                </div>
            </form>
        </div>
</main>
@endsection