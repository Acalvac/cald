
    <link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/footable/footable.core.css')}}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->


<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
        <h4 class="box-title" align="center">Nuevo Medicamento</h4> 
        <a href="javascript:void(0);" onclick="cargarindex(4);">
            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
        </a>
        <hr style="border-color:black;"/>
        <div class="panel-body">
            <div class="row">

                @include('medicamento.medicamento.modalcreate')

                <div class="modal-footer">
                    <div class="col-md-12">
                        <div><br></div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary btn-btnGuardarMedicamento" id="btnGuardarMedicamento" style="display:none;">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div id="modales2"></div>

<div class="modal fade" id="erroresModalMedicamento" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="inputErrorMedicamento"></h4>
            </div>
            <div class="modal-body">
                <ul style="list-style-type:circle" id="erroresContentMedicamento"></ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('.chosen-select').chosen({width: "100%"});

</script>




