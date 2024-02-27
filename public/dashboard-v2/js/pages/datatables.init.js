"use strict";
$(document).ready(function() {
    // Configuración para la primera tabla
    $("#datatable").DataTable();
    var a = $("#datatable-buttons").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", {
            extend: 'pdfHtml5',
            orientation: 'landscape', // Configuración para la orientación horizontal del PDF
            customize: function(doc) {
                // Estilos para el PDF
                var fontSize = 10;
                var styles = {
                    tableHeader: {
                        fontSize: fontSize + 2,
                        bold: true,
                        fillColor: '#f3f3f3'
                    },
                    tableBody: {
                        fontSize: fontSize
                    }
                };

                // Aplicar estilos a las filas de la tabla
                doc.content[1].table.body.forEach(function(row, index) {
                    if (index === 0) {
                        // Estilos para el encabezado de la tabla
                        row.forEach(function(cell, cellIndex) {
                            cell.styles = styles.tableHeader;
                        });
                    } else {
                        // Estilos para el cuerpo de la tabla
                        row.forEach(function(cell, cellIndex) {
                            cell.styles = styles.tableBody;
                        });
                    }
                });
            }
        }]
    });

    // Moviendo los botones de la primera tabla al contenedor adecuado
    a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

    // Añadiendo clases a los elementos de la primera tabla
    $("#datatable_length select[name*='datatable_length']").addClass("form-select form-select-sm");
    $("#datatable_length select[name*='datatable_length']").removeClass("custom-select custom-select-sm");
    $(".dataTables_length label").addClass("form-label");

    /***********************************************************************************************************************/
    // Configuración para la segunda tabla
    var b = $("#second-datatable").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", {
            extend: 'pdfHtml5',
            orientation: 'landscape', // Configuración para la orientación horizontal del PDF
            customize: function(doc) {
                // Estilos para el PDF
                var fontSize = 10;
                var styles = {
                    tableHeader: {
                        fontSize: fontSize + 2,
                        bold: true,
                        fillColor: '#f3f3f3'
                    },
                    tableBody: {
                        fontSize: fontSize
                    }
                };

                // Aplicar estilos a las filas de la tabla
                doc.content[1].table.body.forEach(function(row, index) {
                    if (index === 0) {
                        // Estilos para el encabezado de la tabla
                        row.forEach(function(cell, cellIndex) {
                            cell.styles = styles.tableHeader;
                        });
                    } else {
                        // Estilos para el cuerpo de la tabla
                        row.forEach(function(cell, cellIndex) {
                            cell.styles = styles.tableBody;
                        });
                    }
                });
            }
        }]
    });

    // Moviendo los botones de la segunda tabla al contenedor adecuado
    b.buttons().container().appendTo("#second-datatable_wrapper .col-md-6:eq(0)");

    // Añadiendo clases a los elementos de la segunda tabla
    $("#second-datatable_length select[name*='second-datatable_length']").addClass("form-select form-select-sm");
    $("#second-datatable_length select[name*='second-datatable_length']").removeClass("custom-select custom-select-sm");
    $(".dataTables_length label").addClass("form-label");

    /***********************************************************************************************************************/
    // Configuración para la tercera tabla
    var c = $("#third-datatable").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", {
            extend: 'pdfHtml5',
            orientation: 'landscape', // Configuración para la orientación horizontal del PDF
            customize: function(doc) {
                // Estilos para el PDF
                var fontSize = 10;
                var styles = {
                    tableHeader: {
                        fontSize: fontSize + 2,
                        bold: true,
                        fillColor: '#f3f3f3'
                    },
                    tableBody: {
                        fontSize: fontSize
                    }
                };

                // Aplicar estilos a las filas de la tabla
                doc.content[1].table.body.forEach(function(row, index) {
                    if (index === 0) {
                        // Estilos para el encabezado de la tabla
                        row.forEach(function(cell, cellIndex) {
                            cell.styles = styles.tableHeader;
                        });
                    } else {
                        // Estilos para el cuerpo de la tabla
                        row.forEach(function(cell, cellIndex) {
                            cell.styles = styles.tableBody;
                        });
                    }
                });
            }
        }]
    });

    // Moviendo los botones de la tercera tabla al contenedor adecuado
    c.buttons().container().appendTo("#third-datatable_wrapper .col-md-6:eq(0)");

    // Añadiendo clases a los elementos de la tercera tabla
    $("#third-datatable_length select[name*='third-datatable_length']").addClass("form-select form-select-sm");
    $("#third-datatable_length select[name*='third-datatable_length']").removeClass("custom-select custom-select-sm");
    $(".dataTables_length label").addClass("form-label");

    /***********************************************************************************************************************/
});
