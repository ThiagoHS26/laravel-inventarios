<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return response()->json($warehouses);
    }

    public function show(Warehouse $warehouse)
    {
        return response()->json($warehouse);
    }
}