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
//function budgetEditInput(section, idInput, id_move) {
function budgetEditInput(section, nameInput, id_move) {

    let token = $('#token').val();
    let month = $('#month').val();
    let year = $('#year').val();
    let value = $('#' + nameInput + '_' + id_move).val();
    //alert('id = ' + input);
    //alert('jijijijijijijijij');
    console.log('Usuario inicia edicion del input con valor:  ' + value);

    $.ajax({
        url: "/budget/edit/" + section,
        data: {
            _token: token,
            year: year,
            month: month,
            value: value,
            id_move: id_move,
            nameInput: nameInput
        },
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function (data) {
            console.log("Se hizo el update del input " + value);
        },
        error: function () {
            console.log("No se hizo el update en la DB")
        }
    });

}
