$(document).ready(function(){
    $('#btn-ingresar').click(function(){
      var datos=$('#formulario').serialize();
      $('#preloader').show();
       
      $.ajax({
        type:"GET",
        url:"mapa.php",
        data:datos,
        success:function(r){

          if(r==1){
          }else{

            $('#preloader').hide();
            var datos =JSON.parse(r);
            $("#latitud").text(datos.latitud);
            $("#logitud").text(datos.longitud);
            $("#direccion").text(datos.informacion);
            var latitud=$("#latitud").val(datos.latitud);
            var longitud=$("#longitud").val(datos.longitud);
            var informacion=$("#informacion").val(datos.informacion);
            var latitud_input=document.getElementById("latitud").value;
            var longitud_input=document.getElementById("longitud").value;
            var informacion_input=document.getElementById("informacion").value;
            var map;
            document.getElementById("direccion").value =informacion_input ;
            document.getElementById("latitud").value =latitud_input ;
            document.getElementById("longitud").value =longitud_input ;
            /* las coordenadas se las pasamos a una variable*/
            coords =  {
              lng: longitud_input,
              lat: latitud_input,
              title:informacion_input
            };
          crearMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
          function crearMapa (coords)
          { 
              
                //Se crea una nueva instancia del objeto mapa
                // map = mapa que se mostrará 
                var map = new google.maps.Map(document.getElementById('map'),
                {
                  zoom: 16,
                  center:new google.maps.LatLng(coords.lat,coords.lng),

                });
                      
                // M.toast({html: 'Encontramos esto'});
                $('#btn-siguiente').removeClass('disabled');
                var icon = {
                  url: "img/car_marker.png", // url
                  scaledSize: new google.maps.Size(30, 50), // scaled size
                  origin: new google.maps.Point(0,0), // origin
                  anchor: new google.maps.Point(0, 0) // anchor
              }; 
                  marker = new google.maps.Marker({
                  map: map,
                  draggable: true,
                  animation: google.maps.Animation.DROP,
                  position: new google.maps.LatLng(coords.lat,coords.lng),
                  icon: icon
                });


                /* Geocodeer , funcion para que el marcador  traiga la direccion en caso de que se haya cambiado*/
                var geocoder= new google.maps.Geocoder();
                function geocodePosition(coords) {
                geocoder.geocode({
                  latLng: coords
                }, function(responses) {
                  if (responses && responses.length > 0) {
                    var direccion = responses[0].formatted_address;
                    document.getElementById("direccion").value = direccion;
                  } else {
                    console.log("error");
                  }
                });
              }
                    
                marker.addListener('click', toggleBounce);
                
                marker.addListener( 'dragend', function (event)
                {
                  //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                document.getElementById("latitud").value = this.getPosition().lat();
                document.getElementById("longitud").value = this.getPosition().lng();
                /* Geo Coder */
                geocodePosition(marker.getPosition());
                });

                

                }

          
                //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
                function toggleBounce() {
                  if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                  } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                  }
                }  
              
               
                
          
                
          

                    }

                  }

                });
                return false;


              });
            });




