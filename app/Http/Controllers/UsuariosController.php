<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Request\ValidacionLogin;
use App\Http\Request\ValidacionUsuario;

class UsuariosController extends Controller
{
    public function login(ValidacionLogin $request)
    {
        $credentials = $request->post();

        $email = $credentials['Email'];
        $password = $credentials['Password'];

        if (Auth::attempt(['Email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function loginView()
    {
        return view('usuarios.login.index');
    }

    public function crearClienteView()
    {
        return view('usuarios.registro.index');
    }

    public function listar()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact(['usuarios'])); 
    }

    public function crear()
    {
        return view('usuarios.crear');
    }

    public function guardar(ValidacionUsuario $request)
    {
        if (Usuario::create($request->all())) {
            return redirect()->route('listar_usuarios')->with('mensaje', 'La usuario ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $usuario = Usuario::find($id);

        return view('usuarios.editar', compact(['usuario'])); 
    }

    public function actualizar(ValidacionUsuario $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->update($request->all());
        return redirect()->route('listar_usuarios')->with('mensaje', 'La Usuario ha sido actualizada correctamente.');
    } 

    public function eliminar($id) 
    {
        Usuario::destroy($id);

        return redirect()->route('listar_usuarios');
    } 
}
