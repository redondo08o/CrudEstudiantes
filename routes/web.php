<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\EstudiantesController;
use Illuminate\Support\Facades\Route;



Route::get('/',[CursosController::class,'index'])->name('view_cursos');

Route::get('/Cursos',[CursosController::class,'index'])->name('view_cursos');
route::post('/Cursos_r',[CursosController::class,'store'])->name('reg_cursos');
route::post('/Cursos',[CursosController::class,'update'])->name('upd_cursos');
Route::get('/Cursos_c',[CursosController::class,'to_list']);
Route::get('/Cursos/{id}', [CursosController::class,'destroy']);
Route::get('/Cursos_e/{id}', [CursosController::class,'edit']);

Route::get('/estudiantes',[EstudiantesController::class,'index'])->name('view_estudiantes');
route::post('/estudiante',[EstudiantesController::class, 'store'])->name('reg_estudiantes');
route::post('/estudiante_e',[EstudiantesController::class, 'update'])->name('upd_estudiantes');
Route::get('/estudiante/{id}', [EstudiantesController::class,'destroy']);
Route::get('/estudiantee', [EstudiantesController::class,'edit']);
Route::get('/estudiante_e/{id}', [EstudiantesController::class,'show']);

