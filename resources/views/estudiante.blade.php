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
                    <h6>Estudiantes</h6>
                    <br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrar estudiante</button>
                </div>

                <div class="card-body px-0 pt-0 pb-2">

                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
                        <div class="row">

                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">tp_doc</th>
                                            <th scope="col">N°doc</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($estudiantes as $estu)
                                        <tr>
                                            <td>{{$estu->id}}</td>
                                            <td>{{$estu->nombres}}</td>
                                            <td>{{$estu->apellidos}}</td>
                                            <td>{{$estu->tp_doc}}</td>
                                            <td>{{$estu->n_doc}}</td>
                                            <td><a href="/estudiantee?id={{$estu->id}}" type="button" class="btn btn-success btn-sm mr-2">detalle</a>
                                                <a href="/estudiante/{{$estu->id}}" type="button" class="elin btn btn-danger btn-sm mr-2">eliminar</a> <a data-bs-toggle="modal" data-bs-target="#exampleModal1" href="/estudiante_e/{{$estu->id}}" type="button" class="edit btn btn-info btn-sm">editar</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reg_estudiantes')}}" id="formulario" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nombres</label>
                            <input class="form-control" type="text" name="nombres" id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" name="apellidos" id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">tipo de documento</label>
                            <select class="form-control" name="tp_doc" id="">
                                <option value="cc">cc</option>
                                <option value="ti">ti</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">N° documento</label>
                            <input class="form-control" type="number" name="n_doc" id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">telefono</label>
                            <input class="form-control" type="number" name="telefono" id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">correo</label>
                            <input class="form-control" type="email" name="correo" id="example-date-input">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">Cursos</label>
                            <select name="id_curso" id="" class="form-control">
                                @foreach($cursos as $curso)

                                <option value="{{$curso->id}}">{{$curso->nombre}}</option>

                                @endforeach
                            </select>
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



    <!-- modal edit -->

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">editar Estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('upd_estudiantes')}}" id="formularioe" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nombres</label>
                            <input class="form-control" type="text" name="nombres" id="nombres">
                            <input type="hidden" name="id" id="ide">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" name="apellidos" id="apellidos">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">tipo de documento</label>
                            <select class="form-control" name="tp_doc" id="tp_doc">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">N° documento</label>
                            <input class="form-control" type="number" name="n_doc" id="n_doc">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">telefono</label>
                            <input class="form-control" type="number" name="telefono" id="telefono">
                        </div>
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">correo</label>
                            <input class="form-control" type="email" name="correo" id="email">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">Cursos</label>
                            <select name="id_curso" id="cursos" class="form-control">

                            </select>
                        </div>






                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Atras</button>
                    <button type="submit" class="btn bg-gradient-primary">Editar</button>
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


        $("#formulario").on("submit", function(e) {




            var u = $(this).attr("action");
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formulario"));

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

        $("#formularioe").on("submit", function(e) {




            var u = $(this).attr("action");
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formularioe"));

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
            var elemento = $(this);


            $.get(url, '', function(e) {
                console.log(e);
                var op1 = e[0]['tp_doc'] == 'cc' ? '<option {<value="cc" selected >cc</option><option value="ti">ti</option>' : '<option {<value="cc"  >cc</option><option value="ti" selected>ti</option>';



                document.getElementById('nombres').value = e[0]['nombres'];
                document.getElementById('apellidos').value = e[0]['nombres'];
                document.getElementById('telefono').value = e[0]['telefono'];
                document.getElementById('email').value = e[0]['email'];
                document.getElementById('n_doc').value = e[0]['n_doc'];
                document.getElementById('tp_doc').innerHTML = op1
                document.getElementById('cursos').innerHTML = e[0]['id_curso'];
                document.getElementById('ide').value = e[0]['id'];
                



            }, 'JSON');

            return false;
        });
    </script>
    @endsection