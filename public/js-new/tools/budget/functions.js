$(document).ready(function(){

    let param = 1;
    let section = 'entrances';
        console.log('Se inicio la busqueda de movimientos')
        activeBudgetSectionCreateCategories();
        //activeBudgetSectionMonth();
        activeBudgetSectionYear();
        activeBudgetSectionMonthMenu(section);
});
//activeBudgetSectionMonthMenu
//activeBudgetSectionMonthMenu
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

function budgetEditInput(section, nameInput, id_move, divAmountEstimate, divAmountReal) {

    let token = $('#token').val();
    //let month = $('#month').val();
    //let year = $('#year').val();
    ////7
    let month = $('#budget_month_id').val();
    let year = $('#budget_year_id').val();
    ////
    let value = $('#' + nameInput + '_' + id_move).val();

    console.log('Usuario inicia edicion del input con valor:  ' + nameInput);

    $.ajax({
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
            console.log("Se hizo el update del input " + nameInput);
            $("#header-level-month").empty();
            $("#header-level-month").html(data.resumenMonth);

            //Update Encabezado de Categoria Monto Real
            $('#' + divAmountReal).empty();
            $('#' + divAmountReal).html(data.viewHeaderCategoryAmountEstimate);
            console.log(divAmountReal + '<--- div para monto real');

            //Update Encabezado de Categoria Monto Estimado
            $('#' + divAmountEstimate).empty();
            $('#' + divAmountEstimate).html(data.viewHeaderCategoryAmountReal);
            console.log(divAmountEstimate + '<--- div para monto estimado');
            //$('#' + nameInput + '_' + id_move).val();
            //divArrowsName
        },
        error: function () {
            console.log("No se hizo el update en la DB")
        }
    });

}


function openModalAddMove(section, categoryId, divArrowsCategory, divAmountEstimate, divAmountReal) {

    let url = '/budget/addmove/modal/open';
    let token = $('#token').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();
    console.log('Activando modal para agregar movimiento');

    $.post(url, {
        _token: token,
        section: section,
        categoryId: categoryId,
        divArrowsCategory: divArrowsCategory,
        divAmountEstimate: divAmountEstimate,
        divAmountReal: divAmountReal,
        month: budget_month,
        year: budget_year
    },
        function (data) {
            console.log('Listo para agregar movimiento');
            $("#contentModalAddMove").empty();
            $("#contentModalAddMove").html(data.view);
            $("#modalAddMoveBudget").modal('show');

        });
}

function openModalMoves(nameMonth, start, end) {

    let url = '/budget/modal/year/movements';
    let token = $('#token').val();
    console.log('Activacion para abrir ventana modal ver movimientos');
    $.post(url, {
        _token: token,
        //section: section,
        nameMonth: nameMonth,
        start: start,
        end: end
    },
        function (data) {
            //console.log(data);
            console.log('Listo para ver movimientos');
            $("#contentModalMoves").empty();
            $("#contentModalMoves").html(data.view);
            $("#modalMoves").modal('show');

        });
}

function openModalBudgetZoom(nameMonth, start, end) {

    let url = '/budget/modal/year/zoom';
    let token = $('#token').val();
    console.log('Activacion para ver div en Zoom');
    $.post(url, {
        _token: token,
        //section: section,
        nameMonth: nameMonth,
        start: start,
        end: end
    },
        function (data) {
            //console.log(data);
            console.log('Zoom activado para seccion del mes');
            $("#contentModalZoom").empty();
            $("#contentModalZoom").html(data.view);
            $("#modalZoom").modal('show');

        });
}

function saveMoveBudget(section, divArrowsCategory, divAmountEstimate, divAmountReal){
    let url = '/budget/addmove/modal/save';
    let token = $('#token').val();

    let category_id = $('#formAddMove_category_id').val();
    let name = $('#formAddMove_name').val();
    let estimated = $('#formAddMove_estimated').val();
    let real = $('#formAddMove_real').val();
    let percent = $('#formAddMove_percent').val();
    let created_at = $('#formAddMove_date').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();
    //let addMovePostMonth = null;
    let addMovePostMonth = $('#addMovePostMonth').prop('checked');

    if (category_id != '' && name != '' && estimated != '' && created_at != '') {
        console.log('Inicia proceso para envio de formulario registrar categoria');

    }else{
        alert('No puedes guardar campos vacios');
        return false;
    }

    $.post(url, {
        _token: token,
        section: section,
        category_id: category_id,
        name: name,
        amount_estimated: estimated,
        amount_real: real,
        percent: percent,
        divAmountEstimate: divAmountEstimate,
        divAmountReal: divAmountReal,
        created_at: created_at,
        month: budget_month,
        year: budget_year,
        addMovePostMonth: addMovePostMonth
    },
        function (data) {
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

            //Encabezado de la categoria principal
            $('#modalAddMoveBudget').modal('hide');
        });
}

