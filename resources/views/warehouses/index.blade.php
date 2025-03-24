@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Almacenes</h1>
    <a href="{{ route('warehouses.create') }}" class="btn btn-primary">Crear Almacén</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($warehouses as $warehouse)
            <tr>
                <td>{{ $warehouse->name }}</td>
                <td>{{ $warehouse->location }}</td>
                <td>
                    <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" style="display:inline;">
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