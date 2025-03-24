@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select name="role" id="role" class="form-control" required>
                <option value="Administrador" {{ $user->role == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="Editor" {{ $user->role == 'Editor' ? 'selected' : '' }}>Editor</option>
                <option value="Lector" {{ $user->role == 'Lector' ? 'selected' : '' }}>Lector</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection