@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles de la Categoría</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $category->description }}</p>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection