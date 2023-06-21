function responseDataHeaderMonth(data) {

    $("#budget-section-month-header").empty();
    $("#budget-section-month-header").html(data.section_header_month);
}

function responseDataSectionMonthBtns(data) {
    $("#budget-section-month-btns").empty();
    $("#budget-section-month-btns").html(data.section_month_btns);
}

function responseDataSectionMonthContent(data, section) {
    $("#budget-section-month-content").empty();
    $("#budget-section-month-content").html(data.section_month_content);
}

function ocultarDivBudgetCategory(idDivCategory)
{
    $('#' + idDivCategory).toggle(500);
}
