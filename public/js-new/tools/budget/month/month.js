
function activeBudgetSectionMonth() {

    let token = $('#token').val();
    console.log('Inicia activacion de ajax Presupuesto activado'); +
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
                //param: param
            },
            type: "POST",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            success: function (data) {
                console.log("Ajax regreso con exito del BackEnd");

                responseDataHeaderMonth(data);
                responseDataSectionMonth(data);
            },
            error: function () {
                console.log("Ajax no tuvo exito en el BackEnd")
            }
        });

}

function activeBudgetSectionMonthMenu(section) {

    let token = $('#token').val();
    console.log('Activacion de ajax Mensual -> ' + section);
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
                section: section
            },
            type: "POST",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            success: function (data) {
                console.log("Ajax regreso con exito del BackEnd para cargar seccion elegida");

                responseDataSectionMonthBtns(data);
                responseDataSectionMonthContent(data);
            },
            error: function () {
                console.log("Ajax no tuvo exito en el BackEnd para llenar opcion elegida " + section)
            }
        });

}
/*
()

activeExistsBudgetSectionMonth()

activeMovementsBudgetSectionMonth()

*/
