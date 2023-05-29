function responseDataHeaderMonth(data) {
    console.log("Cargamos Div mensual con encabezados");
    $("#budget-section-month-header").empty();
    $("#budget-section-month-header").html(data.section_header_month);
}
/*
function responseDataSectionMonth(data) {
    console.log("Cargamos Div mensual con las entradas");
    $("#budget-section-month").empty();
    $("#budget-section-month").html(data.section_month);
}
*/
function responseDataSectionMonthBtns(data) {
    console.log("Carga div con los Btns submenu");
    $("#budget-section-month-btns").empty();
    $("#budget-section-month-btns").html(data.section_month_btns);
}

function responseDataSectionMonthContent(data, section) {
    console.log("Seccion renderizada  " + section + " correctamente");
    $("#budget-section-month-content").empty();
    $("#budget-section-month-content").html(data.section_month_content);
}

