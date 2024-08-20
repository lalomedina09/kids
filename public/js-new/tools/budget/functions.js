$(document).ready(function() {

    let param = 1;
    let section = 'entrances';
    //alert('dididid');
    //console.log('entro a presupuesto');
    activeBudgetSectionCreateCategories();
    activeBudgetSectionYear();
    activeBudgetSectionMonthMenu(section);
});

function customBeforeLoading() {
    $('#contentLoading').addClass('loading-show');
    $('#contentLoading').removeClass('loading-hidden');
}

function customCompleteLoading() {
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
        success: function(data) {
            //console.log("Se hizo busqueda y creación de categorias");
        },
        error: function() {
            //console.log("No se logro realizar la busqueda de categorias")
        }
    });

}

function budgetEditInput(section, nameInput, id_move, divAmountEstimate, divAmountReal, userCategoryId) {

    let token = $('#token').val();
    let month = $('#budget_month_id').val();
    let year = $('#budget_year_id').val();
    let value = $('#' + nameInput + '_' + id_move).val();
    //console.log(value);
    $.ajax({
        beforeSend: function() {
            $('#budgetSectionMonthBtnsLoading').css("display", "contents");
        },
        complete: function() {
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
            nameInput: nameInput,
            userCategory_id: userCategoryId
        },
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data) {
            $("#header-level-month").empty();
            $("#header-level-month").html(data.resumenMonth);

            $('#' + divAmountReal).empty();
            $('#' + divAmountReal).html(data.viewHeaderCategoryAmountEstimate);

            $('#' + divAmountEstimate).empty();
            $('#' + divAmountEstimate).html(data.viewHeaderCategoryAmountReal);

            alertify.notify('Actualización realizada con exito', 'success', 5, function() {
                //console.log('Alerta actualizacion de input');
            });

        },
        error: function() {
            //console.log("No se hizo el update en la DB")
        }
    });

}

function simpleDeleteMoveOfCategory(moveId, section, categoryId, divArrowsCategory, divAmountReal, divAmountEstimate, categoryUserId) {
    let url = '/budget/actions/modal/destroy-move';
    let token = $('#token').val();

    $('#budgetSectionMonthBtnsLoading').css("display", "contents");
    $.post(url, {
            _token: token,
            moveId: moveId,
            section: section,
            categoryId: categoryId,
            divArrowsCategory: divArrowsCategory,
            divAmountReal: divAmountReal,
            divAmountEstimate: divAmountEstimate,
            categoryUserId: categoryUserId
        },
        function(data) {
            $("#header-level-month").empty();
            $("#header-level-month").html(data.resumenMonth);

            //Renglones de la categoria principal
            $('#' + divArrowsCategory).empty();
            $('#' + divArrowsCategory).html(data.divArrowsCategory);

            //Update Encabezado de Categoria Monto Real
            $('#' + divAmountReal).empty();
            $('#' + divAmountReal).html(data.viewAmountEstimate);

            //Update Encabezado de Categoria Monto Estimado
            $('#' + divAmountEstimate).empty();
            $('#' + divAmountEstimate).html(data.viewAmountReal);

            $('#budgetSectionMonthBtnsLoading').css("display", "none");
            $('#row_id_move_' + moveId).hide(4000);

            alertify.notify('Movimiento eliminado con exito a la categoria', 'success', 5, function() {
                //console.log('Movimiento Agregado con exito a la categoria');
            });
        });
}