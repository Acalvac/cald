<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                @if(count($empleado) > 0)
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @include('empleado.searchempleado')
                    </div>
                </div>
                <div><br></div>            
      
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-index-empleado" >
                            <thead>
                                <th style="width: 5%">Id</th>
                                <th style="width: 20%">Nombre</th>
                                <th style="width: 20%">Direcci&oacute;n</th>
                                <th style="width: 10%">telefono</th>
                                <th style="width: 10%">Correo</th>
                                <th style="width: 20%">Opciones</th>
                            </thead>
                            <tbody id="listempleado">
                                @foreach ($empleado as $em)
                                <tr class="even gradeA" id="empleado{{$em->idpersona}}">
                                    <td>{{$em->idpersona}}</td>
                                    <td>{{$em->nombre.' '.$em->apellido}}</td>
                                    <td>{{$em->direccion}}</td>
                                    <td>{{$em->telefono}}</td>
                                    <td>{{$em->correo}}</td>
                                    <td>                                     
                                        <a href="javascript:void(0);" onclick="detalle(1,{{$em->idpersona}});">
                                            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles" value="{{$em->idpersona}}"><i class="fa fa-address-card"></i></button>
                                        </a>
                                        <a href="javascript:void(0);" onclick="editar(1,{{$em->idpersona}});">
                                            <button class="btn  btn-warning btn-md btn-editar-empleado" title="Editar"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <button class="btn btn-danger btn-md btn-eliminaremp" value="{{$em->idpersona}}" title="Eliminar" ><i class="fa fa-remove"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun empleado...</label>  </div> 
                @endif
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-empleado').DataTable({
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
                    "zeroRecords":    "No se han encontrado resultados",
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

    $(document).on('click','.btn-eliminaremp',function(e){
    var id = $(this).val();
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl = urlraiz+"/empleado/delete";
        var formData = {
        empleado: id,
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    swal({
        title: '¿Desea eliminar este registro?',
        text: "Precione si para eliminar empleado, no para cerrar este mensaje.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        $.ajax({
                type: "POST",
                url: miurl,
                data: formData,
                dataType: 'json',
                success: function() {
                    $("#empleado" + id).remove();
                    swal( 
                        "Regitro eliminado",
                        "",
                        "success"
                    )
                }
        });                        
    }, 
    function (dismiss) {
        if (dismiss === 'cancel') {
            swal( 
                "Cancelado",
                "No se ha borrado",
                "error"
            )
        }
    });   
});

</script>

