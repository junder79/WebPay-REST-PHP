$('label').click(function () {
	$('label').removeClass('checked');
    $(this).addClass('checked');
});

$('input:checked').parent().addClass('checked');
   $(document).ready(function() {
	$('select').formSelect();
    $("select[required]").css({ display: "inline",height: 0, padding: 0, width: 0});
    $('select').formSelect();
    $('.modal').modal();
});
$(document).ready(function () {
  $('#btn-seleccionar').click(function () {


    swal({
      title: "¿Deseas agregar Objetos de valor?",
      text: "",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
      .then((willDelete) => {
        if (willDelete) {
          var datos = $('#formulario-auto').serialize();
         
          $.ajax({
            type: "POST",
            url: "validaciones/validarAutosObjetosValor.php",
            data: datos,
            success: function (data) {
              $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
            }
          });
          return false;
        } else {
          var datos = $('#formulario-auto').serialize();
     
          $.ajax({
            type: "POST",
            url: "validaciones/validarAuto.php",
            data: datos,
            success: function (data) {
              $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
            }
          });
          return false;
        }
      });
  });

});