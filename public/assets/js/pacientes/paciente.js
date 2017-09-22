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

            var formData = {
                nombrep:$("#nombrep").val(),
                apellidop:$("#apellidop").val(),
                fechanacp:$("#fechanacp").val(),
                origenp:$("#origenp").val(),
                procedenciap:$("#procedenciap").val(),
                tallap:$("#tallap option:selected").val(),
                pesop:$("#pesop").val(),
                items: itemsData,
                itemsL: itemsDataL,
                itemsA: itemsDataA,
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
    $("#idiomafam").select2(
        {
            multiple: true,
            placeholder: "Seleccione"
        });
    $("#addFam").click(function(){
        agregarfam();
    });
    $("#addIdiofam").click(function(){
        agregaridfam();
    });
    $("#addAnofam").click(function(){
        agregaranfam();
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