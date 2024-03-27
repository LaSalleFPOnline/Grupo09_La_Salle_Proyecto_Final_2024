<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionUsuario;
use App\Models\Usuario;

class UsuariosController extends Controller
{
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
