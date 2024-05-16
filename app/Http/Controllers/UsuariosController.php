<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Request\ValidacionLogin;
use App\Http\Request\ValidacionUsuario;
use App\Http\Request\ValidacionRegistro;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class UsuariosController extends Controller
{
    public function registro(ValidacionRegistro $request)
    {
        $data = $request->post();

        $nombre = $data['Nombre'];
        $email = $data['Email'];
        $password = $data['Password'];

        $usuario = Usuario::where('Email', $email)->get();

        if (!empty($usuario)) {
            return view('usuarios.registro.index')->with(['message' => 'Hubo un error al crear la cuenta']);
        }

        $usuario = Usuario::create([
                'Nombre' => $nombre,
                'Email' => $email,
                'Password' => Hash::make($password), //uses bcrypt
        ]);

        if (!$usuario) {
            return view('usuarios.registro.index')->with(['message' => 'Hubo un error al crear la cuenta']);
        }

        return view('usuarios.login.index');
    }

    public function login(ValidacionLogin $request)
    {
        $credentials = $request->post();

        $email = $credentials['Email'];
        $password = $credentials['Password'];

        if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            $request->session()->regenerate();
            return view('inicio.index');
        }

        var_dump('no login');die();
 
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
        Session::flash('usuarios', $usuarios);
        return view('usuarios.index', compact('usuarios')); 
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
    
    public function informe() {
        
        $usuarios = Session::get('usuarios');
        Session::reflash();
        $options = new Options();
        $options->set('tempDir', public_path('temp'));
        $options->set('logOutputFile', storage_path('logs/dompdf_log.txt'));
        $options->set('isHtml5ParserEnabled', true); 
        $options->set('isPhpEnabled', true);
        $pdf = new Dompdf($options);
        $pdf->loadHtml(View::make('usuarios.informe', compact('usuarios')));
        $pdf->render();
        return response($pdf->output())->header('Content-Type', 'application/pdf');

    }
}
