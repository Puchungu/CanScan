<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Componentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductosController extends Controller
{
    public function mostrarProducto(Request $request)
    {
        $request->validate([
            'barcode' => 'required|string',
        ]);

        $barcode = $request->input('barcode');

        // 1️⃣ Buscar en BD local
        $producto = Productos::with('componentes')->where('codigo_barra', $barcode)->first();
        if ($producto) {
            return view('Producto', compact('producto'));
        }

        // 2️⃣ Buscar en USDA
        try {
            $response = Http::withoutVerifying()->get('https://api.nal.usda.gov/fdc/v1/foods/search', [
                'api_key' => config('services.usda.key'),
                'query' => $barcode,
                'pageSize' => 1
            ]);

            if ($response->successful() && !empty($response['foods'][0])) {
                $food = $response['foods'][0];

                // Guardar producto
                $producto = new Productos();
                $producto->codigo_barra = $barcode;
                $producto->nombre = $food['description'] ?? 'Producto sin nombre';
                $producto->marca = $food['brandOwner'] ?? 'Desconocida';
                $producto->descripcion = $food['ingredients'] ?? null;

                // Imagen por defecto
                $producto->img = 'images/default.webp';

                $producto->save();

                // Guardar nutrientes/ingredientes como componentes
                if (!empty($food['foodNutrients'])) {
                    foreach ($food['foodNutrients'] as $nutriente) {
                        $componente = new Componentes();
                        $componente->id_productos = $producto->id;
                        $componente->nombre = $nutriente['nutrientName'] ?? 'Nutriente';
                        $componente->descripcion = $nutriente['value'] ?? null;
                        $componente->save();
                    }
                }

                return view('Producto', compact('producto'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al conectar con la API USDA: ' . $e->getMessage());
        }

        // 3️⃣ Si no se encuentra
        return redirect()->back()->with('error', 'Producto no encontrado ni en la BD ni en la API USDA.');
    }
    public function inicio()
    {
        // 🔹 Opción 1: últimos 6 productos
        $productos = Productos::inRandomOrder()->take(6)->get();

        return view('home', compact('productos'));
    }

    public function verProducto($id)
    {
        // Buscar producto con sus componentes
        $producto = Productos::with('componentes')->findOrFail($id);

        // Retornar la vista de detalle del producto
        return view('Producto', compact('producto'));
    }

}
