@extends('layouts.admin')

@section('content')
<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">

            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{$estudiante->nombres}} {{$estudiante->apellidos}}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        Aprendiz
                    </p>
                </div>
            </div>


        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Informacion</p>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">tipo de documento</label><br>
                                {{$estudiante->tp_doc}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">numero de documento</label><br>
                                {{$estudiante->n_doc}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">telefono</label><br>
                                {{$estudiante->telefono}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">correos</label><br>
                                {{$estudiante->email}}
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">curso</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nombre</label><br>
                                {{$estudiante->nombre}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label"> numero de ficha</label><br>
                                {{$estudiante->n_ficha}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">fecha de inicio</label><br>
                                {{$estudiante->fch_i}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">fecha de finalizacion</label><br>
                                {{$estudiante->fch_f}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection