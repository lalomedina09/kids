function openModalAddMove(section, categoryId, divArrowsCategory, divAmountEstimate, divAmountReal) {

    let url = '/budget/addmove/modal/open';
    let token = $('#token').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();
    //console.log('Activando modal para agregar movimiento');
    $('#budgetSectionMonthBtnsLoading').css("display", "contents");
    $.post(url, {
        _token: token,
        section: section,
        categoryId: categoryId,
        divArrowsCategory: divArrowsCategory,
        idArrowsName: divArrowsCategory,
        divAmountEstimate: divAmountEstimate,
        divAmountReal: divAmountReal,
        month: budget_month,
        year: budget_year
    },
        function (data) {
            //console.log('Listo para agregar movimiento');
            $("#contentModalAddMove").empty();
            $("#contentModalAddMove").html(data.view);
            $("#modalAddMoveBudget").modal('show');
            $('#budgetSectionMonthBtnsLoading').css("display", "none");
        });
}

function openModalMoves(nameMonth, start, end) {

    let url = '/budget/modal/year/movements';
    let token = $('#token').val();
    //console.log('Activacion para abrir ventana modal ver movimientos');
    $('#budgetSectionYearLoading').css("display", "contents");

    $.post(url, {
        _token: token,
        //section: section,
        nameMonth: nameMonth,
        start: start,
        end: end
    },
        function (data) {
            //console.log('Listo para ver movimientos');
            $("#contentModalMoves").empty();
            $("#contentModalMoves").html(data.view);
            $("#modalMoves").modal('show');
            $('#budgetSectionYearLoading').css("display", "none");
        });
}
function openModalAddMoveToCategory(section, categoryId, divArrowsCategory, divAmountEstimate, divAmountReal, budgetId) {

    let url = '/budget/addmove/modal/open/add/move-to-category';
    let token = $('#token').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();

    $('#budgetSectionMonthBtnsLoading').css("display", "contents");
    $.post(url, {
            _token: token,
            section: section,
            categoryId: categoryId,
            divArrowsCategory: divArrowsCategory,
            idArrowsName: divArrowsCategory,
            divAmountEstimate: divAmountEstimate,
            divAmountReal: divAmountReal,
            month: budget_month,
            year: budget_year,
            budgetId: budgetId
        },
        function (data) {

            $("#contentModalAddMove").empty();
            $("#contentModalAddMove").html(data.view);
            $("#modalAddMoveBudget").modal('show');
            $('#budgetSectionMonthBtnsLoading').css("display", "none");
        });
}


//NX8 Ver los movimientos en una ventana modal, solo de la categoria porque se van actualizar y eliminar
function openModalShowMovesForEditOrDelete(section, categoryId, divArrowsCategory, divAmountEstimate, divAmountReal, budgetId)
{
    let url = '/budget/actions/modal/show-moves';
    let token = $('#token').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();

    $('#budgetSectionMonthBtnsLoading').css("display", "contents");
    $.post(url, {
            _token: token,
            section: section,
            categoryId: categoryId,
            divArrowsCategory: divArrowsCategory,
            idArrowsName: divArrowsCategory,
            divAmountEstimate: divAmountEstimate,
            divAmountReal: divAmountReal,
            month: budget_month,
            year: budget_year,
            budgetId: budgetId
        },
        function (data) {
            $("#contentModalAddMove").empty();
            $("#contentModalAddMove").html(data.view);
            $("#modalAddMoveBudget").modal('show');
            $('#budgetSectionMonthBtnsLoading').css("display", "none");
        });
}
//NX8 termina

//NX9 Empieza funcion para eliminar solo un movimiento
function deleteCategoryBudget(section, divArrowsCategory, divAmountEstimate, divAmountReal) {
    let url = '/budget/actions/modal/show-moves';
    let token = $('#token').val();
    let category_id = $('#formAddMove_category_id').val();
    let budget_id = $('#formDeleteMove_id').val();
    let budget_name = $('#formDeleteMove_name').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();
    let ts_category_user_id = $('#formDeleteMove_ts_category_user_id').val();
    let deleteMovePostMonth = $('#deleteMovePostMonth').prop('checked');
    $('#budgetMonthLoadingDeleteMove').css("display", "contents");
    $.post(url, {
        _token: token,
        section: section,
        category_id: category_id,
        divAmountEstimate: divAmountEstimate,
        divAmountReal: divAmountReal,
        month: budget_month,
        year: budget_year,
        budget_id: budget_id,
        ts_category_user_id: ts_category_user_id,
        budget_name: budget_name,
        deleteMovePostMonth: deleteMovePostMonth,
        divArrowsCategory: divArrowsCategory
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
            $('#modalDeleteMoveBudget').modal('hide');
            $('#budgetMonthLoadingDeleteMove').css("display", "none");

            alertify.notify('Movimiento Eliminado con exito', 'success', 5, function () {
                console.log('Movimiento Eliminado con exito');
            });
        });
}
//NX9 termina

/*Empiezan funciones relacionadas con la vista anual*/
function openModalBudgetZoom(nameMonth, start, end) {

    let url = '/budget/modal/year/zoom';
    let token = $('#token').val();
    //console.log('Activacion para ver div en Zoom');
    $('#budgetSectionYearLoading').css("display", "contents");

    $.post(url, {
        _token: token,
        //section: section,
        nameMonth: nameMonth,
        start: start,
        end: end
    },
        function (data) {
            //console.log('Zoom activado para seccion del mes');
            $("#contentModalZoom").empty();
            $("#contentModalZoom").html(data.view);
            $("#modalZoom").modal('show');
            $('#budgetSectionYearLoading').css("display", "none");
        });
}
//Funcion para guardar la categoriato
function saveCategoryBudget(section, divArrowsCategory, divAmountEstimate, divAmountReal) {
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

    let addMovePostMonth = $('#addMovePostMonth').prop('checked');

    if (category_id != '' && name != '' && created_at != '') {
        //console.log('Inicia proceso para envio de formulario registrar categoria');

    } else {
        alert('Debes agregar el nombre de la categoría');
        return false;
    }
    $('#budgetMonthLoadingAddMove').css("display", "contents");

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
        addMovePostMonth: addMovePostMonth,
        divArrowsCategory: divArrowsCategory
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
            $('#budgetMonthLoadingAddMove').css("display", "none");

            alertify.notify('Categoría Agregado con exito', 'success', 5, function () {
                console.log('Categoría Agregado con exito');
            });
        });
}

//Funcion para guardar el movimiento dentro de una categoria
function saveMoveToCategoryBudget(section, divArrowsCategory, divAmountEstimate, divAmountReal) {
    let url = '/budget/addmove/modal/open/add/move-to-category/save';
    let token = $('#token').val();

    let category_id = $('#formAddMove_category_id').val();
    let parent_id = $('#formAddMove_category_user_id').val();
    let name = $('#formAddMove_name').val();
    let estimated = $('#formAddMove_estimated').val();
    let real = $('#formAddMove_real').val();
    let percent = $('#formAddMove_percent').val();
    let created_at = $('#formAddMove_date').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();
    let budgetId = $('#budgetId').val();
    let addMovePostMonth = $('#addMovePostMonth').prop('checked');

    if (category_id != '' && name != '' && created_at != '') {
        //console.log('Inicia proceso para envio de formulario registrar categoria');

    } else {
        alert('Debes agregar el nombre de la categoría');
        return false;
    }
    $('#budgetMonthLoadingAddMove').css("display", "contents");

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
            addMovePostMonth: addMovePostMonth,
            divArrowsCategory: divArrowsCategory,
            parent_id: parent_id,
            budgetId:budgetId
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
            $('#budgetMonthLoadingAddMove').css("display", "none");

            alertify.notify('Movimiento Agregado con exito a la categoria', 'success', 5, function () {
                console.log('Movimiento Agregado con exito a la categoria');
            });
        });
}

//Funcion para abrir Ventana modal que eliminara la categoria
function openModalDeleteCategory(section, categoryId, divArrowsCategory, divAmountEstimate, divAmountReal, budget_id) {

    let url = '/budget/deletemove/modal/open';
    let token = $('#token').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();
    $('#budgetSectionMonthBtnsLoading').css("display", "contents");

    $.post(url, {
        _token: token,
        section: section,
        categoryId: categoryId,
        divArrowsCategory: divArrowsCategory,
        divAmountEstimate: divAmountEstimate,
        divAmountReal: divAmountReal,
        month: budget_month,
        year: budget_year,
        budget_id: budget_id
    },
        function (data) {
            $("#contentModalDeleteMove").empty();
            $("#contentModalDeleteMove").html(data.view);
            $("#modalDeleteMoveBudget").modal('show');
            $('#budgetSectionMonthBtnsLoading').css("display", "none");
        });
}

//Funcion para confirmar que se van a eliminar la categoria
function deleteCategoryBudget(section, divArrowsCategory, divAmountEstimate, divAmountReal) {
    let url = '/budget/deletemove/modal/confirm';
    let token = $('#token').val();
    let category_id = $('#formAddMove_category_id').val();
    let budget_id = $('#formDeleteMove_id').val();
    let budget_name = $('#formDeleteMove_name').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();
    let ts_category_user_id = $('#formDeleteMove_ts_category_user_id').val();
    let deleteMovePostMonth = $('#deleteMovePostMonth').prop('checked');
    $('#budgetMonthLoadingDeleteMove').css("display", "contents");
    $.post(url, {
        _token: token,
        section: section,
        category_id: category_id,
        divAmountEstimate: divAmountEstimate,
        divAmountReal: divAmountReal,
        month: budget_month,
        year: budget_year,
        budget_id: budget_id,
        ts_category_user_id: ts_category_user_id,
        budget_name: budget_name,
        deleteMovePostMonth: deleteMovePostMonth,
        divArrowsCategory: divArrowsCategory
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
            $('#modalDeleteMoveBudget').modal('hide');
            $('#budgetMonthLoadingDeleteMove').css("display", "none");

            alertify.notify('Categoría Eliminada con exito', 'success', 5, function () {
                console.log('Categoría Eliminada con exito');
            });
        });
}
