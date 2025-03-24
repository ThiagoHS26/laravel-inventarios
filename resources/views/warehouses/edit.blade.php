@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Editar Almacén</h1>
    <form action="{{ route('warehouses.update', $warehouse->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $warehouse->name }}" required>
        </div>
        <div class="form-group">
            <label for="location">Ubicación</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $warehouse->location }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection