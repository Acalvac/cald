<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($proveedores))
                    @if(count($proveedores) > 0)

                    <h4 class="box-title" align="center">Listado Proveedores</h4>
                    <hr style="border-color:black;"/>
                        
                    <div class="ibox-content" style="border-color:black;">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                        <th style="width: 5%">Id</th>
                                        <th style="width: 15%">Proveedor</th>
                                        <th style="width: 10%">Nit</th>
                                        <th style="width: 10%">Telefono</th>
                                        <th style="width: 30%">Dirección</th>
                                        <th style="width: 10%">cuenta</th>
                                        <th style="width: 10%">cheque</th>
                                        <th style="width: 10%">Opciones</th>
                                </thead>
                                <tbody id="listempleado">
                                    @foreach ($proveedores as $pro)
                                    <tr class="even gradeA" id="proveedor{{$pro->idproveedor}}">
                                        <td>{{$pro->idproveedor}}</td>
                                        <td>{{$pro->proveedor}}</td>
                                        <td>{{$pro->nit}}</td>
                                        <td>{{$pro->telefono}}</td>
                                        <td>{{$pro->direccion}}</td>
                                        <td>{{$pro->cuenta}}</td>
                                        <td>{{$pro->chequenombre}}</td>
                                        <td>

                                            <a href="javascript:void(0);" onclick="editar(1,{{$pro->idproveedor}});">
                                                <button class="btn  btn-warning btn-md btn-editar-empleado" title="Editar"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <button class="btn btn-danger btn-md btneliminarb" id="FWEF" value="{{$pro->idproveedor}}" title="Eliminar" ><i class="fa fa-remove"></i></button>
                                    
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <br><div class="rechazado"><label style='color:#FA206A'>..No se ha encontrado ningun proveedor</label></div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>