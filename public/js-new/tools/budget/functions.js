$(document).ready(function(){

    let param = 1;
    let section = 'entrances';
        activeBudgetSectionCreateCategories();
        activeBudgetSectionYear();
        activeBudgetSectionMonthMenu(section);
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
            //console.log("Se hizo busqueda y creación de categorias");
        },
        error: function () {
            //console.log("No se logro realizar la busqueda de categorias")
        }
    });

}

function budgetEditInput(section, nameInput, id_move, divAmountEstimate, divAmountReal) {

    let token = $('#token').val();
    let month = $('#budget_month_id').val();
    let year = $('#budget_year_id').val();
    let value = $('#' + nameInput + '_' + id_move).val();

    $.ajax({
        beforeSend: function () {
            $('#budgetSectionMonthBtnsLoading').css("display", "contents");
        },
        complete: function () {
            $('#budgetSectionMonthBtnsLoading').css("display", "none");
        },
        url: "/budget/edit/" + section,
        data: {
            _token: token,
            year: year,
            month: month,
            value: value,
            id_move: id_move,
            section: section,
            nameInput: nameInput
        },
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function (data) {
            $("#header-level-month").empty();
            $("#header-level-month").html(data.resumenMonth);

            $('#' + divAmountReal).empty();
            $('#' + divAmountReal).html(data.viewHeaderCategoryAmountEstimate);

            $('#' + divAmountEstimate).empty();
            $('#' + divAmountEstimate).html(data.viewHeaderCategoryAmountReal);
        },
        error: function () {
            //console.log("No se hizo el update en la DB")
        }
    });

}
