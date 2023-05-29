
function activeBudgetSectionMonth() {

    let token = $('#token').val();
    let section = 'entrances';
    console.log('Inicia activacion de ajax Presupuesto activado');

    activeBudgetSectionCreateCategories();
    console.log('Paso la función de busqueda creacion de categorias');
        $.ajax({
            url: "/budget/active/month",
            beforeSend: function () {
                customBeforeLoading();
            },
            complete: function () {
                customCompleteLoading();
            },
            data: {
                _token: token,
                section: section
            },
            type: "POST",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            success: function (data) {
                console.log("Ajax Activo la Vista mensual");

                responseDataHeaderMonth(data);
                responseDataSectionMonth(data);
                responseDataSectionMonthBtns(data);
                //responseDataSectionMonthContent(data, section);
            },
            error: function () {
                console.log("Ajax no tuvo exito en el BackEnd")
            }
        });

}

function activeBudgetSectionMonthMenu(section) {
    let token = $('#token').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();
    console.log('Ajax Activado Sección: -> ' + section);
        $.ajax({
            url: "/budget/active/month/section",
            beforeSend: function () {
                //customBeforeLoading();
                $('#budgetSectionMonthBtnsLoading').css("display", "contents");
            },
            complete: function () {
                //customCompleteLoading();
                $('#budgetSectionMonthBtnsLoading').css("display", "none");
            },
            data: {
                _token: token,
                section: section,
                month: budget_month,
                year: budget_year
            },
            type: "POST",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            success: function (data) {
                console.log("Ajax Correcto!! Se cargo Sección: " + section);

                //responseDataHeaderMonth(data);
                responseDataHeaderMonth(data);
                /*
                $("#header-level-month").empty();
                $("#header-level-month").html(data.resumenMonth);
                */
                responseDataSectionMonthBtns(data);
                responseDataSectionMonthContent(data, section);
            },
            error: function () {
                console.log("Ajax Error!! Sección: " + section)
            }
        });

}

/*--- Funcion que se activa cada que se cambia el mes o el año son inputs tipo select*/
function changeDateMonthSection(section) {
    let url = '/budget/active/month/section/filter-month';
    let token = $('#token').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();

    $.post(url, {
        _token: token,
        section: section,
        month: budget_month,
        year: budget_year
    },
        function (data) {
            console.log("Ajax Correcto!! Se cargo Sección con el filtro de fecha : " + section);

            //responseDataHeaderMonth(data);
            responseDataSectionMonthBtns(data);
            $("#header-level-month").empty();
            $("#header-level-month").html(data.resumenMonth);
            responseDataSectionMonthContent(data, section);
        });
}



