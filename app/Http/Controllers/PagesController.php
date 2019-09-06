<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function inicio(){
        
        return view('welcome');
    }

    public function detalle($id){
        $empleados = App\Empleados::findOrFail($id);
        return view('empleados.detalle', compact('empleados'));
    }

    public function agregar(Request $request){
        // return $request->all();
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $empleadoNuevo = new App\Empleados;
        $empleadoNuevo->nombre = $request->nombre;
        $empleadoNuevo->descripcion = $request->descripcion;

        $empleadoNuevo->save();

        return back()->with('mensaje', 'Empleado agregado');
    }

    public function editar($id){
        $empleados = App\Empleados::findOrFail($id);
        return view('empleados.editar', compact('empleados'));
    }

    public function update(Request $request, $id){
        
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $empleadoActualizado = App\Empleados::find($id);
        $empleadoActualizado->nombre = $request->nombre;
        $empleadoActualizado->descripcion = $request->descripcion;
        $empleadoActualizado->save();
        return back()->with('mensaje', 'Empleado editado!');
    
    }

    public function eliminar($id){

        $empleadoEliminar = App\Empleados::findOrFail($id);
        $empleadoEliminar->delete();
    
        return back()->with('mensaje', 'Empleado Eliminado');
    }

    public function empleados(){
        $empleados = App\Empleados::all();
        return view('empleados.empleados', compact('empleados'));
    }

    public function fotos(){
        return view('fotos');
    }

    public function blog(){
        return view('blog');
    }



}
