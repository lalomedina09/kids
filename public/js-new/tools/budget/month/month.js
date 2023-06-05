
function activeBudgetSectionMonth() {

    let token = $('#token').val();
    let section = 'entrances';

    activeBudgetSectionCreateCategories();
    $("#btn-section-month-top").addClass("btn-line-buttom");

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
                responseDataHeaderMonth(data);
                responseDataSectionMonth(data);
                responseDataSectionMonthBtns(data);
                $("#btn-section-year-top").removeClass("btn-line-buttom");
            },
            error: function () {
                //console.log("Ajax no tuvo exito en el BackEnd")
            }
        });

}

function activeBudgetSectionMonthMenu(section) {
    let token = $('#token').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();
        $.ajax({
            url: "/budget/active/month/section",
            beforeSend: function () {
                $('#budgetSectionMonthBtnsLoading').css("display", "contents");
            },
            complete: function () {
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
                responseDataHeaderMonth(data);
                responseDataSectionMonthBtns(data);
                responseDataSectionMonthContent(data, section);
            },
            error: function () {
                //console.log("Ajax Error!! Sección: " + section)
            }
        });

}

/*--- Funcion que se activa cada que se cambia el mes o el año son inputs tipo select*/
function changeDateMonthSection(section) {
    let url = '/budget/active/month/section/filter-month';
    let token = $('#token').val();
    let budget_month = $('#budget_month_id').val();
    let budget_year = $('#budget_year_id').val();

    $('#budgetSectionMonthBtnsLoading').css("display", "contents");

    $.post(url, {
        _token: token,
        section: section,
        month: budget_month,
        year: budget_year
    },
        function (data) {
            responseDataSectionMonthBtns(data);
            $("#header-level-month").empty();
            $("#header-level-month").html(data.resumenMonth);
            responseDataSectionMonthContent(data, section);
            $('#budgetSectionMonthBtnsLoading').css("display", "none");
        });
}



