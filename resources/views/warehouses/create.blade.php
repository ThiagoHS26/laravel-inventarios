@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Crear Almacén</h1>
    <form action="{{ route('warehouses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Ubicación</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection