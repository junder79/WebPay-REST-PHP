
  $("#cbx_marca").change(function () {
    $("#cbx_marca option:selected").each(function () {
      id = $(this).val();
      $.post("getModelo.php", { id: id }, function(data){
        $("#cbx_modelo").html(data);
      });            
    });
  })