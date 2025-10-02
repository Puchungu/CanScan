<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private  const MARCA_VALIDATION_RULES = 'nullable|string';
    private  const DESCRIPCION_VALIDATION_RULES = 'nullable|string';
    private  const IMG_VALIDATION_RULES = 'nullable|string';
// Mostrar todos los productos en la vista
    public function listarProductos()
    {
        $productos = Productos::all();
        return view('verprodadmin', compact('productos'));
    }

    // Mostrar formulario para crear un nuevo producto
    public function crearProducto()
    {
        return view('crearprodadmin');
    }

    // Guardar un nuevo producto en la base de datos
    public function guardarProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:productos,nombre|max:255',
            'codigo_barra' => 'required|string',
            'marca' => self::MARCA_VALIDATION_RULES,
            'descripcion' => self::DESCRIPCION_VALIDATION_RULES,
            'img' => self::IMG_VALIDATION_RULES,
        ]);

        Productos::create($request->all());

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto creado correctamente');
    }

    // Mostrar formulario para editar un producto existente
    public function editarProducto($id)
    {
        $producto = Productos::findOrFail($id);
        return view('editarprodadmin', compact('producto'));
    }

    // Actualizar los datos de un producto existente
    public function actualizarProducto(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:productos,nombre,' . $producto->id,
            'codigo_barra' => 'required|string',
            'marca' => self::MARCA_VALIDATION_RULES,
            'descripcion' => self::DESCRIPCION_VALIDATION_RULES,
            'img' => self::IMG_VALIDATION_RULES,
        ]);

        $producto->update($request->all());

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto actualizado correctamente');
    }

    // Eliminar un producto de la base de datos
    public function eliminarProducto($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto eliminado correctamente');
    }

    // Mostrar todos los usuarios en la vista
    public function listarUsuarios()
    {
        $usuarios = Usuarios::all();
        return view('verusuariosadmin', compact('usuarios'));
    }

    // Mostrar formulario para crear un nuevo usuario
    public function crearUsuario()
    {
        return view('crearusuarioadmin');
    }

    // Guardar un nuevo usuario en la base de datos
    public function guardarUsuario(Request $request)
    {
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'username' => 'required|string|unique:usuarios,username',
        'email' => 'required|string|email|unique:usuarios,email',
        'password' => 'required|string|min:8',
        'avatar' => 'nullable|string',
    ]);

    $validated['password'] = Hash::make($validated['password']);

    // Asegúrate de que este es el modelo correcto
    Usuarios::create($validated);

    return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado correctamente');
    }
    // Mostrar formulario para editar un usuario existente
    public function editarUsuario($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('editarusuarioadmin', compact('usuario'));
    }

    // Actualizar los datos de un usuario existente
    public function actualizarUsuario(Request $request, $id)
    {
        $usuario = Usuarios::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:usuarios,username,' . $usuario->id,
            'email' => 'required|string|email|max:255|unique:usuarios,email,' . $usuario->id,
        ]);

        $usuario->update($request->all());

        return redirect()->route('admin.usuarios.index')
                         ->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar un usuario de la base de datos
    public function eliminarUsuario($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')
                         ->with('success', 'Usuario eliminado correctamente');
    }
}
