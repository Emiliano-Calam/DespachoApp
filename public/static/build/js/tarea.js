$(document).ready(function() {

    var table=   $('#datatable-clientes').DataTable();

    if($("#exampleCheck1").is(':checked'))
	{  
		$('#activafecha').removeClass("hide");
        $('#Concluir').removeAttr("disabled");
	}

    $('.content1').richText({imageUpload: false,
        fileUpload: false,
        videoEmbed: false,
        id:'direccion_txt',
        urls: false});
    
    $('.content2').richText({imageUpload: false,
        fileUpload: false,
        videoEmbed: false,
        urls: false});
    
        $('#fatencion').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD/MM/YYYY'
              },
            singleClasses: "picker_2"
          }, function(start, end, label) {
            
            console.log(start.toISOString(), end.toISOString(), label);
          });

$('#fecha').daterangepicker({
    singleDatePicker: true,
    locale: {
        format: 'DD/MM/YYYY'
      },
    singleClasses: "picker_2"
  }, function(start, end, label) {
    
  });

} );

$( ".cliente" ).click(function() {
    // alert($(this).data('tipo'));
    loadtable($(this).data('tipo'));
   $('#exampleModal').modal('show');
   var paren= $("#datatable-clientes_length").parent('.col-sm-6').addClass('col-sm-5');
   paren1 = $("#datatable-clientes_filter").parent('.col-sm-6').addClass('col-sm-5');
   $("#datatable-clientes_length").parent('col-sm-5').removeClass('.col-sm-6');
   $("#datatable-clientes_filter").parent('col-sm-5').removeClass('.col-sm-6');
 });
 function loadtable(action)
 {
     if($('#datatable-clientes').length)
     {
     $('#datatable-clientes').DataTable().destroy();
     }
     $("#optcliente").val(action);
     console.log(action);
    // NProgress.start() 
     table =$("#datatable-clientes").DataTable({
         processing: true,
         serverSide: true,
         ajax:
         {
             url:"/movimientos/buscarclientesdil",
             data:{Tipo:action }
         },
         columns:[
             {data: 'cliente', name : 'cliente'},
             {data: 'nombre', name :'nombre'},
           
         ],
         language: {
             "decimal": "",
             "emptyTable": "No hay información",
             "info": " _START_ a _END_ de _TOTAL_ ",
             "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
             "infoFiltered": "(Filtrado de _MAX_ total entradas)",
             "infoPostFix": "",
             "thousands": ",",
             "lengthMenu": "Mostrar _MENU_",
             "loadingRecords": "Cargando...",
             "processing": "Procesando...",
             "search": "Buscar:",
             "zeroRecords": "Sin resultados ",
             "paginate": {
                 "first": "Primero",
                 "last": "Ultimo",
                 "next": "Siguiente",
                 "previous": "Anterior"
             }
         }, "order": [[1, "asc"]]  
     });
  
     $('#datatable-clientes tbody').on('click', 'tr', function () {
         var data = table.row( this ).data();
         $("#Clave_cliente").val(data.cliente);
         $("#auxiliar").val(data.auxiliar);
         $("#confirm_cliente").val(data.nombre);
        // $("#direccion").val(data.direccion).trigger('change')
     } );
     
 }
$("#Concluir").on("click",function(){
    Swal.fire({
        title: 'Horas reales de trabajo',
        input: 'text',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
          return fetch(`//api.github.com/users/${login}`)
            .then(response => {
              if (!response.ok) {
                throw new Error(response.statusText)
              }
              return response.json()
            })
            .catch(error => {
              Swal.showValidationMessage(
                `La hora es requerida: ${error}`
              )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: `${result.value.login}'s avatar`,
            imageUrl: result.value.avatar_url
          })
        }
      })
});
 $("#exampleCheck1").on( "click",function(){

    if($("#exampleCheck1").is(':checked'))
	{  
		$('#activafecha').removeClass("hide");
        $('#Concluir').removeAttr("disabled");
	}else
    {
        $('#activafecha').addClass("hide");
        $('#Concluir').prop("disabled",true);        
    }

});


var id = 0;
$('#send').on('click', function(event){
    $('#Clave_cliente').removeAttr("disabled");
    $('#confirm_cliente').removeAttr("disabled");
    //event.preventDefault();
  
    if($('#validate_form').parsley().isValid())
    {
       
        $(".loader").removeClass('hide');
        $.ajax({
            url: '/movimientos/tareas/save',
            method:"POST",
            data:$('#validate_form').serialize(),
            dataType:"json",
          /*  beforeSend:function()
            {
             $('#submit').attr('disabled', 'disabled');
             $('#submit').val('Submitting...');
            },*/
            success:function(data)
            {
                
                console.log(data);
             $(".loader").addClass('hide');
                if(data.exito > 0)
                {
                     id = data.id;
                     $("#idtarea").val(data.id);
                     document.createElement("idtarea").value=data.id;
                    swalWithBootstrapButtons.fire({
                        title: "Exito",
                        icon: 'success',
                         text: "Tarea gurdada de manera exitosa",
                         type: "success",
                         showDenyButton: true,
                         confirmButtonText: 'Crear Nueva',
                         denyButtonText: 'Aceptar',
                         allowOutsideClick: false,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/movimientos/tareas/nuevo";
                        } else if (result.isDenied) {
                           var _id =document.createElement("idtarea").value; 
                        if(_id > 0)
                        {
                        window.location.href = "/movimientos/tareas/edit/"+_id;
                        }

                        }
                      }); 
                            
                }else
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error interno ',
                        text: 'Ups algo salio mal en el momento de afectar la diligencia',
                      })
                }
             //   event.preventDefault();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              //  event.preventDefault();
              alert(xhr.status);
              alert(thrownError);
            }
           });
        /******************************** */
        $('#Clave_cliente').prop("disabled",true);
        $('#confirm_cliente').prop("disabled",true);
        
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              denyButton: 'btn btn-primary'
            },
            buttonsStyling: false
          })
         
    }
    return false;
});
$('#Cancelar').on('click', function(event){
  $('#NewTareasModal').modal('show');
  //alert('okok');
});

$( "#cmbmovimiento" ).change(function() {
    
    if($("#cmbmovimiento").val() == 'Tarea Contable')
    {
        $('#activamesfiscal').removeClass('hide');
        $('#activaniofiscal').removeClass('hide');
        $('#tmpanio').addClass('hide');
        $('#tmpmes').addClass('hide');

    }else
    {
        $('#activamesfiscal').addClass('hide');
        $('#activaniofiscal').addClass('hide');
        $('#tmpanio').removeClass('hide');
        $('#tmpmes').removeClass('hide');
    }

        $('#confirm_cliente').prop("disabled",true);
    if($("#cmbmovimiento").val() == 'Otros')
    {
        $('#confirm_cliente').removeAttr("disabled");
    }
});

$( "#cmbauxiliar" ).change(function() {
    $("#nombreAux").val('');
    if($("#cmbauxiliar").val() != '0')
    {
        $.get("/movimientos/tareas/user/"+$("#cmbauxiliar").val(), function(data, status){
            
            if(status)
            {
                var r =JSON.parse(data);
                console.log(r[0]);
                $("#nombreAux").val(r[0].nombre);
                
            }
            
          });
    
    }
});
