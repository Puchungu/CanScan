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
        $producto = Productos::with('componentes')->where('codigo_barra', $barcode)->get();
        if ($producto->isEmpty()) {
        return redirect()->back()->with('error', 'Producto no encontrado.');
    }
        return view('Producto', compact('producto'));
    }
}
