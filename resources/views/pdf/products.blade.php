<!DOCTYPE html>
<html>
<head>
    <title>Listado de Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Almacén</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>