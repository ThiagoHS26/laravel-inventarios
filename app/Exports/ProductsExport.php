<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::with(['category', 'warehouse'])->get();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Descripción',
            'Precio',
            'Stock',
            'Categoría',
            'Almacén',
        ];
    }
}