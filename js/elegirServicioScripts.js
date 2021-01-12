$('#asiento_2').on('change', function(e){
  var checkbox = $('[name="tapiz[]"]:checked').length

    if (checkbox >= 1 ) {
       /* Si esta checkeado */
       $('#btn-limpieza').addClass('border');

    } else {
       /* si no esta chekeado */
       $('#btn-limpieza').removeClass('border');
    }
});
$('#asiento_2f').on('change', function(e){
  var checkbox = $('[name="tapiz[]"]:checked').length

    if (checkbox >= 1) {
       /* Si esta checkeado */
       $('#btn-limpieza').addClass('border');

    } else {
       /* si no esta chekeado */
       $('#btn-limpieza').removeClass('border');
    }
});
$('#asiento_3').on('change', function(e){
  var checkbox = $('[name="tapiz[]"]:checked').length

    if (checkbox >= 1) {
       /* Si esta checkeado */
       $('#btn-limpieza').addClass('border');

    } else {
       /* si no esta chekeado */
       $('#btn-limpieza').removeClass('border');
    }
});


/* Script , hace que se pueda elegir un tipo de lavado (FULL o EXPRESS) */


$(document).ready(function() {

var checkedValue = null; 
var inputElements = document.getElementsByClassName('chk');
for(var i=0; inputElements[i]; ++i){
      if(inputElements[0].checked){
        inputElements[1].setAttribute('disabled', 'disabled');
        
      }
      else 
      {
        inputElements[1].removeAttribute('disabled', 'disabled');
      }


} 

for(var i=0; inputElements[i]; ++i){
      if(inputElements[1].checked){
        inputElements[0].setAttribute('disabled', 'disabled');
        
      }else 
      {
        inputElements[0].removeAttribute('disabled', 'disabled');
        
      }

}
  $('input[type="checkbox"]').on('change', function(e){
   
    var checkedValue = null; 
var inputElements = document.getElementsByClassName('chk');
for(var i=0; inputElements[i]; ++i){
      if(inputElements[0].checked){
        inputElements[1].setAttribute('disabled', 'disabled');
        
      }
      else 
      {
        inputElements[1].removeAttribute('disabled', 'disabled');
      }

}


for(var i=0; inputElements[i]; ++i){
      if(inputElements[1].checked){
        inputElements[0].setAttribute('disabled', 'disabled');
        
      }else 
      {
        inputElements[0].removeAttribute('disabled', 'disabled');
        
      }

}

    if ($(":checkbox:checked").length >= 1 ) {


       /* Si esta checkeado */
       $('#btn-aceptar').removeClass('disabled');

    } else {
       /* si no esta chekeado */
       $('#btn-aceptar').addClass('disabled');
    }
})
}); 



/*- ------------------------------------------------*/


    if ($(":checkbox:checked").length >= 1 ) {
       /* Si esta checkeado */
      //  $('#btn-aceptar').removeClass('disabled');
       console.log("Algo check");
       $('#btn-aceptar').removeClass('disabled');
    } else {
       /* si no esta chekeado */
      //  $('#btn-aceptar').addClass('disabled');
 
    }


/* -------------------------------------------------*/


    var asiento_2=$("#asiento_2:checked").length;
    var asiento_2t=$("#asiento_2f:checked").length;
    var asiento_3=$("#asiento_3:checked").length;

    if(asiento_2 || asiento_2t || asiento_3 ==1)
    {
      $('#btn-limpieza').addClass('border');
    } else 
    {

    }



/* -------------------------------------------------- */

    $(document).ready(function() {
      $('select').formSelect();
      $('.modal').modal();
     
    });
