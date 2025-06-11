<?php

namespace App\Http\Controllers;
use App\Models\Productos;
use Illuminate\Http\Request;

class productosController extends Controller
{
    public function mostrarProductos()
    {
        return view('barcode-list');
    }
    public function mostrarProducto(Request $request)
    {
        $barcode = $request->input('barcode');
        $productos = Productos::all();
        return view('Producto', compact('productos'));
    }
}
