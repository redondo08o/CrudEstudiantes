@extends('layouts.admin')

@section('content')

<style>
    .scrollspy-example {
        position: relative;
        height: 300px;
        margin-top: 0.5rem;
        overflow: auto;
    }
</style>

<div class="container-fluid pt-4 px-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Cursos</h6>
                    <br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear curso</button>
                </div>

                <div class="card-body px-0 pt-0 pb-2">

                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
                        <div class="row">

                            @foreach ($cursos as $curso)

                            <div class="col-lg-4 mt-3">
                                <div class="card">
                                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                        <a href="javascript:;" class="d-block">
                                            <img src="{{$curso->img}}" class="img-fluid border-radius-lg" style="height: 250px;">
                                        </a>
                                    </div>

                                    <div class="card-body pt-2">
                                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">N°{{$curso->n_ficha}}</span>
                                        <a href="javascript:;" class="card-title h5 d-block text-darker">
                                            {{$curso->nombre}}
                                        </a>
                                        <p class="card-description mb-4">
                                            {{$curso->descripcion}}
                                        </p>
                                        <div class="author align-items-center">
                                            <img src="{{$curso->img}}" alt="..." class="avatar shadow">
                                            <div class="name ps-3">
                                                <span>Fecha de inicio y fin</span>
                                                <div class="stats">
                                                    <small>{{$curso->fch_i}}-{{$curso->fch_f}}</small>
                                                </div>

                                            </div>
                                        </div>
                                        <br>

                                        <a href="/Cursos_e/{{$curso->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="edit btn btn-primary btn-sm mr-2">editar</a>
                                        <a href="/Cursos/{{$curso->id}}" class=" elin btn btn-secondary btn-sm">eliminar</a>
                                    </div>
                                </div>
                            </div>


                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">editar curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upd_cursos')}}" id="formularioe" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre">
                        <input type="hidden" name="id" id="ide">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="example-date-input" class="form-control-label">fecha de inicio</label>
                        <input class="form-control" type="date" name="fch_i" id="fecha_i">
                    </div>
                    <div class="form-group">
                        <label for="example-date-input" class="form-control-label">fecha de finalización </label>
                        <input class="form-control" type="date" name="fch_f" id="fecha_f">
                    </div>
                    <div class="form-group">
                        <label for="example-number-input" class="form-control-label">N° ficha</label>
                        <input class="form-control" type="number" name="n_ficha" id="ficha">
                    </div>
                    <div class="input-group mb-3">
                        <div class=content>
                            <label> upload image</label> <br>

                            <label for='file-upload' class='subir'>
                                <i class='fas fa-cloud-upload-alt'></i>
                                <div style='float: left;' id='info-2'>Subir archivo</div>
                            </label>
                            <input id='file-upload' accept='image/png,image/jpeg' onchange='cambiar()' type='file' name='file-2' style='display: none;' />
                        </div>

                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Atras</button>
                <button type="submit" class="btn bg-gradient-primary">Registrar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">crear curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('reg_cursos')}}" id="formulario" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="example-date-input" class="form-control-label">fecha de inicio</label>
                        <input class="form-control" type="date" name="fch_i" id="example-date-input">
                    </div>
                    <div class="form-group">
                        <label for="example-date-input" class="form-control-label">fecha de finalización </label>
                        <input class="form-control" type="date" name="fch_f" id="example-date-input">
                    </div>
                    <div class="form-group">
                        <label for="example-number-input" class="form-control-label">N° ficha</label>
                        <input class="form-control" type="number" name="n_ficha" id="example-number-input">
                    </div>
                    <div class="input-group mb-3">
                        <div class=content>
                            <label> upload image</label> <br>

                            <label for='fileupload' class='subir'>
                                <i class='fas fa-cloud-upload-alt'></i>
                                <div style='float: left;' id='info2'>Subir archivo</div>
                            </label>
                            <input id='fileupload' accept='image/png,image/jpeg' onchange='cambiarr()' type='file' name='file-2' style='display: none;' />
                        </div>

                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Atras</button>
                <button type="submit" class="btn bg-gradient-primary">Registrar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<style>
    .subir {
        padding: 5px 10px;
        background: #2d64f5;
        color: #fff;
        border: 0px solid #fff;
    }

    .subir:hover {
        color: #fff;
        background: #2d64f59e;
    }
</style>
<script>
    function cambia() {
        var pdrs = document.getElementById('file-uploa').files[0].name;
        document.getElementById('info-2').innerHTML = pdrs;
    }

    function cambiar() {
        var pdrs = document.getElementById('file-upload').files[0].name;
        document.getElementById('info-2').innerHTML = pdrs;
    }

    function cambiaa() {
        var pdrs = document.getElementById('fileuploa').files[0].name;
        document.getElementById('info2').innerHTML = pdrs;
    }

    function cambiarr() {
        var pdrs = document.getElementById('fileupload').files[0].name;
        document.getElementById('info2').innerHTML = pdrs;
    }


    $("#formulario").on("submit", function(e) {

        if ($("#fileupload").val() == "") {
            Swal.fire('no se ha cargado nada')
        } else {


            var u = $(this).attr("action");
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formulario"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                    url: u,
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    if (res.icono == "success") {
                        Swal.fire(
                            res.mensaje,
                            '',
                            res
                        )
                        setInterval(location.reload(), 60000);
                    } else {
                        Swal.fire(
                            res.mensaje,
                            '',
                            res
                        )
                    }






                    Swal.fire(
                        res.mensaje,
                        '',
                        res.icono
                    )



                }, JSON);
        }


        return false


    });

    $("#formularioe").on("submit", function(e) {




    var u = $(this).attr("action");
    e.preventDefault();
    var f = $(this);
    var formData = new FormData(document.getElementById("formularioe"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
            url: u,
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(res) {
            if (res.icono == "success") {
                Swal.fire(
                    res.mensaje,
                    '',
                    res
                )
                setInterval(location.reload(), 60000);
            } else {
                Swal.fire(
                    res.mensaje,
                    '',
                    res
                )
            }






            Swal.fire(
                res.mensaje,
                '',
                res.icono
            )



        }, JSON);



return false


});

    $(document).on('click', '.elin', function(e) {
        var url = $(this).attr("href");
        var elemento = $(this);

        Swal.fire({
            title: 'Estas seguro?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get(url, '', function(e) {
                    Swal.fire(
                        e.mensaje,
                        '',
                        e.icono
                    )
                    setInterval(location.reload(), 60000);

                }, 'JSON');
            }
        })




        return false;
    });


    $(document).on('click', '.edit', function(e) {
        var url = $(this).attr("href");

                $.get(url, '', function(e) {
                    console.log(e)
                   document.getElementById('nombre').value=e[0]['nombre'];
                   document.getElementById('descripcion').value=e[0]['descripcion'];
                   document.getElementById('fecha_i').value=e[0]['fch_i'];
                   document.getElementById('fecha_f').value=e[0]['fch_f'];
                   document.getElementById('ficha').value=e[0]['n_ficha'];
                   document.getElementById('info-2').innerHTML=e[0]['img'];
                   document.getElementById('ide').value=e[0]['id'];

                   

                }, 'JSON');
                return false;
            })
</script>
@endsection