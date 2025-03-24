@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="warehouse_id">Almacén</label>
            <select name="warehouse_id" id="warehouse_id" class="form-control" required>
                @foreach ($warehouses as $warehouse)
                <option value="{{ $warehouse->id }}" {{ $product->warehouse_id == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection