<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<div class="tabs-container">
   <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($medicamentos))

                    @if(count($medicamentos) > 0)

                    <h4 class="box-title" align="center">Listado Medicamento</h4>
                    <hr style="border-color:black;"/>

                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-index-medicamento" >
                                <thead>
                                    <th style="width: 5%">Id</th>
                                    <th style="width: 20%">Medicamento</th>
                                    <th style="width: 20%">Marca</th>
                                    <th style="width: 10%">Presentacion</th>
                                    <th style="width: 10%">Cantidad</th>
                                    <th style="width: 20%">Opciones</th>
                                </thead>
                                <tbody id="listempleado">
                                    @foreach ($medicamentos as $med)
                                    <tr class="even gradeA" id="medicamento{{$med->idmedicamento}}">
                                        <td>{{$med->idmedicamento}}</td>
                                        <td>{{$med->medicamento}}</td>
                                        <td>{{$med->marca}}</td>
                                        <td>{{$med->presentacion}}</td>
                                        <td>{{$med->cantidad}}</td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="detalle(8,{{$med->idmedicamento}});">
                                            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles"><i class="fa fa-address-card"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                        <br><div class="rechazado"><label style='color:#FA206A'>..No se ha encontrado ningun medicamento</label></div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-medicamento').DataTable({
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