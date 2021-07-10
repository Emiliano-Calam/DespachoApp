$(function () 
{
  $('[data-toggle="tooltip"]').tooltip()
})
$(document).ready(function() {
   $('.content1').richText({imageUpload: false,
fileUpload: false,
videoEmbed: false,
id:'direccion_txt',
urls: false});
$('.content2').richText({imageUpload: false,
fileUpload: false,
videoEmbed: false,
urls: false});
   $('.content3').richText({imageUpload: false,
fileUpload: false,
videoEmbed: false,
urls: false});
});
$( ".cliente" ).click(function() {
   // alert($(this).data('tipo'));
   loadtable($(this).data('tipo'));
  $('#exampleModal').modal('show')
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
       
     // responsive: true
    });
   // $(".loader").addClass('hide');
 
    $('#datatable-clientes tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
    //    alert( 'You clicked on '+data.cliente+'\'s row' );
        $("#Clave_cliente").val(data.cliente);
        $("#auxiliar").val(data.auxiliar);
        $("#confirm_cliente").val(data.nombre);
        //$("#direccion").text(data.direccion);
        $("#direccion").val(data.direccion).trigger('change')
        //$('#direccion_txt').html(data.direccion);
    } );
    
}



$(document).ready(function() {
    if($("#exampleCheck1").is(':checked'))
	{  
		$('#activafecha').removeClass("hide");
        $('#Concluir').removeAttr("disabled");
	}
    var table=   $('#datatable-clientes').DataTable();

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

      $('#validate_form').parsley();

} );

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

$( "#number" ).change(function() {
    $('.cliente').removeAttr("disabled");
    if($("#number").val() == 'OTROS')
    {
        $('#cliente').removeAttr("disabled");
        $('.cliente').prop("disabled",true);
    }
});

var id = 0;
$('#validate_form').on('submit', function(event){
    $('#Clave_cliente').removeAttr("disabled");
    $('#confirm_cliente').removeAttr("disabled");
    event.preventDefault();
  
    if($('#validate_form').parsley().isValid())
    {
       
        $(".loader").removeClass('hide');
        $.ajax({
            url: '/movimientos/diligencia/save',
            method:"POST",
            data:$(this).serialize(),
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
                    swalWithBootstrapButtons.fire({
                        title: "Exito",
                        icon: 'success',
                         text: "Diligencia gurdada de manera exitosa",
                         type: "success",
                         showDenyButton: true,
                         confirmButtonText: 'Crear Nueva',
                         denyButtonText: 'Aceptar',
                         allowOutsideClick: false,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/movimientos/diligencia/nuevo";
                        } else if (result.isDenied) {
                            if(id > 0)
                            {
                                window.location.href = "/movimientos/diligencia/edit/"+id;
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
});
/*
$(".btn-danger").on( "click",function(){


});*/