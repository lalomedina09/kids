function responseDataHeaderYear(data) {
    $("#budget-section-year-header").empty();
    $("#budget-section-year-header").html(data.section_header_year);
}

function responseDataSectionYear(data) {
    $("#budget-section-year").empty();
    $("#budget-section-year").html(data.section_year);
}

//Funciones para el area de reporte
function responseDataHeaderYearReport(data) {
    $("#budget-section-year-header-report").empty();
    $("#budget-section-year-header-report").html(data.section_header_year);
}

function responseDataSectionYearReport(data) {
    $("#budget-section-year-report").empty();
    $("#budget-section-year-report").html(data.section_year);
}

