$(document).ready(function(){
    $('#btn-siguiente').click(function(){
     

     var datos= $('#formulario-fecha').serialize();
 
      $.ajax({
        type:"POST",
        url:"validaciones/validarFecha_test.php",
        data:datos,
        success:function(data){
          $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
        }
      });
      return false;
    });
  });