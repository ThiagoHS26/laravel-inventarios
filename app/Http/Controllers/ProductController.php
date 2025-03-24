<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProductResource;

use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /*public function index()
    {
        $products = Product::with(['category', 'warehouse'])->get();
        return view('products.index', compact('products'));
    }*/
    public function index()
    {
        $products = Product::with(['category', 'warehouse'])->get();

        if (request()->wantsJson()) {
            return response()->json(['data' => $products]); // Respuesta JSON para API
        }

        return view('products.index', compact('products')); // Vista para web
    }

    public function create()
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();
        return view('products.create', compact('categories', 'warehouses'));
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    /*public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }*/
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();
        return view('products.edit', compact('product', 'categories', 'warehouses'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }

    /*Exportar datos en formato PDF */
    public function exportPdf()
    {
        $products = Product::with(['category', 'warehouse'])->get();
        $pdf = Pdf::loadView('pdf.products', compact('products'));
        return $pdf->download('productos.pdf');
    }

    /*Exportar datos en formato .xlsx */
    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'productos.xlsx');
    }
}