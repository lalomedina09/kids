
  $(document).ready(function(){
        let consulta = "Hola Lalo";
        let param = 1;
        console.log(consulta + ' Inicia a trabajar backend para devolver informacion de Herramienta Presupuesto')
        //Paso 1 funcion para ir al backend y buscar movimientos
        //Llamamos a la funcion que comienza a sincronizar los movimientos y calculos
        activeBudgetOption(param);


});

function activeBudgetOption(param) {

    let token = $('#token').val();

    //console.log('entro a la funcion de presupuesto activado opcion');
    //$('#contentLoading').show();
    $.ajax({
        url:"/budget/active",
        beforeSend: function() {
            $('#contentLoading').addClass('loading-show');
            $('#contentLoading').removeClass('loading-hidden');
        },
        complete: function() {
            $('#contentLoading').removeClass('loading-show');
            $('#contentLoading').addClass('loading-hidden');
        },
        data: {_token:token, param:param},
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){
            $("#table-movements").empty();
            $("#table-movements").html(data.table_movements);
            //$('#contentLoading').hide();
            console.log("okay vamos bien");

        },
        error: function(){
              console.log("No se pudo retornar el valor")
         }
    });

};
/*
function activeBudget(param) {
    console.log('entro a la funcion');
    let url = "{{ route('budget.active')}}";

    let token = $('#token').val();

        $('#contentLoading').html('<div class="loading"><img src ="/images/gif/loading/circle-gray.gif" width="100px" alt="loading" /><br/><p>Cargando....</p></div>');
        $.post(url, {
            _token: token,
        },
        function(data){
            console.log(data);
            $("#table-movements").empty();
            $("#table-movements").html(data.table_movements);
            console.log('regreso del controlador');
        });
}
*/
