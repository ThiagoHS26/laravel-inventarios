@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles del Producto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $product->description }}</p>
            <p class="card-text"><strong>Precio:</strong> {{ $product->price }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
            <p class="card-text"><strong>Categoría:</strong> {{ $product->category->name }}</p>
            <p class="card-text"><strong>Almacén:</strong> {{ $product->warehouse->name }}</p>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection