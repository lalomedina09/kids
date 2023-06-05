function activeBudgetSectionYear() {

    let token = $('#token').val();
    $("#btn-section-year-top").addClass("btn-line-buttom");
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
            //param: param
        },
        type: "POST",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function (data) {
            responseDataHeaderYear(data);
            responseDataSectionYear(data);
            $("#btn-section-month-top").removeClass("btn-line-buttom");
        },
        error: function () {
            //console.log("Ajax no tuvo exito en el BackEnd Ruta Anual")
        }
    });

}

/* - - -  Funcion que activa el cambio de año para la seccion de calendario- - -*/
function changeDateYearCalendar() {
    let url = '/budget/active/year/section/filter-year';
    let token = $('#token').val();

    let budget_year = $('#budget_year').val();
    $('#budgetSectionYearLoading').css("display", "contents");
    $.post(url, {
        _token: token,
        year: budget_year
    },
        function (data) {
            responseDataHeaderYear(data);
            responseDataSectionYear(data);
            $('#budgetSectionYearLoading').css("display", "none");
        });
}
