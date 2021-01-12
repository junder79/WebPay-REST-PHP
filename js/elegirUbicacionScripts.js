    function validar() {
      $(document).ready(function() {

        var observacion=document.getElementById("observacion").value;  
        console.log(observacion);
        if (document.getElementById('find').value.length > 0 ) {
        
          // document.getElementById('btn-ingresar').click();
          $('#btn-ingresar').removeClass('disabled');
          // $('#btn-siguiente').removeClass('disabled');
        } else {
          $('#btn-ingresar').addClass('disabled');
          $('#btn-siguiente').addClass('disabled');
        }


       
      });
 
    }
        $(document).ready(function(){
    $('#btn-siguiente').click(function(){
     

     var datos= $('#formulario-ubicacion').serialize();
  
      $.ajax({
        type:"POST",
        url:"validaciones/validarUbicacion.php",
        data:datos,
        success:function(data){
          $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
        }
      });
      return false;
    });
  });