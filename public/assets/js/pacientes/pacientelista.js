$("#btndebaja").click(function(){
    	var idpas=$(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        swal({
            title: '¿Esta seguro de cambiar de status a esta persona?',
            text: "Precione si para continuar, no para cerrar este mensaje.",
            type: 'question',
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
                    type: "PUT",
                    url: '/paciente/baja/' + idpas,
                    success: function (data) {
                        console.log(data);
                        $("#paci" + idpas).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                'Canceladoo!',
                'No se realizo ningun cambio :)',
                'error'
                )
            }
        });
});

//Recuperar a bienhechor
 $(document).on('click','.btnrecupera',function(){
        var idpas=$(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        swal({
            title: '¿Está seguro de cambiar a estatus activo a esta persona?',
            text: "Precione si para continuar, no para cerrar este mensaje.",
            type: 'question',
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
                    type: "PUT",
                    url: '/paciente/recuperarp/' + idpas,
                    success: function (data) {
                        console.log(data);
                        $("#paci" + idpas).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                'Canceladoo!',
                'No se realizo ningun cambio :)',
                'error'
                )
            }
        });
        $("#erroresContent").html(errHTML); 
        $('#erroresModal').modal('show');
    });