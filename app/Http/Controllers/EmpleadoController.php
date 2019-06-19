<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empleado::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'nombres' => 'required|max:50',
            'apellido' => 'required|max:50',
            'cedula' => 'required|max:20',
            'email' => 'required|max:50|email|unique:empleados',
            'lugar_nacimiento' => 'required|max:50',
            'sexo' => 'required|max:50',
            'estado_civil' => 'required|max:50',
            'telefono' => 'required|max:25000000|numeric'
        ]);

        $empleado = new Empleado;
        $empleado -> nombres = $request->input('nombres');
        $empleado -> apellido = $request->input('apellido');
        $empleado -> cedula = $request->input('cedula');
        $empleado -> email = $request->input('email');
        $empleado -> lugar_nacimiento = $request->input('lugar_nacimiento');
        $empleado -> sexo = $request->input('sexo');
        $empleado -> estado_civil = $request->input('estado_civil');
        $empleado -> telefono = $request->input('telefono');
        $empleado -> save();
        return 'Usuario creado';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado = Empleado::findOrFail($empleado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
