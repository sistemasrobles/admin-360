

$(document).ready(function() {
  

  let  project = $("#project-select option:selected").val();


  set_table_lotes(project);

   $('.js-example-basic-single').select2();

});





 $('#project-select').on('change',function(){

    let value = $(this).val();

    let selectedOption = $('#project-select option[value="' + value + '"]');

    let dataWeb = selectedOption.attr('data-web');

    
    let label = $("#project-select option:selected").text();

    set_table_lotes(value);

    
    $("#btn-mapa-web").attr('href',dataWeb);

    $("#project-text").text(label);

 });


function set_table_lotes(project) {
    

   let lbl =  $("#project-select option:selected").text();


    $("#project-text").text(lbl);

    destroy_data_table('table-360');

    $("#buscador").val('');

    var dataTable = $('#table-360').DataTable({
        ajax: {
            url: 'management/FuncGral.php',
            type: 'GET',
            data: {

                type:'list_items',
                param1: project,
                param2:'',
                param3:''
            },
            dataSrc: '',
            beforeSend: function() {

                loadingUI('buscando');
            },
            error: function(jqXHR, textStatus, errorThrown) {

                ajaxError(jqXHR, textStatus, errorThrown);
                
                $.unblockUI();
            }
        },
        "ordering": false,
         initComplete: function () {
          $.unblockUI();
            this.api()
                .columns()
                .every(function (index) {


                   


                  if (index === 6 || index === 0 ) {

                    return;

                    
                    
                  }


                    var column = this;
                    var select = $('<select class="form-control"><option value="">--</option></select>')
                        .appendTo($(column.header()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                              
                              

                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
 
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {


                          select.append('<option value="' + d + '">' + d + '</option>');

                            
                            
                        });
                   
                    $(column.footer()).empty();
                   
                });
        },
        language: {
            "decimal": "",
            "emptyTable": "No hay informaci¨®n",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
            "infoEmpty": "Mostrando 0 to 0 of 0 filas",
            "infoFiltered": "(Filtrado de _MAX_ total filas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ filas",
            "loadingRecords": "Cargando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "order": [
            [2, "asc"]
        ],

        columns: [{
            data: 'project'
        },{
            data: 'etapa'
        }, {
            data: 'mz'
        }, {
            data: 'lote'
        },{
            data: 'area'
        },{
           data: 'state'
        },{
            data: null,
            "render": function(data, type, full, meta) {

                  let id = data.id;

                  let project = data.project;
                  let mz = data.mz;
                  let lote = data.lote;
                  let area = data.area;
                  let state = data.state;

                  let msj = "Esta seguro de cambiar el estado del "+lote +" , "+ mz +" ?";


                   let label ='<a class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="set_msg_lote(\''+msj+'\',\''+id+'\',\''+state+'\')"><i class="fas fa-edit"></i></a>';
                 

                  


                return '<div class="btn-group "> ' + label + '</div>';

            }
        }],

        

        rowCallback: function(row, data) {

            if (data.state == 'DISPONIBLE') {

                $($(row).find("td")[5]).html('<span class="badge badge-success"><i class="fas fa-check mr-2"></i>Disponible</span>');

            } else if (data.state == 'VENDIDO') {

                $($(row).find("td")[5]).html('<span class="badge badge-danger"><i class="fas fa-times mr-2"></i>Vendido</span>');
            }
        },
        "drawCallback": function(settings) {

            $('[data-toggle="tooltip"]').tooltip();


        }

    });

    $("#buscador").keyup(function() {
        dataTable.search(this.value).draw();

    });


}

function set_msg_lote(msj,id,state){


  $("#logoutModal").modal('show');

  $("#msj-lote").text(msj);

  $("#id-lote").val(id);



$('#select-modal-state').val(state);






  
  
}





 $('#confirmar-update').on('click',function(){

  $.ajax({
        url: 'management/FuncGral.php',
        type: "get",
        dataType: 'json',
        data: {
          
              type:'updated_item',
              param1: $('#select-modal-state').val(),
              param2:$("#id-lote").val(),
              param3: $("#project-select option:selected").val()
          

        },
        beforeSend: function() {

            
        },
        success: function(response) {

          let success ='';

            if (response.status == "ok") {

                $('#table-360').DataTable().ajax.reload();
               
              

                success = 'success';


                $("#logoutModal").modal('hide');



            } else {

                success = 'warning';
              

            }




                Swal.fire({
                  position: 'center',
                  icon: success,
                  title: response.description,
                  showConfirmButton: false,
                  timer: 1500
                })


            $.unblockUI();

        },
        error: function(jqXHR, textStatus, errorThrown) {

            ajaxError(jqXHR, textStatus, errorThrown);


            $.unblockUI();
        },

    });

 });
