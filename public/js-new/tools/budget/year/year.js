function activeBudgetSectionYear() {

    let token = $('#token').val();
    console.log('Ajax presupuesto Seccion Anual');
    $.ajax({
        url: "/budget/active/year",
        beforeSend: function () {
            customBeforeLoading();
        },
        complete: function () {
            customCompleteLoading();
        },
        data: {
            _token: token,
            //param: param
        },
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function (data) {
            console.log("Ajax regreso con exito del BackEnd Ruta Anual");
            responseDataHeaderYear(data);
            responseDataSectionYear(data);
        },
        error: function () {
            console.log("Ajax no tuvo exito en el BackEnd Ruta Anual")
        }
    });

}

/* - - -  Funcion que activa el cambio de año para la seccion de calendario- - -*/
function changeDateYearCalendar() {
    let url = '/budget/active/year/section/filter-year';
    let token = $('#token').val();

    let budget_year = $('#budget_year').val();
    //pendiente activacion de ajax y agregar funcion al select de html
    $.post(url, {
        _token: token,
        //section: section,
        //budget_month: budget_month,
        year: budget_year
    },
        function (data) {
            console.log("Ajax Anual!! Se aplica el filtro por año : " + budget_year);

            //responseDataHeaderMonth(data);
            responseDataHeaderYear(data);
            responseDataSectionYear(data);
            /*
            responseDataSectionMonthBtns(data);
            $("#header-level-month").empty();
            $("#header-level-month").html(data.resumenMonth);
            responseDataSectionMonthContent(data, section);
            */
        });
}
