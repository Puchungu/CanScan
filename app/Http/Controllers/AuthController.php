<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Registrar(Request $request){
       $validated = $request->validate([
            'nombre' => 'required',
            'username' => 'required|max:30|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'password' => 'required|min:8'
        ]);
        //Mira si se ha subido una imagen y la convierte a binario, Si no se sube una imagen, se asigna null
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageBinary = file_get_contents($image->getRealPath());
            $validated['img'] = $imageBinary;
        } else {
            $validated['img'] = null;
        }
        //Encripta la contraseña antes de guardarla
        $validated['password'] = Hash::make($validated['password']);
        // Crea el usuario en la base de datos
        $user = Usuarios::create($validated);
        return redirect()->route('mostrar.Registro')->with('success', 'Usuario registrado correctamente.');
    }

    public function mostrarRegistro(){
        return view('registrarse');
    }

    public function mostrarInicioSesion()
    {
        return view('login');
    }
    public function mostrarInicio()
    {
        return view('inicio');
    }

    public function iniciarSesion(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:usuarios,email',
            'password' => 'required|min:8'
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return redirect()->route('mostrar.Inicio');
        }
    }

    public function cerrarSesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('mostrar.Inicio');
    }
}
