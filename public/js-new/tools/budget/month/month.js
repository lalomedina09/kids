
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
