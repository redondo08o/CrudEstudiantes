<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Cursos::all()->where('est', '=', '1');
        return view('cursos',['cursos' => $cursos]);
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

        $file = $request->file('file-2');
        $ruta = 'img/';
        $file_name = uniqid() . $file->getClientOriginalName();
        $uploadSuccess = $request->file('file-2')->move($ruta, $file_name);
        $ee = $ruta . $file_name;
        $request["img"] = $ee;
        // dd($request);
        $curso = new Cursos();

        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->img = $request->img;
        $curso->uid = uniqid();
        $curso->fch_i = $request->fch_i;
        $curso->fch_f = $request->fch_f;
        $curso->n_ficha = $request->n_ficha;
        $curso->est = 1;

        if ($curso->save()) {
            return response()->json([
                "mensaje" => "Curso creado con exito",
                "icono" => "success"
            ]);
        } else {
            return response()->json([
                "mensaje" => "Error: Curso no Creada",
                "icono" => "error"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $curso = Cursos::find($id);
        return response()->json([
            $curso
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $curso = Cursos::find($request->id);

        if($_FILES["file-2"]["name"] != ""){
            $file = $request->file('file-2');
            $ruta = 'img/';
            $file_name = uniqid() . $file->getClientOriginalName();
            $uploadSuccess = $request->file('file-2')->move($ruta, $file_name);
            $ee = $ruta . $file_name;
            $request["img"] = $ee;
            $curso->img = $request->img;
        }
        
        // dd($request);
        

        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
       
        $curso->uid = uniqid();
        $curso->fch_i = $request->fch_i;
        $curso->fch_f = $request->fch_f;
        $curso->n_ficha = $request->n_ficha;
        $curso->est = 1;

        if ($curso->save()) {
            return response()->json([
                "mensaje" => "Curso editado con exito",
                "icono" => "success"
            ]);
        } else {
            return response()->json([
                "mensaje" => "Error: Curso no editado",
                "icono" => "error"
            ]);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $curso = Cursos::findOrFail($id);
        $curso->est = 0;
        if ($curso->save()) {
            return response()->json([
                "mensaje" => "Curso eliminado con exito",
                "icono" => "success"
            ]);
        } else {
            return response()->json([
                "mensaje" => "Error: Curso no eliminado",
                "icono" => "error"
            ]);
        }
    }

    public function to_list()
    {

        $cursos = Cursos::all()->where('est', '=', '1');
        $v = '';

        

        foreach ($cursos as $value) {
            $v.='<div class="col-lg-4 mt-3">';
            $v.='  <div class="card">';
            $v.='<div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">';
            $v.='<a href="javascript:;" class="d-block">';
            $v.='<img src="'.$value->img.'" class="img-fluid border-radius-lg" style="height: 250px; width:300px;">';
  $v.='</a>';
  $v.='</div>';

  $v.='<div class="card-body pt-2">';
  $v.='<span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">N°$value->n_ficha</span>';
  $v.='<a href="javascript:;" class="card-title h5 d-block text-darker">'.$value->nombre;
  $v.='</a>';
  $v.='<p class="card-description mb-4">'.
  $value->descripcion;
  $v.='</p>';
  $v.='<div class="author align-items-center">';
   $v.='<img src="'.$value->img.'" alt="..." class="avatar shadow">';
   $v.='<div class="name ps-3">';
   $v.='  <span>Fecha de inicio y fin</span>';
   $v.='  <div class="stats">';
   $v.='    <small>.'.$value->fch_i.'-'.$value->fch_f.'</small>';
   $v.='  </div>';
   $v.='  <a href="/Cursos/'.$value->id.'" type="button" class=" elin btn btn-youtube btn-icon-only">';
 $v.='<span class="btn-inner--icon"> <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <title>basket</title> <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Rounded-Icons" transform="translate(-1869.000000, -741.000000)" fill="#FFFFFF" fill-rule="nonzero"> <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)"> <g id="basket" transform="translate(153.000000, 450.000000)"> <path class="color-background" d="M34.080375,13.125 L27.3748125,1.9490625 C27.1377583,1.53795093 26.6972449,1.28682264 26.222716,1.29218729 C25.748187,1.29772591 25.3135593,1.55890827 25.0860125,1.97535742 C24.8584658,2.39180657 24.8734447,2.89865282 25.1251875,3.3009375 L31.019625,13.125 L10.980375,13.125 L16.8748125,3.3009375 C17.1265553,2.89865282 17.1415342,2.39180657 16.9139875,1.97535742 C16.6864407,1.55890827 16.251813,1.29772591 15.777284,1.29218729 C15.3027551,1.28682264 14.8622417,1.53795093 14.6251875,1.9490625 L7.919625,13.125 L0,13.125 L0,18.375 L42,18.375 L42,13.125 L34.080375,13.125 Z" opacity="0.595377604"></path> <path class="color-background" d="M3.9375,21 L3.9375,38.0625 C3.9375,40.9619949 6.28800506,43.3125 9.1875,43.3125 L32.8125,43.3125 C35.7119949,43.3125 38.0625,40.9619949 38.0625,38.0625 L38.0625,21 L3.9375,21 Z M14.4375,36.75 L11.8125,36.75 L11.8125,26.25 L14.4375,26.25 L14.4375,36.75 Z M22.3125,36.75 L19.6875,36.75 L19.6875,26.25 L22.3125,26.25 L22.3125,36.75 Z M30.1875,36.75 L27.5625,36.75 L27.5625,26.25 L30.1875,26.25 L30.1875,36.75 Z"></path> </g> </g> </g> </g> </svg></span>';
 $v.='</a>';
 $v.='<a href="" type="button" class="btn btn-vimeo btn-icon-only">';
 $v.='<span class="btn-inner--icon"><svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <title>settings</title> <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero"> <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)"> <g id="settings" transform="translate(304.000000, 151.000000)"> <polygon class="color-background" id="Path" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon> <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" id="Path" opacity="0.596981957"></path> <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z" id="Path"></path> </g> </g> </g> </g> </svg>';
  
 $v.='  </span>';
 $v.='</a>
  </div>';
 $v.='</div>';
 $v.='</div>';
 $v.='</div>';
 $v.='</div>';
            
        }

        echo $v;

    }
}
