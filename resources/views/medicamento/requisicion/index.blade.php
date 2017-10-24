<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($requisicion))

                    @if(count($requisicion) > 0)

                    <h4 class="box-title" align="center">Listado requisición Medicamento</h4>
                    <hr style="border-color:black;"/>

                    <div class="ibox-content" style="border-color:black;">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <th style="width: 5%">Id</th>
                                    <th style="width: 20%">Usuario</th>
                                    <th style="width: 10%">Paciente</th>
                                    <th style="width: 10%">Tipo requisicion</th>
                                    <th style="width: 20%">Opciones</th>
                                </thead>
                                <tbody id="listrequisicion">
                                    @foreach ($requisicion as $req)
                                    <tr class="even gradeA" id="requisicion{{$req->idrequisicion}}">
                                        <td>{{$req->idrequisicion}}</td>
                                        <td>{{$req->name}}</td>
                                        <td>{{$req->nombrepa}}</td>
                                        <td>{{$req->tiporequisicion}}</td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="detalle(7,{{$req->idrequisicion}});">
                                            <button type="button" class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles"><i class="fa fa-address-card"></i></button>
                                            </a>
                                        </td>
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