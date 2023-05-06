$(document).ready(function(){

    let param = 1;
        console.log('Se inicio la busqueda de movimientos')

        activeBudgetSectionMonth();
        activeBudgetSectionYear();
});

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
/*
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
*/
