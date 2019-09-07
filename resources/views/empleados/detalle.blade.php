@extends('layouts.app')

@section('content')
    
    <h1>Detalle del Empleado:</h1>
    <h4>ID Empleado: {{$empleados->id}} </h4>
    <h4>Nombre: {{$empleados->nombre}} </h4>
    <h4>Descripción: {{$empleados->descripcion}} </h4>

@endsection
