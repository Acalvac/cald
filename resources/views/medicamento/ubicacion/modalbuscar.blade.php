<link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

<div class="col-lg-12" id="modales">
    <div class="modal fade" id="formModalBuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" align="center" id="inputTitleBuscar"></h4>
                </div>

                <form role="form" id="formAgregarBuscar">
                    <div class="modal-header">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <th style="width: 5%">Id</th>
                                    <th style="width: 55%">Habitacion</th>
                                    <th style="width: 30%">Estanteria</th>
                                    <th style="width: 10%">Coordenada</th>
                                </thead>
                                <tbody id="listempleado">
                                    @foreach ($ubicacion as $ubi)
                                    <tr class="even gradeA" id="medicamento{{$ubi->idubicacion}}">
                                        <td>{{$ubi->idubicacion}}</td>
                                        <td>{{$ubi->habitacion}}</td>
                                        <td>{{$ubi->estanteria}}</td>
                                        <td>{{$ubi->coordenada}}</td>
                                        <td>
                                            <a href="#">
                                            <button class="btn btn-outline btn-primary dim btn-buscar-ubicacion" type="button" title="Detalles" value="{{$ubi->idubicacion}}"><i class="fa fa-check"></i></button>
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

<div class="modal fade" id="erroresModalBuscar" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
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
    


