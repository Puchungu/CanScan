<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\Productos;
use App\Mail\ReporteDeUsuario;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    private const EMAIL_VALIDATION_RULES = 'required|email';
    private const USERNAME_VALIDATION_RULES = 'required|max:30|unique:usuarios';
    private const PASSWORD_VALIDATION_RULES = 'required|min:8';
    private const NAME_VALIDATION_RULES = 'required|string|alpha_spaces|max:100';

    
    public function registrar(Request $request){
       $validated = $request->validate([
            'nombre' => self::NAME_VALIDATION_RULES,
            'username' => self::USERNAME_VALIDATION_RULES,
            'email' => self::EMAIL_VALIDATION_RULES,
            'password' => self::PASSWORD_VALIDATION_RULES
        ]);
        //Encripta la contraseña antes de guardarla
        $validated['password'] = Hash::make($validated['password']);
        // Crea el usuario en la base de datos
        $user = Usuarios::create($validated);
        Auth::login($user);
        $user->sendEmailVerificationNotification();
        return redirect()->route('verification.notice')->with('success', 'Usuario registrado correctamente.');
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
        $productos = Productos::inRandomOrder()->take(6)->get(); // 6 productos aleatorios
        return view('inicio', compact('productos'));
    }

    public function iniciarSesion(Request $request)
    {
    $validated = $request->validate([
        'email' => self::EMAIL_VALIDATION_RULES,
        'password' => 'required|min:8',
    ]);

    $redirect = redirect()->route('mostrar.Inicio'); // valor por defecto

    if (!Auth::attempt($validated)) {
        $redirect = redirect()->route('login')->with('error', 'El correo o la contraseña son incorrectos.');
    } else {
        $request->session()->regenerate();
        $user = Auth::user();

        $showTutorial = !$user->has_seen_tutorial;
        if ($showTutorial) {
            $user->has_seen_tutorial = true;
            $user->save();
        }
        session(['show_tutorial' => $showTutorial]);

        if ($user->username !== 'admin' && $user->email_verified_at === null) {
            Auth::logout();
            $redirect = redirect()->route('login')->with('error', 'Por favor, verifica tu correo electrónico antes de iniciar sesión.');
        } elseif ($user->username === 'admin') {
            $redirect = redirect()->route('admin.productos.index');
        }
    }

    return $redirect;
    }

    public function cerrarSesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('mostrar.Inicio');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'nombre' => self::NAME_VALIDATION_RULES,
            'username' => 'required|max:30|unique:usuarios,username,' . $user->id,
            'email' => 'required|email|unique:usuarios,email,' . $user->id,
        ]);

        try {
            $user->update($validated);
            return back()->with('success', 'Perfil actualizado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar el perfil.');
        }
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|in:1,2,3,4'
        ]);

        $user = auth()->user();
        $user->avatar = $request->avatar;
        $user->save();

        return back()->with('success', 'Avatar actualizado correctamente');
    }

    //Mostrar formulario "Olvidé mi contraseña"
    public function showForgotPasswordForm()
    {
        return view('forgot'); //vista para pedir enlace de reset
    }

    //Enviar enlace de restablecimiento
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('users')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    //Mostrar formulario para nueva contraseña
    public function showResetForm(Request $request, $token)
    {
        return view('reset', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    //Guardar la nueva contraseña
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::broker('users')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));
                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Debes ingresar tu contraseña actual.',
            'new_password.required' => 'Debes ingresar una nueva contraseña.',
            'new_password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'new_password.confirmed' => 'La confirmación de la nueva contraseña no coincide.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'La contraseña actual es incorrecta.');
        }

        if (Hash::check($request->new_password, $user->password)) {
            return back()->with('error', 'La nueva contraseña no puede ser igual a la actual.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Contraseña actualizada correctamente.');
    }
    public function showSupportCenter()
    {
        return view('support-center');
    }
    public function showFAQs(){
        return view('faqs');
    }
    public function showContactForm()
    {
        return view('contact');
    }
    public function submitContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'motivo' => 'required|string|in:error,sugerencia,consulta',
            'asunto' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $usuario = Auth::user();

        Mail::to('soporte@canscan.site')->queue(new ReporteDeUsuario($validatedData, $usuario));

        return back()->with('success', '¡Gracias! Hemos recibido tu mensaje y te responderemos pronto.');
    }
}
