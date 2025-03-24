@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Producto</a>
    <a target="_blank" href="{{ route('products.export.pdf') }}" class="btn btn-danger">Exportar a PDF</a>
    <a target="_blank" href="{{ route('products.export.excel') }}" class="btn btn-success">Exportar a Excel</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Almacén</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->warehouse->name }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection