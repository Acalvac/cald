<link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

<div class="col-lg-12" id="modales">
    <div class="modal fade" id="formModalBuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" align="center" id="inputTitleBuscar"></h4>
                </div>

                <form role="form" id="formBuscarMedicamento">
                    <div class="modal-header">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-medicamento" >
                                <thead>
                                    <th style="width: 5%">Id</th>
                                    <th style="width: 25%">Medicamento</th>
                                    <th style="width: 25%">Marca</th>
                                    <th style="width: 25%">Presentaci&oacute;n</th>
                                    <th style="width: 15%">Cantidad existente</th>
                                    <th style="width: 5%"></th>
                                </thead>
                                <tbody id="listempleado">
                                    @foreach ($medicamento as $med)
                                    <tr class="even gradeA" id="proveedor{{$med->idmedicamento}}">
                                        <td>{{$med->idmedicamento}}</td>
                                        <td>{{$med->medicamento}}</td>
                                        <td>{{$med->marca}}</td>
                                        <td>{{$med->presentacion}}</td>
                                        <td>{{$med->cantidad}}</td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="busqueda(9,{{$med->idmedicamento}});">
                                                <button class="btn btn-outline btn-primary" type="button" title="Agregar"><i class="fa fa-check"></i></button>
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

    <script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
   
<!-- Sweet alert -->
    <script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.js')}}"></script>
    


<script>

            $('.dataTables-medicamento').DataTable({
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                "language": {
                    "decimal":        "",
                    "emptyTable":     "No data available in table",
                    "info":           "Mostrar _START_ a _END_ de _TOTAL_ registros por pagina",
                    "infoEmpty":      "Showing 0 to 0 of 0 entries",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ registros",
                    "loadingRecords": "Loading...",
                    "processing":     "Processing...",
                    "search":         "Buscar:",
                    "total":          "total",          
                    "zeroRecords":    "No matching records found",
                    "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                },
                
                columns: [
                null,
                null,
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