/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */
$(document).ready(function () {

    /**
     * Load the datatables plug-in for jQuery.
     * @option {Number}  iDisplayLength  Number of rows to display on a single page.
     * @link https://datatables.net/reference/option
     */
    $('table[data-order]').DataTable({
        language: {
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No se encontraron registros coincidentes",
            info: "Mostrando _PAGE_ de _PAGES_",
            infoEmpty: "No hay registros disponibles",
            infoFiltered: "(filtrado de _MAX_ registros)",
            paginate: {
                "first": "Inicio",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            search: "Buscar:",
        },
        iDisplayLength: 25
    });

});
