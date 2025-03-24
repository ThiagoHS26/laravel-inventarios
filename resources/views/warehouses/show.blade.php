@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles del Almacén</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $warehouse->name }}</h5>
            <p class="card-text"><strong>Ubicación:</strong> {{ $warehouse->location }}</p>
            <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection