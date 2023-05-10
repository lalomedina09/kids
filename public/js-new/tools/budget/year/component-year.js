function responseDataHeaderYear(data) {
    console.log("Cargamos Div anual con encabezados anuales");
    $("#budget-section-year-header").empty();
    $("#budget-section-year-header").html(data.section_header_year);
}

function responseDataSectionYear(data) {
    console.log("Cargamos Div anual con tarjetas de calendario");
    $("#budget-section-year").empty();
    $("#budget-section-year").html(data.section_year);
}

