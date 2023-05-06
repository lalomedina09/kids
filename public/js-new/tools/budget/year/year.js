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
