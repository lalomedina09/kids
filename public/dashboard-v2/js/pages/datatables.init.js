"use strict";
$(document).ready(function() {
    // Configuración para la primera tabla
    $("#datatable").DataTable();
    var a = $("#datatable-buttons").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", "pdf"]
    });
    $("#key-table").DataTable({
        keys: !0
    }), $("#responsive-datatable").DataTable(), $("#selection-datatable").DataTable({
        select: {
            style: "multi"
        }
    }), 
    // Moviendo los botones de la primera tabla al contenedor adecuado
    a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), 
    // Añadiendo clases a los elementos de la primera tabla
    $("#datatable_length select[name*='datatable_length']").addClass("form-select form-select-sm"),
    $("#datatable_length select[name*='datatable_length']").removeClass("custom-select custom-select-sm"),
    $(".dataTables_length label").addClass("form-label");

    /***********************************************************************************************************************/
    // Configuración para la segunda tabla
    var b = $("#second-datatable").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", "pdf"]
    });
    // Moviendo los botones de la segunda tabla al contenedor adecuado
    b.buttons().container().appendTo("#second-datatable_wrapper .col-md-6:eq(0)"), 
    // Añadiendo clases a los elementos de la segunda tabla
    $("#second-datatable_length select[name*='second-datatable_length']").addClass("form-select form-select-sm"),
    $("#second-datatable_length select[name*='second-datatable_length']").removeClass("custom-select custom-select-sm"),
    $(".dataTables_length label").addClass("form-label");

    /***********************************************************************************************************************/
    // Configuración para la segunda tabla
    var c = $("#third-datatable").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", "pdf"]
    });
    // Moviendo los botones de la segunda tabla al contenedor adecuado
    c.buttons().container().appendTo("#third-datatable_wrapper .col-md-6:eq(0)"), 
    // Añadiendo clases a los elementos de la segunda tabla
    $("#third-datatable_length select[name*='third-datatable_length']").addClass("form-select form-select-sm"),
    $("#third-datatable_length select[name*='third-datatable_length']").removeClass("custom-select custom-select-sm"),
    $(".dataTables_length label").addClass("form-label");

    /***********************************************************************************************************************/
});
