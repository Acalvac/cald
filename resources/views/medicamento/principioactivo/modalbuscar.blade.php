<link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

<div class="col-lg-12" id="modales">
    <div class="modal fade" id="formModalBuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" align="center" id="inputTitleBuscar"></h4>
                </div>

                <form role="form" id="formBuscarPrincipio">
                    <div class="modal-header">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-principio" >
                                <thead>
                                    <th style="width: 5%">Id</th>
                                    <th style="width: 50%">Principio Activo</th>
                                    <th style="width: 40%">Familia</th>
                                    <th style="width: 5%"></th>
                                </thead>
                                <tbody id="listempleado">
                                    @foreach ($principioactivo as $pri)
                                    <tr class="even gradeA" id="proveedor{{$pri->idprincipio}}">
                                        <td>{{$pri->idprincipio}}</td>
                                        <td>{{$pri->nombre}}</td>
                                        <td>{{$pri->familia}}</td>

                                        <td>
                                            <a href="javascript:void(0);" onclick="busqueda(8,{{$pri->idprincipio}});">
                                                <button class="btn btn-outline btn-primary btn-buscar-ubicacion" type="button" title="Agregar" value="{{$pri->idprincipio}}"><i class="fa fa-check"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <div class="col-md-12">
                        <div><br></div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="erroresModalBuscarPro" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="inputErrorBuscar"></h4>
            </div>
            <div class="modal-body">
                <ul style="list-style-type:circle" id="erroresContentBuscar"></ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
   
<!-- Sweet alert -->
    <script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.js')}}"></script>

    <script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{asset('assets/js/inspinia.js')}}"></script>
    <script src="{{asset('assets/js/plugins/pace/pace.min.js')}}"></script>

    <script>

            $('.dataTables-principio').DataTable({
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                columns: [
                null,
                null,
                null,
                null
                ],

                aLengthMenu:[
                5,10,15],

                buttons: [
                    
                ]

            });
    </script>    


