function activeBudgetSectionYear() {

    let token = $('#token').val();
    let header_year = "_header_year_calendar";
    //console.log('Ajax presupuesto Seccion Anual');
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
            header_year: header_year
        },
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function (data) {
            responseDataHeaderYear(data);
            responseDataSectionYear(data);
            /*alertify.notify('Sección Calendario ', 'success', 5, function () {
                console.log('Sección Calendario ');
            });*/
        },
        error: function () {
            //console.log("Ajax no tuvo exito en el BackEnd Ruta Anual")
        }
    });

}

/* - - -  Funcion que activa el cambio de año para la seccion de calendario- - -*/
function changeDateYearCalendar() {
    let url = '/budget/active/year/section/filter-year-calendar';
    let token = $('#token').val();
    let header_year = "_header_year_calendar";
    let budget_year = $('#budget_year').val();
    $('#budgetSectionYearLoading').css("display", "contents");
    $.post(url, {
        _token: token,
        year: budget_year,
            header_year:header_year
    },
        function (data) {
            responseDataHeaderYear(data);
            responseDataSectionYear(data);
            $('#budgetSectionYearLoading').css("display", "none");

            alertify.notify('Calendario ' + budget_year, 'success', 5, function () {
                console.log('Calendario ' + budget_year);
            });
        });
}


//Funcion que acctiva l vista de reporte anual
function activeBudgetSectionYearReport() {

    let token = $('#token').val();
    let budget_year = $('#budget_year_report').val();
    let header_year = "_header_year_report";

    //console.log('Ajax presupuesto Seccion Anual');
    $.ajax({
        url: "/budget/active/year/report",
        beforeSend: function () {
            customBeforeLoading();
        },
        complete: function () {
            customCompleteLoading();
        },
        data: {
            _token: token,
            year: budget_year,
            header_year: header_year
        },
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function (data) {
            responseDataHeaderYearReport(data);
            responseDataSectionYearReport(data);
            /*alertify.success('Normal message');*/
            alertify.notify('Reporte de lo que entro en el ' + budget_year, 'success', 5, function () { console.log('Alerta Grafica Lo que entro'); });
        },
        error: function () {
            //console.log("Ajax no tuvo exito en el BackEnd Ruta Anual")
        }
    });

}

function changeDateYearReport() {
    let url = '/budget/active/year/section/filter-year-report';
    let token = $('#token').val();
    let header_year = "_header_year_report";
    let budget_year = $('#budget_year_report').val();
    $('#budgetSectionYearLoadingReport').css("display", "contents");
    $.post(url, {
            _token: token,
            year: budget_year,
            header_year:header_year
        },
        function (data) {
            responseDataHeaderYearReport(data);
            responseDataSectionYearReport(data);
            $('#budgetSectionYearLoadingReport').css("display", "none");

            alertify.notify('Reporte ' + budget_year, 'success', 5, function () {
                console.log('Reporte ' + budget_year);
            });
        });
}
