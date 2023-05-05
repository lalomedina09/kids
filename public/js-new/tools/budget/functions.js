//import myModule from 'month/month';

// This code will throw a "ReferenceError: require is not defined" error
//const myModule = require('./my-module');

// To fix the error, remove the require function and use a different approach to load the module



$(document).ready(function(){
    //require('./month/month.js');

    let param = 1;
        console.log('Se inicio la busqueda de movimientos')
        //customTestLalo();
        activeBudgetOption(param);
});


function activeBudgetOption(param) {

    let token = $('#token').val();
    console.log('Inicia activacion de ajax Presupuesto activado');+
    $.ajax({
        url:"/budget/active",
        beforeSend: function() {
            customBeforeLoading();
        },
        complete: function() {
            customCompleteLoading();
        },
        data: {
                _token:token,
                param:param
        },
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){
            console.log("Ajax regreso con exito del BackEnd");

            responseDataHeaderMonth(data);
            responseDataMoves(data);
        },
        error: function(){
              console.log("Ajax no tuvo exito en el BackEnd")
         }
    });

};

function customBeforeLoading()
{
    $('#contentLoading').addClass('loading-show');
    $('#contentLoading').removeClass('loading-hidden');
}

function customCompleteLoading()
{
    $('#contentLoading').removeClass('loading-show');
    $('#contentLoading').addClass('loading-hidden');
}

function responseDataHeaderMonth(data)
{
    console.log("Update Div header de etiquetas mensuales");
    $("#header-level-month").empty();
    $("#header-level-month").html(data.header_month);
}

function responseDataMoves(data)
{
    console.log("Update Div de movimientos");
    $("#table-movements").empty();
    $("#table-movements").html(data.table_movements);
}

function showDataBudgetMonth() {

    let url = '/perfil/branch/edit/' + branch_id;
    let token = $('#token').val();
    let modal = $('#modalSiemple');
    console.log('Initial Open Modal Edit Branch');

    $.post(url, {
        _token: token,
        branch_id: branch_id,
    },
        function (data) {
            console.log(data);

            console.log('Success Open Modal Edit Branch');
            modal.modal('show');
            $("#content-temporal").empty();
            $("#content-temporal").html(data.view);
        });
}
