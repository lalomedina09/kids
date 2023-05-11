$(document).ready(function(){

    let param = 1;
        console.log('Se inicio la busqueda de movimientos')
        activeBudgetSectionCreateCategories();
        //activeBudgetSectionMonth();
        activeBudgetSectionMonthMenu('entrances');
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

function activeBudgetSectionCreateCategories() {

    let token = $('#token').val();
    console.log('El usuario activo la herramienta de presupuesto');
    $.ajax({
        url: "/budget/active/categories",
        data: {
            _token: token
        },
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function (data) {
            console.log("Se hizo busqueda y creación de categorias");
        },
        error: function () {
            console.log("No se logro realizar la busqueda de categorias")
        }
    });

}

