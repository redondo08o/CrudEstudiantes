<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Http\Controllers\Controller;
use App\Models\Cursos;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Cursos::all()->where('est', '=', '1');
        $estu=Estudiantes::all()->where('est','=','1');
     return view('estudiante',['estudiantes'=>$estu,
    'cursos'=> $cursos
    ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
      

        $estudiante = new Estudiantes();

        $estudiante->nombres=$request->nombres;
        $estudiante->apellidos=$request->apellidos;
        $estudiante->telefono=$request->telefono;
        $estudiante->email= $request->correo;
        $estudiante->tp_doc = $request->tp_doc;
        $estudiante->n_doc = $request->n_doc;
        $estudiante->est = 1;
        $estudiante->id_curso = $request->id_curso;
        $estudiante->uid = uniqid();

        
        
        if ($estudiante->save()) {
            return response()->json([
                "mensaje" => "estudiante registrado con exito",
                "icono" => "success"
            ]);
        } else {
            return response()->json([
                "mensaje" => "Error: estudiante no registrado",
                "icono" => "error"
            ]);
        }

    

        
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante= Estudiantes::find($id);
        $cursos = Cursos::all()->where('est','=','1');

        $op = " ";
        foreach ( $cursos as $v) {
            $op .=$v->id == $estudiante->id_curso ? '<option value="'.$v->id.'" selected>'.$v->nombre.'</option>':'<option value="'.$v->id.'">'.$v->nombre.'</option>';
        }
$estudiante->id_curso = $op;
        
        return response()->json([
            $estudiante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $estudiante= Estudiantes::join('cursos','cursos.id','=','estudiantes.id_curso')->find($request->id);
        return view('dt_estudiante',['estudiante' => $estudiante]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $estudiante = Estudiantes::find($request->id);
        $estudiante->nombres=$request->nombres;
        $estudiante->apellidos=$request->apellidos;
        $estudiante->telefono=$request->telefono;
        $estudiante->email= $request->correo;
        $estudiante->tp_doc = $request->tp_doc;
        $estudiante->n_doc = $request->n_doc;
        
        $estudiante->id_curso = $request->id_curso;
        
        if ($estudiante->save()) {
            return response()->json([
                "mensaje" => "estudiante editado con exito",
                "icono" => "success"
            ]);
        } else {
            return response()->json([
                "mensaje" => "Error: estudiante no editado",
                "icono" => "error"
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiantes::find($id);
        $estudiante->est = 0;

        if ($estudiante->save()) {
            return response()->json([
                "mensaje" => "estudiante eliminado con exito",
                "icono" => "success"
            ]);
        } else {
            return response()->json([
                "mensaje" => "Error: estudiante no eliminado",
                "icono" => "error"
            ]);
        }
    
    }
}
