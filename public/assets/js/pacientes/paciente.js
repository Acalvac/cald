$(document).ready(function(){
    
    $("#wizard").steps({
        /*onStepChanging: function (e)
        {
            
        },*/
        onFinishing: function(e){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var miurl = "paciente/addpa";
            var urlraiz=$("#url_raiz_proyecto").val();
            var itemsData=[];
            var tablaF=$("#detallesfam tr");
            var itemsDataL=[];
            var tablaL=$("#detallesidio tr");
            var itemsDataA=[];
            var tablaA=$("#detallesanoma tr");
            var itemsDataIn=[];
            var tablaIn=$("#detallesinfec tr");
            var itemsDataEn=[];
            var tablaEn=$("#detallesenf tr");
            var itemsDataAn=[];
            var tablaAn=$("#detallesanimal tr");
            var itemsDataPer=[];
            var tablaPer=$("#detallespersona tr");
            var itemsDataMed=[];
            var tablaMed=$("#detallesmedicina tr");
            var itemsDataVac=[];
            var tablaVac=$("#detallesvacuna tr");
            var itemsDataPad=[];
            var tablaPad=$("#detallesenpadecido tr");

            tablaF.each(function(){
                var nombrefam = $(this).find('td').eq(1).html();
                var fenacfam = $(this).find('td').eq(2).html();
                var ocupacionfam = $(this).find('td').eq(3).html();
                var tallafam = $(this).find('td').eq(4).html();
                var pesofam = $(this).find('td').eq(5).html();
                var idiomafam = $(this).find('td').eq(6).html();
                var religionfam = $(this).closest('tr').find('input[id="religionfam"]').val();
                var anomaliafam = $(this).find('td').eq(8).html();
                var parentescofam = $(this).closest('tr').find('input[id="parentescofam"]').val();
                valor = new Array(nombrefam,fenacfam,ocupacionfam,tallafam,pesofam,idiomafam,religionfam,anomaliafam,parentescofam);
                itemsData.push(valor);
            });

            tablaL.each(function(){
                var ididioma = $(this).closest('tr').find('input[type="hidden"]').val();
                valor = new Array(ididioma);
                itemsDataL.push(valor);
            });
            tablaA.each(function(){
                var idanomalia = $(this).closest('tr').find('input[type="hidden"]').val();
                valor = new Array(idanomalia);
                itemsDataA.push(valor);
            });
            tablaIn.each(function(){
                var infeccion = $(this).closest('tr').find('input[type="hidden"]').val();
                valor = new Array(infeccion);
                itemsDataIn.push(valor);
            });
            tablaEn.each(function(){
                var enfermedad = $(this).closest('tr').find('input[type="hidden"]').val();
                valor = new Array(enfermedad);
                itemsDataEn.push(valor);
            });
            tablaAn.each(function(){
                var idanimal = $(this).closest('tr').find('input[type="hidden"]').val();
                valor = new Array(idanimal);
                itemsDataAn.push(valor);
            });
            tablaPer.each(function(){
                var personal = $(this).closest('tr').find('input[type="hidden"]').val();
                valor = new Array(personal);
                itemsDataPer.push(valor);
            });
            tablaMed.each(function(){
                var medicamento = $(this).closest('tr').find('input[type="hidden"]').val();
                valor = new Array(medicamento);
                itemsDataMed.push(valor);
            });
            tablaVac.each(function(){
                var vacuna = $(this).closest('tr').find('input[type="hidden"]').val();
                valor = new Array(vacuna);
                itemsDataVac.push(valor);
            });
            tablaPad.each(function(){
                var padesidos = $(this).closest('tr').find('input[type="hidden"]').val();
                valor = new Array(padesidos);
                itemsDataPad.push(valor);
            });
            var formData = {
                nino:$("#nombrep").val(),
                fechanacp:$("#fechanacp").val(),
                origenp:$("#origenp").val(),
                procedenciap:$("#procedenciap").val(),
                tallap:$("#tallap").val(),
                pesop:$("#pesop").val(),

                responsable:$("#nombreres").val(),
                identres:$("#identificacionres").val(),
                direccionres:$("#direccionres").val(),
                telefonores:$("#telefonores").val(),

                items: itemsData,
                itemsL: itemsDataL,
                itemsA: itemsDataA,

                imde:$("input:radio[id=imde]:checked").val(),
                ecdm:$("input:radio[id=ecdm]:checked").val(),
                cmcad:$("input:radio[id=cmcad]:checked").val(),
                tpamp:$("input:radio[id=tpamp]:checked").val(),
                mednatural:$("input:radio[id=mednatural]:checked").val(),
                tparto:$("#tparto").val(),
                lnin:$("input:radio[id=lnin]:checked").val(),
                pcnn:$("input:radio[id=pcnn]:checked").val(),
                mnpr:$("input:radio[id=mnpr]:checked").val(),
                nipdn:$("input:radio[id=nipdn]:checked").val(),
                sbpdn:$("input:radio[id=sbpdn]:checked").val(),
                tpym:$("input:radio[id=tpym]:checked").val(),
                icoac:$("input:radio[id=icoac]:checked").val(),
                tcp:$("input:radio[id=tcp]:checked").val(),
                conquien:$("#conquien").val(),
                veces:$("#veces").val(),
                comentario:$("#comentario").val(),

                itemsInf: itemsDataIn,
                itemsEn: itemsDataEn,
                itemsAn: itemsDataAn,
                itemsPer: itemsDataPer,
                itemsMed: itemsDataMed,

                edadscn:$("#edadscn").val(),
                edadss:$("#edadss").val(),
                edadcamino:$("#edadcamino").val(),
                edadepp:$("#edadepp").val(),
                cnoeranormal:$("#cnoeranormal").val(),
                qfpnd:$("#qfpnd").val(),
                qatcnen:$("#qatcnen").val(),
                vtiene:$("input:radio[id=vtiene]:checked").val(),
                //vacunass:$("#vacunass").val(),
                chermanost:$("#chermanost").val(),
                //enfpadecido:$("#enfpadecido").val(),
                epadecido:$("input:radio[id=epadecido]:checked").val(),
                ordencor:$("#ordencor").val(), 
                bautizado:$("input:radio[id=bautizado]:checked").val(),

                itemsVac: itemsDataVac,
                itemsPad: itemsDataPad,               
            }
            $.ajax({
                type: "POST",
                url: miurl,
                data: formData,
                dataType: 'json',

                success: function (data) {
                    swal({ 
                        title:"Envio correcto",
                        text: "Información guardada correctamente",
                        type: "success"
                    }).then(
                    function(){
                            var urlraiz=$("#url_raiz_proyecto").val();
                            $("#capa_modal").html($("#cargador_empresa").html());
                            var miurl=urlraiz+"/paciente/index";
                            $.ajax({
                            url: miurl
                            }).done( function(resul) 
                            {
                             $("#capa_modal").html(resul);
                           
                            }).fail( function() 
                           {
                            $("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                           }) ;

                    });
                    
                },
                error: function (data) {
                    $('#loading').modal('hide');
                    var errHTML="";
                    if((typeof data.responseJSON != 'undefined')){
                        for( var er in data.responseJSON){
                            errHTML+="<li>"+data.responseJSON[er]+"</li>";
                        }
                    }else{
                        errHTML+='<li>Error, intente mas tarde gracias.</li>';
                    }
                    $("#erroresContent").html(errHTML); 
                    $('#erroresModal').modal('show');
                }
            });

        }
    });
    $('.select2_demo_2').select2();
    $('.chosen-select').chosen({width: "100%"});
    $("#addFam").click(function(){
        agregarfam();
    });
    $("#addIdiofam").click(function(){
        agregaridfam();
    });
    $("#addAnofam").click(function(){
        agregaranfam();
    });
    $("#btninfeccion").click(function(){
        agregarinfeccion();
    });
    $("#enftipo").click(function(){
        agregarenfermedad();
    });
    $("#btnanimal").click(function(){
        agregaranimal();
    });
    $("#btnpersonal").click(function(){
        agregarpersonal();
    });
    $("#btnmedicina").click(function(){
        agregarmedicina();
    });
    $("#btnvacuna").click(function(){
        agregarvacuna();
    });
    $("#btnpadecido").click(function(){
        agregarpadecidos();
    });
    $("#btnaddinf").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nueva Infeccion");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addbi');
                $('#formModal').modal('show');
            //});
    });

    $("#btnaddenf").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nueva Enfermedad");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addbe');
                $('#formModal').modal('show');
            //});
    });
    $("#btnaddanimal").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nueva registro");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addba');
                $('#formModal').modal('show');
            //});
    });
    $("#btnaddpersonal").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nueva Personal");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addbp');
                $('#formModal').modal('show');
            //});
    });
    $("#btnaddmedicina").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nueva Medicina");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addbm');
                $('#formModal').modal('show');
            //});
    });
    $("#btnadvac").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nueva Vacuna");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addpv');
                $('#formModal').modal('show');
            //});
    });
    $("#btnaddenfh").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nueva Enfermedad");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addbep');
                $('#formModal').modal('show');
            //});
    });
    $("#addIdiofam").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nuevo Idioma");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addid');
                $('#formModal').modal('show');
            //});
    });
    $("#addAnofam").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nuevo Anomalia");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addban');
                $('#formModal').modal('show');
            //});
    });
    $("#btnaddlug").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nuevo lugar de origen ");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addblug');
                $('#formModal').modal('show');
            //});
    });
    $('#fechanacp').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
    /*$('#fenacfam').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });*/

});

var contf=0;
var contif=0;
var contaf=0;
var continf=0;
var contenf=0;
var contani=0;
var contper=0;
var contmed=0;
var contvac=0;
var contpad=0;

$("#btnGuardar").click(function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var miurl;
    var status = $("#btnGuardar").val();
    var formData = {
            nombre:$("#nombre").val(),
        };

    if (status == "addbi") {
        miurl = 'paciente/addinfeccion';
    }
    if (status == "addbe") {
        miurl = 'paciente/addenfermedad';
    }
    if (status == "addba") {
        miurl = 'paciente/addanimal';
    }
    if (status == "addbp") {
        miurl = 'paciente/addpersonal';
    }
    if (status == "addbm") {
        miurl = 'paciente/addmedicina';
    }
    /**/
    if (status == "addid") {
        miurl = 'paciente/addidioma';
    }
    if (status == "addban") {
        miurl = 'paciente/addanomalia';
    }
    if (status == "addblug") {
        miurl = 'paciente/addlugar';
    }

    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',

        success: function (data) {
            if (status == "addbi") {
                $(data).each(function(i,v){
                    $("#infecciontipo").append('<option selected value='+v.idtipoinfeccion+'">'+v.nombre+'</option>');
                    agregarinfeccion();
                });
            }
            if (status == "addbe") {
                $(data).each(function(i,v){
                    $("#enfermedadtipo").append('<option selected value='+v.idtipoenfermedad+'">'+v.nombre+'</option>');
                    agregarenfermedad();
                });
            }
            if (status == "addba") {
                $(data).each(function(i,v){
                    $("#animaltipo").append('<option selected value='+v.idanimal+'">'+v.nombreanimal+'</option>');
                    agregaranimal();
                });
            }
            if (status == "addbp") {
                $(data).each(function(i,v){
                    $("#personalati").append('<option selected value='+v.idpersonalatiende+'">'+v.nombre+'</option>');
                    agregarpersonal();
                });
            }
            if (status == "addbm") {
                $(data).each(function(i,v){
                    $("#medicamento").append('<option selected value='+v.idmedicina+'">'+v.nombre+'</option>');
                    agregarmedicina();
                });
            }
            if (status == "addpv") {
                $(data).each(function(i,v){
                    $("#vacunass").append('<option selected value='+v.idvacuna+'">'+v.vacuna+'</option>');
                    agregarvacuna();
                });
            }
            if (status == "addbep") {
                $(data).each(function(i,v){
                    $("#enfpadecido").append('<option selected value='+v.idtipoenfermedad+'">'+v.nombre+'</option>');
                    agregarpadecidos();
                });
            }
            /**/
            if (status == "addid") {
                var urlraiz=$("#url_raiz_proyecto").val();
                var miurl=urlraiz+"/paciente/idget";
                $.ajax({
                url: miurl
                }).done( function(resul) 
                {
                    $("#divlenguaje").html(resul);
                }).fail( function() 
                {
                    $("#divlenguaje").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                });

            }
            if (status == "addban") {
                var urlraiz=$("#url_raiz_proyecto").val();
                var miurl=urlraiz+"/paciente/getanoma";
                $.ajax({
                url: miurl
                }).done( function(resul) 
                {
                    $("#divanomal").html(resul);
                }).fail( function() 
                {
                    $("#divanomal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                });

                /*$(data).each(function(i,v){
                    $("#anomaliafam").append('<option selected multiple="multiple" value='+v.idanomalia+'">'+v.anomalia+'</option>');
                });*/
            }
            if (status == "addblug") {
                $(data).each(function(i,v){
                    $("#origenp").append('<option selected value='+v.idmunicipio+'">'+v.municipio+'</option>');
                });
            }
            $('#formModal').modal('hide');            
        },
        error: function (data) {
            $('#loading').modal('hide');
            var errHTML="";
            if((typeof data.responseJSON != 'undefined')){
                for( var er in data.responseJSON){
                                errHTML+="<li>"+data.responseJSON[er]+"</li>";
                }
            }else{
                errHTML+='<li>Error al intentar guardar un nuevo registro, intente mas tarde.</li>';
            }
            $("#erroresContent").html(errHTML); 
            $('#erroresModal').modal('show');
        }
    });
});
function Anofams(elementos) {
    element = document.getElementById("divanomal");
    divbt = document.getElementById("divbtn"); 
    if (elementos.value=="Si") {
        element.style.display='block';
        divbt.style.display='block';
    }
    else 
    { if (elementos.value=="No") {
        element.style.display='none';
        divbt.style.display='none';
    }
    }
}

function Infecmadre(elementos) {
    element = document.getElementById("Div1");
    divin = document.getElementById("infeccion");
    if (elementos.value=="Si") {
        element.style.display='block';
        divin.style.display='block';
    }
    else 
    { if (elementos.value=="No") {
        element.style.display='none';
        divin.style.display='none';
    }
    }
}
function Enfcmadre(elementos) {
    element = document.getElementById("Div2");
    enfcronica = document.getElementById("enfcronicas");
    if (elementos.value=="Si") {
        element.style.display='block';
        enfcronica.style.display='block';
    }
    else 
    { if (elementos.value=="No") {
        element.style.display='none';
        enfcronica.style.display='none';
    }
    }
}
function Conmadre(elementos) {
    element = document.getElementById("Div3");
    anconvive = document.getElementById("anconvive");
    if (elementos.value=="Si") {
        element.style.display='block';
        anconvive.style.display='block';
    }
    else 
    { if (elementos.value=="No") {
        element.style.display='none';
        anconvive.style.display='none';
    }
    }
}
function Atmadre(elementos) {
    element = document.getElementById("Div4");
    personaatendio = document.getElementById("personaatendio");
    if (elementos.value=="Si") {
        element.style.display='block';
        personaatendio.style.display='block';
    }
    else 
    { if (elementos.value=="No") {
        element.style.display='none';
        personaatendio.style.display='none';
    }
    }
}
function mtdeimn(elementos) {
    element = document.getElementById("Div6");
    medicamentos = document.getElementById("medicamentos");
    if (elementos.value=="Si") {
        element.style.display='block';
        medicamentos.style.display='block';
    }
    else 
    { if (elementos.value=="No") {
        element.style.display='none';
        medicamentos.style.display='none';
    }
    }
}
function Tcontrolp(elementos) {
    element = document.getElementById("Div5");
    if (elementos.value=="Si") {
        element.style.display='block';
    }
    else 
    { if (elementos.value=="No") {
        element.style.display='none';
    }
    }
}

function Vacunast(elementos) {
    element = document.getElementById("divacuna");
    vactable = document.getElementById("vactable");
    if (elementos.value=="Si") {
        element.style.display='block';
        vactable.style.display='block';
    }
    else 
    { if (elementos.value=="No") {
        element.style.display='none';
        vactable.style.display='none';
    }
    }
}
function Enfpadecido(elementos) {
    element = document.getElementById("divpadecido");
    enftable = document.getElementById("enftable");
    if (elementos.value=="Si") {
        element.style.display='block';
        enftable.style.display='block';
    }
    else 
    { if (elementos.value=="No") {
        element.style.display='none';
        enftable.style.display='none';
    }
    }
}
function agregarfam(){
    nombrefam = $("#nombrefam").val();
    fenacfam = $("#fenacfam").val();
    ocupacionfam = $("#ocupacionfam").val();
    tallafam =$("#tallafam ").val(); 
    pesofam = $("#pesofam").val();
    religionfam =$("#religionfam option:selected").val(); 
    famreligion =$("#religionfam option:selected").text();
    parentescofam =$("#parentescofam option:selected").val(); 
    famparentesco =$("#parentescofam option:selected").text();

    idiomafam =$("#idiomafam option:selected").text();
    anomaliafam =$("#anomaliafam option:selected").text();
    anomal=$("input:radio[id=an]:checked").val();
    if(nombrefam!="")
    {
        if (anomal=="Si")
        {
            var item = '<tr class="even gradeA" id="idfamiliar'+contf+'">';
                item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+contf+');">X</button></td>';
                item +='<td>'+nombrefam+'</td>';
                item +='<td>'+fenacfam+'</td>';
                item +='<td>'+ocupacionfam+'</td>'; 
                item +='<td>'+tallafam+'</td>';
                item +='<td>'+pesofam+'</td>';
                item +='<td>'+idiomafam+'</td>';
                item +='<td><input type="hidden" id="religionfam" name="religionfam[]" value="'+religionfam+'">'+famreligion+'</td>';
                item +='<td>'+anomaliafam+'</td>';
                item +='<td><input type="hidden" id="parentescofam" name="parentescofam[]" value="'+parentescofam+'">'+famparentesco+'</td></tr>';
                contf++;
                limpiarfam();
            $('#detallesfam').append(item);
        }
        else
        {
            var item = '<tr class="even gradeA" id="idfamiliar'+contf+'">';
                item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+contf+');">X</button></td>';
                item +='<td>'+nombrefam+'</td>';
                item +='<td>'+fenacfam+'</td>';
                item +='<td>'+ocupacionfam+'</td>'; 
                item +='<td>'+tallafam+'</td>';
                item +='<td>'+pesofam+'</td>';
                item +='<td>'+idiomafam+'</td>';
                item +='<td><input type="hidden" id="religionfam" name="religionfam[]" value="'+religionfam+'">'+famreligion+'</td>';
                item +='<td>Ninguna</td>';
                item +='<td><input type="hidden" id="parentescofam" name="parentescofam[]" value="'+parentescofam+'">'+famparentesco+'</td></tr>';
                contf++;
                limpiarfam();
            $('#detallesfam').append(item);
        }
    }
    else
    {
        alert("Existen Campos obligatorios");
    }
}
function agregaridfam(){
    idiomafam =$("#idiomafam option:selected").val(); 
    famidioma =$("#idiomafam option:selected").text();
    var item = '<tr class="even gradeA" id="ididiomas'+contif+'">';
        item +='<td><button type="button" class="btn btn-warning" onclick="eliminarI('+contif+');">X</button></td>';
        item +='<td><input type="hidden" name="idiomafam[]" value="'+idiomafam+'">'+famidioma+'</td></tr>';
        contif++;
    $('#detallesidio').append(item);
}
function agregaranfam(){
    anomaliafam =$("#anomaliafam option:selected").val(); 
    famanomalia =$("#anomaliafam option:selected").text();

    var item = '<tr class="even gradeA" id="idanfamiliares'+contaf+'">';
        item +='<td><button type="button" class="btn btn-warning" onclick="eliminarA('+contaf+');">X</button></td>';
        item +='<td><input type="hidden" name="anomaliafam[]" value="'+anomaliafam+'">'+famanomalia+'</td></tr>';
        contaf++;
    $('#detallesanoma').append(item);
}
function agregarinfeccion(){
    infecciontipo =$("#infecciontipo option:selected").val(); 
    tipoinfeccion =$("#infecciontipo option:selected").text();

    var item = '<tr class="even gradeA" id="idinfeccion'+continf+'">';
        item +='<td><button type="button" class="btn btn-warning" onclick="eliminarIn('+continf+');">X</button></td>';
        item +='<td><input type="hidden" name="infecciontipo[]" value="'+infecciontipo+'">'+tipoinfeccion+'</td></tr>';
        continf++;
    $('#detallesinfec').append(item);
}
function agregarenfermedad(){
    enfermedadtipo =$("#enfermedadtipo option:selected").val(); 
    tipoenfermedad =$("#enfermedadtipo option:selected").text();

    var item = '<tr class="even gradeA" id="idenfermedad'+contenf+'">';
        item +='<td><button type="button" class="btn btn-warning" onclick="eliminarE('+contenf+');">X</button></td>';
        item +='<td><input type="hidden" name="enfermedadtipo[]" value="'+enfermedadtipo+'">'+tipoenfermedad+'</td></tr>';
        contenf++;
    $('#detallesenf').append(item);
}
function agregaranimal(){
    animaltipo =$("#animaltipo option:selected").val(); 
    tipoanimal =$("#animaltipo option:selected").text();

    var item = '<tr class="even gradeA" id="idanimal'+contani+'">';
        item +='<td><button type="button" class="btn btn-warning" onclick="eliminarAni('+contani+');">X</button></td>';
        item +='<td><input type="hidden" name="animaltipo[]" value="'+animaltipo+'">'+tipoanimal+'</td></tr>';
        contani++;
    $('#detallesanimal').append(item);
}
function agregarpersonal(){
    personalati =$("#personalati option:selected").val(); 
    atipersonal =$("#personalati option:selected").text();

    var item = '<tr class="even gradeA" id="idpersonal'+contper+'">';
        item +='<td><button type="button" class="btn btn-warning" onclick="eliminarPer('+contper+');">X</button></td>';
        item +='<td><input type="hidden" name="personalati[]" value="'+personalati+'">'+atipersonal+'</td></tr>';
        contper++;
    $('#detallespersona').append(item);
}
function agregarmedicina(){
    medicamento =$("#medicamento option:selected").val(); 
    tmedicamento =$("#medicamento option:selected").text();

    var item = '<tr class="even gradeA" id="idmedicamento'+contmed+'">';
        item +='<td><button type="button" class="btn btn-warning" onclick="eliminarMed('+contmed+');">X</button></td>';
        item +='<td><input type="hidden" name="medicamento[]" value="'+medicamento+'">'+tmedicamento+'</td></tr>';
        contmed++;
    $('#detallesmedicina').append(item);
}

function agregarvacuna(){
    vacunass =$("#vacunass option:selected").val(); 
    svacunas =$("#vacunass option:selected").text();

    var item = '<tr class="even gradeA" id="idvacunass'+contvac+'">';
        item +='<td><button type="button" class="btn btn-warning" onclick="eliminarVac('+contvac+');">X</button></td>';
        item +='<td><input type="hidden" name="vacunass[]" value="'+vacunass+'">'+svacunas+'</td></tr>';
        contvac++;
    $('#detallesvacuna').append(item);
}
function agregarpadecidos(){
    enfpadecido =$("#enfpadecido option:selected").val(); 
    padecidoenf =$("#enfpadecido option:selected").text();

    var item = '<tr class="even gradeA" id="idpadecidos'+contpad+'">';
        item +='<td><button type="button" class="btn btn-warning" onclick="eliminarPad('+contpad+');">X</button></td>';
        item +='<td><input type="hidden" name="enfpadecido[]" value="'+enfpadecido+'">'+padecidoenf+'</td></tr>';
        contpad++;
    $('#detallesenpadecido').append(item);
}
function eliminar(index){
    $("#idfamiliar" + index).remove();
    contf--;
    $("#ididiomas" + index).remove();
    contif--;
    $("#idanfamiliares" + index).remove();
    contaf--;
}

function eliminarI(index){
    $("#ididiomas" + index).remove();
    contif--;
}

function eliminarA(index){
    $("#idanfamiliares" + index).remove();
    contaf--;
}
function eliminarIn(index){
    $("#idinfeccion" + index).remove();
    continf--;
}
function eliminarE(index){
    $("#idenfermedad" + index).remove();
    contenf--;
}
function eliminarAni(index){
    $("#idanimal" + index).remove();
    contani--;
}
function eliminarPer(index){
    $("#idpersonal" + index).remove();
    contper--;
}
function eliminarMed(index){
    $("#idmedicamento" + index).remove();
    contmed--;
}
function eliminarVac(index){
    $("#idvacunass" + index).remove();
    contvac--;
}
function eliminarPad(index){
    $("#idpadecidos" + index).remove();
    contpad--;
}
function limpiarfam()
{
    $("#nombrefam").val("");
    $("#apellidofam").val("");
    $("#fenacfam").val("");
    $("#ocupacionfam").val("");
    $("#tallafam option:selected").val("");
    $("#pesofam").val("");
    $("#religionfam option:selected").val(""); 
    $("#parentescofam option:selected").val(""); 
    $("#idiomafam option:selected").val(""); 
    $("#anomaliafam option:selected").val(""); 
}


//Validaciones Letras y numeros
    function valida(e){
        tecla = e.keyCode || e.which;
        tecla_final = String.fromCharCode(tecla);
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8 || tecla==37 || tecla==39 ||tecla==46 ||tecla==9)
            {
                return true;
            } 
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        //patron =/^\d{9}$/;
        return patron.test(tecla_final);

    }
            //Se utiliza para que el campo de texto solo acepte letras
    function validaL(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ63";//Se define todo el abecedario que se quiere que se muestre.
        especiales = [8, 37, 39, 46, 9]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.
        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial){
            //alert('Tecla no aceptada');
            return false;
            }
    }