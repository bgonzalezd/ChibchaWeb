var idioma = {
  sProcessing: "Procesando...",
  sLengthMenu: "Mostrar _MENU_ registros",
  sZeroRecords: "No se encontraron resultados",
  sEmptyTable: "Ningún dato disponible en esta tabla",
  sInfo:
    "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
  sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
  sInfoPostFix: "",
  sSearch: "Buscar:",
  sUrl: "",
  sInfoThousands: ",",
  sLoadingRecords: "Cargando...",
  oPaginate: {
    sFirst: "Primero",
    sLast: "Último",
    sNext: "Siguiente",
    sPrevious: "Anterior"
  },
  oAria: {
    sSortAscending: ": Activar para ordenar la columna de manera ascendente",
    sSortDescending: ": Activar para ordenar la columna de manera descendente"
  },
  buttons: {
    copyTitle: "Informacion copiada",
    copyKeys: "Use your keyboard or menu to select the copy command",
    copySuccess: {
      _: "%d filas copiadas al portapapeles",
      "1": "1 fila copiada al portapapeles"
    },

    pageLength: {
      _: "Mostrar %d filas",
      "-1": "Mostrar Todo"
    }
  }
};

$(document).ready(function() {
  var table = $("#lista").DataTable({
   paging: true,
    lengthChange: true,
    searching: true,
    autoWidth: true,
    scrollCollapse: true,
    fixedColumns:   {
            heightMatch: 'none'
        },
    language: idioma,
    lengthMenu: [[6, 10, 50, -1], [6, 10, 50, "Mostrar Todo"]],
    dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',

    buttons: {
      dom: {
        container: {
          tag: "div",
          className: "flexcontent"
        },
        buttonLiner: {
          tag: null
        }
      },

      buttons: [
        {
          extend: "copyHtml5",
          text: '<i class="fa fa-clipboard"></i>Copiar',
          title: $('#lista').attr('data-titulo'),
          titleAttr: "Copiar",
          className: "btn btn-app export barras",
          exportOptions: {
            columns: [0, 1, 2, 3]
          }
        },

        {
          extend: "pdfHtml5",
          text: '<i class="fa fa-file-pdf-o"></i>PDF',
          title: $('#lista').attr('data-titulo'),
          titleAttr: "PDF",
          className: "btn btn-app export pdf",
          exportOptions: {
            columns: [0, 1, 2, 3]
          },
          customize: function(doc) {
            doc.styles.title = {
              color: "#4c8aa0",
              fontSize: "30",
              alignment: "center"
            };
            (doc.styles["td:nth-child(2)"] = {
              width: "100px",
              "max-width": "100px"
            }),
              (doc.styles.tableHeader = {
                fillColor: "#4c8aa0",
                color: "white",
                alignment: "center"
              }),
              (doc.content[1].margin = [100, 0, 100, 0]);
          }
        },

        {
          extend: "excelHtml5",
          text: '<i class="fa fa-file-excel-o"></i>Excel',
          title: $('#lista').attr('data-titulo'),
          titleAttr: "Excel",
          className: "btn btn-app export excel",
          exportOptions: {
            columns: [0, 1, 2, 3]
          }
        },
        {
          extend: "csvHtml5",
          text: '<i class="fa fa-file-text-o"></i>CSV',
          title: $('#lista').attr('data-titulo'),
          titleAttr: "CSV",
          className: "btn btn-app export csv",
          exportOptions: {
            columns: [0, 1, 2, 3]
          }
        },
        {
          extend: "print",
          text: '<i class="fa fa-print"></i>Imprimir',
          title: $('#lista').attr('data-titulo'),
          titleAttr: "Imprimir",
          className: "btn btn-app export imprimir",
          exportOptions: {
            columns: [0, 1, 2, 3]
          }
        },
        {
          extend: "pageLength",
          titleAttr: "Registros a mostrar",
          className: "selectTable"
        }
      ]
    }
  });
});