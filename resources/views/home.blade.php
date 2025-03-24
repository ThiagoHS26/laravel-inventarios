@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Resumen General</h1>

    <!-- Tarjetas de Resumen -->
    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Usuarios registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-fw fa-users"></i>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalProducts }}</h3>
                <p>Total Productos</p>
              </div>
              <div class="icon">
                <i class="fas fa-fw fa-cubes"></i>
              </div>
            </div>
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalCategories }}</h3>
                <p>Total Categorías</p>
              </div>
              <div class="icon">
              <i class="fas fa-fw fa-list"></i>
              </div>
            </div>
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalWarehouses }}</h3>

                <p>Total Almacenes</p>
              </div>
              <div class="icon">
              <i class="fas fa-fw fa-store"></i>
              </div>
            </div>
        </div>
          
    </div>

    <!-- Gráfico de Distribución por Categoría -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title">
                    <h5 class="card-title">Distribución de Productos por Categoría</h5>
                </div>
                <div class="card-body">
                    <canvas id="categoryChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para el Gráfico -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('js')
<script>
    const ctx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico (barra)
        data: {
            labels: @json($categoryLabels), // Nombres de las categorías
            datasets: [{
                label: 'Productos por Categoría',
                data: @json($categoryData), // Cantidad de productos por categoría
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
@endsection