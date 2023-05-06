function responseDataHeaderMonth(data) {
    console.log("Cargamos Div mensual con encabezados");
    $("#budget-section-month-header").empty();
    $("#budget-section-month-header").html(data.section_header_month);
}

function responseDataSectionMonth(data) {
    console.log("Cargamos Div mensual con las entradas");
    $("#budget-section-month").empty();
    $("#budget-section-month").html(data.section_month);
}
