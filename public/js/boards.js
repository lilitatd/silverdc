
$(document).ready(function() {
    $('#planeaciones,#planeacion_lbrs,#pendientes_aprb,#ver_lbrs').DataTable({
        "scrollX": true,
        "scrollCollapse": true,
    "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "TODOS"]],
    "language": {
                        "info":           "Mostrando _START_ a _END_ de _TOTAL_ filas",
                        "infoEmpty":      "0 Filas",
                        "sZeroRecords":    "No se encontraron resultados",
                        "lengthMenu": "Mostrar _MENU_",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "info": "Página _PAGE_ de _PAGES_",
                        "search": "Buscar",
                        "paginate": {
                                      "previous": "<span class='fa fa-chevron-left justify-content-center d-flex' style='height: 20px;'></span>",
                                      "next": "<span class='fa fa-chevron-right justify-content-center d-flex' style='height: 20px;'></span>"
                                    }
                    }
    });


});

