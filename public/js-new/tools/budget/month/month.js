
function activeBudgetSectionMonth() {

    let token = $('#token').val();
    let section = 'entrances';
    console.log('Inicia activacion de ajax Presupuesto activado');
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
    //alert('linea 39 archivos de meses');
    let token = $('#token').val();
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
                section: section
            },
            type: "POST",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            success: function (data) {
                console.log("Ajax Correcto!! Se cargo Sección: " + section);

                //responseDataHeaderMonth(data);
                responseDataSectionMonthBtns(data);
                responseDataSectionMonthContent(data, section);
            },
            error: function () {
                console.log("Ajax Error!! Sección: " + section)
            }
        });

}
