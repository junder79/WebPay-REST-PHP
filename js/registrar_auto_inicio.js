$(document).ready(function(){
    $('#btn-agregar').click(function(){
      document.getElementById('mensaje').innerHTML="";
      document.getElementById('patente').innerHTML="";
      document.getElementById('color').innerHTML="";
      document.getElementById('auto_modelo').innerHTML="";
      document.getElementById('alias').innerHTML="";
     var datos= $('#formulario_agregar_auto').serialize();
    
     showLoading();
      $.ajax({
        type:"POST",
        url:"componentes/registrar_auto_inicio.php",
        data:datos,
        success:function(data){
          $("#mensaje").html(data); 
          hideLoading();
        }
      });
      return false;
    });
  });