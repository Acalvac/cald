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
        },*/
        onFinishing: function(e){
            var nombre=$("#nombre").val();
        }
    });
    $('#fenac').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
    $('#fechanac').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
});