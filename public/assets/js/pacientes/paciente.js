$(document).ready(function(){
    
    $("#wizard").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        /*onStepChanging: function (e)
        {
            var nombre=$("#nombre").val();
            if (nombre!=""){
                return true;
            }
            else
            {
                alert("Esta vacio");
                return false;
            }
            laas
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
                var apellidofam = $(this).find('td').eq(2).html();
                var fenacfam = $(this).find('td').eq(3).html();
                var ocupacionfam = $(this).find('td').eq(4).html();
                var tallafam = $(this).closest('tr').find('input[type="hidden"]').val();
                var pesofam = $(this).find('td').eq(6).html();
                var idiomafam = $(this).find('td').eq(7).html();
                var religionfam = $(this).closest('tr').find('input[id="religionfam"]').val();
                var parentescofam = $(this).closest('tr').find('input[id="parentescofam"]').val();
                valor = new Array(nombrefam,apellidofam,fenacfam,ocupacionfam,tallafam,pesofam,idiomafam,religionfam,parentescofam);
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
                nombrep:$("#nombrep").val(),
                apellidop:$("#apellidop").val(),
                fechanacp:$("#fechanacp").val(),
                origenp:$("#origenp").val(),
                procedenciap:$("#procedenciap").val(),
                tallap:$("#tallap option:selected").val(),
                pesop:$("#pesop").val(),

                nombreres:$("#nombreres").val(),
                identres:$("#identificacionres").val(),
                direccionres:$("#direccionres").val(),
                telefonores:$("#telefonores").val(),

                items: itemsData,
                itemsL: itemsDataL,
                itemsA: itemsDataA,

                imde:$("#imde").val(),
                ecdm:$("#ecdm").val(),
                cmcad:$("#cmcad").val(),
                tpamp:$("#tpamp").val(),
                mednatural:$("#mednatural").val(),
                tparto:$("#tparto").val(),
                lnin:$("#lnin").val(),
                pcnn:$("#pcnn").val(),
                mnpr:$("#mnpr").val(),
                nipdn:$("#nipdn").val(),
                sbpdn:$("#sbpdn").val(),
                tpym:$("#tpym").val(),
                icoac:$("#icoac").val(),
                tcp:$("#tcp").val(),
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
                vacunass:$("#vacunass").val(),
                chermanost:$("#chermanost").val(),
                enfpadecido:$("#enfpadecido").val(),
                ordencor:$("#ordencor").val(), 
                bautizado:$("#bautizado").val(), 

                itemsVac: itemsDataVac,
                itemsPad: itemsDataPad,               
            }
             console.log(formData);

            $.ajax({
                type: "POST",
                url: miurl,
                data: formData,
                dataType: 'json',

                success: function (data) {
                    console.log(formData);
                    swal({ 
                        title:"Envio correcto",
                        text: "Información actualizada correctamente",
                        type: "success"
                    },
                    function(){
                        //window.location.href="/empleado/solicitante"
                    });
                    
                },
                error: function (data) {
                    
                }
            });

        }
    });
    $("#idiomafam").select2();
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
    $('#fechanacp').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
    $('#fenacfam').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

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
function Infecmadre(elementos) {
    element = document.getElementById("Div1");
    divin = document.getElementById("infeccion");
    if (elementos.value=="1") {
        element.style.display='block';
        divin.style.display='block';
    }
    else 
    { if (elementos.value=="0") {
        element.style.display='none';
        divin.style.display='none';
    }
    }
}
function Enfcmadre(elementos) {
    element = document.getElementById("Div2");
    enfcronica = document.getElementById("enfcronicas");
    if (elementos.value=="1") {
        element.style.display='block';
        enfcronica.style.display='block';
    }
    else 
    { if (elementos.value=="0") {
        element.style.display='none';
        enfcronica.style.display='none';
    }
    }
}
function Conmadre(elementos) {
    element = document.getElementById("Div3");
    anconvive = document.getElementById("anconvive");
    if (elementos.value=="1") {
        element.style.display='block';
        anconvive.style.display='block';
    }
    else 
    { if (elementos.value=="0") {
        element.style.display='none';
        anconvive.style.display='none';
    }
    }
}
function Atmadre(elementos) {
    element = document.getElementById("Div4");
    personaatendio = document.getElementById("personaatendio");
    if (elementos.value=="1") {
        element.style.display='block';
        personaatendio.style.display='block';
    }
    else 
    { if (elementos.value=="0") {
        element.style.display='none';
        personaatendio.style.display='none';
    }
    }
}
function mtdeimn(elementos) {
    element = document.getElementById("Div6");
    medicamentos = document.getElementById("medicamentos");
    if (elementos.value=="1") {
        element.style.display='block';
        medicamentos.style.display='block';
    }
    else 
    { if (elementos.value=="0") {
        element.style.display='none';
        medicamentos.style.display='none';
    }
    }
}
function Tcontrolp(elementos) {
    element = document.getElementById("Div5");
    if (elementos.value=="1") {
        element.style.display='block';
    }
    else 
    { if (elementos.value=="0") {
        element.style.display='none';
    }
    }
}

function Vacunast(elementos) {
    element = document.getElementById("divacuna");
    vactable = document.getElementById("vactable");
    if (elementos.value=="1") {
        element.style.display='block';
        vactable.style.display='block';
    }
    else 
    { if (elementos.value=="0") {
        element.style.display='none';
        vactable.style.display='none';
    }
    }
}
function Enfpadecido(elementos) {
    element = document.getElementById("divpadecido");
    enftable = document.getElementById("enftable");
    if (elementos.value=="1") {
        element.style.display='block';
        enftable.style.display='block';
    }
    else 
    { if (elementos.value=="0") {
        element.style.display='none';
        enftable.style.display='none';
    }
    }
}
function agregarfam(){
    nombrefam = $("#nombrefam").val();
    apellidofam = $("#apellidofam").val();
    fenacfam = $("#fenacfam").val();
    ocupacionfam = $("#ocupacionfam").val();
    tallafam =$("#tallafam option:selected").val(); 
    famtalla =$("#tallafam option:selected").text();
    pesofam = $("#pesofam").val();
    religionfam =$("#religionfam option:selected").val(); 
    famreligion =$("#religionfam option:selected").text();
    parentescofam =$("#parentescofam option:selected").val(); 
    famparentesco =$("#parentescofam option:selected").text();

    idiomafam =$("#idiomafam option:selected").text();

    if(nombrefam!="")
    {
        var item = '<tr class="even gradeA" id="idfamiliar'+contf+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+contf+');">X</button></td>';
            item +='<td>'+nombrefam+'</td>';
            item +='<td>'+apellidofam+'</td>';
            item +='<td>'+fenacfam+'</td>';
            item +='<td>'+ocupacionfam+'</td>'; 
            item +='<td><input type="hidden" id="tallafam" name="tallafam[]" value="'+tallafam+'">'+famtalla+'</td>';
            item +='<td>'+pesofam+'</td>';
            item +='<td>'+idiomafam+'</td>';
            item +='<td><input type="hidden" id="religionfam" name="religionfam[]" value="'+religionfam+'">'+famreligion+'</td>';
            item +='<td><input type="hidden" id="parentescofam" name="parentescofam[]" value="'+parentescofam+'">'+famparentesco+'</td></tr>';
            contf++;
            limpiarfam();
        $('#detallesfam').append(item);
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
    $("#tallafam option:selected").text("Seleccione");
    $("#pesofam").val("");
    $("#religionfam option:selected").val(""); 
    $("#religionfam option:selected").text("Seleccione");
    $("#parentescofam option:selected").val(""); 
    $("#parentescofam option:selected").text("Seleccione");
    $("#idiomafam option:selected").val(""); 
    $("#idiomafam option:selected").text("Seleccione");
    $("#anomaliafam option:selected").val(""); 
    $("#anomaliafam option:selected").text("Seleccione");
}