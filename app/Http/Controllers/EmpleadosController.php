<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;

class EmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $usuarioEmail = auth()->user()->email;
        $empleados = Empleados::where('usuario', $usuarioEmail)->paginate(5);
        return view('empleados.lista',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'cargo' => 'required'
        ]);

        $empleados = new Empleados();
        $empleados->nombre = $request->nombre;
        $empleados->cargo = $request->cargo;
        $empleados->usuario = auth()->user()->email;
        $empleados->save();

        return back()->with('mensaje', 'Empleado Agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleados::findOrFail($id);
        
        return view('empleados.editar',compact('empleados'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'cargo' => 'required'
        ]);

        $empleadoActualizado = Empleados::find($id);
        $empleadoActualizado->nombre = $request->nombre;
        $empleadoActualizado->cargo = $request->cargo;
        
        $empleadoActualizado->save();
        return back()->with('mensaje', 'Empleado editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleadoEliminar = Empleados::findOrFail($id);
        $empleadoEliminar->delete();

        return back()->with('mensaje', 'Empleado Eliminado');
    }
}
