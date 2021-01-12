$(document).ready(function(){
    $('#btn-agregar').click(function(){
      document.getElementById('mensaje').innerHTML='';
      document.getElementById('patente').innerHTML='';
      document.getElementById('color').innerHTML='';
      document.getElementById('auto_modelo').innerHTML='';
      document.getElementById('auto_marca').innerHTML='';
      document.getElementById('alias').innerHTML='';
     var datos= $('#formulario_agregar_auto').serialize();
    
     showLoading();
      $.ajax({
        type:"POST",
        url:"componentes/registrar_auto.php",
        data:datos,
        success:function(data){
          $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
          hideLoading();
          $("#tabla_vehiculos").load(" #tabla_vehiculos");
          // if (response=1)
          // {
          //  
          //   M.toast({html: '¡Auto Agregado!', classes: 'rounded'});
          // }
          // else 
          // {
          //   hideLoading();
          //   M.toast({html: '¡Intente Nuevamente!', classes: 'rounded'});
          // }
        }
      });
      return false;
    });
  });