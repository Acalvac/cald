<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($compras))

                    @if(count($compras) > 0)

                    <h4 class="box-title" align="center">Listado Compra Medicamento</h4>
                    <hr style="border-color:black;"/>

                    <div class="ibox-content" style="border-color:black;">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-index-compra" >
                                <thead>
                                        <th style="width: 5%">Id</th>
                                        <th style="width: 20%">Medicamento</th>
                                        <th style="width: 10%">Fecha Compra</th>
                                        <th style="width: 10%">Fecha Vencimiento</th>
                                        <th style="width: 10%">Cantidad</th>
                                        <th style="width: 10%">Precio</th>
                                        <th style="width: 10%">Proveedor</th>
                                        <th style="width: 10%">Usuario</th>
                                        <!--<th style="width: 20%">Opciones</th>-->
                                </thead>
                                <tbody id="listempleado">
                                    @foreach ($compras as $com)
                                    <tr class="even gradeA" id="medicamento{{$com->idcompra}}">
                                        <td>{{$com->idcompra}}</td>
                                        <td>{{$com->medicamento.' '.$com->marca}}</td>
                                        <td>{{$com->fechacompra}}</td>
                                        <td>{{$com->fechavencimiento}}</td>
                                        <td>{{$com->cantidad}} Unidades</td>
                                        <td>{{$com->precio}} Q</td>
                                        <td>{{$com->proveedor}}</td>
                                        <td>{{$com->name}}</td>
                                        <!--
                                        <td>

                                            <a href="#">
                                            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles" value="{{$com->idcompra}}"><i class="fa fa-address-card"></i></button>
                                            </a>
                                            <a href="#">
                                            <button class="btn  btn-warning btn-md btn-editar-empleado" title="Editar" value="{{$com->idcompra}}"><i class="fa fa-pencil"></i></button></a>
                                            <button class="btn btn-danger btn-md btneliminarb" id="FWEF" value="{{$com->idcompra}}" title="Eliminar" ><i class="fa fa-remove"></i></button>
                                        </td>
                                        -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                        <br><div class="rechazado"><label style='color:#FA206A'>..No se ha encontrado ninguna compra</label></div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-compra').DataTable({
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