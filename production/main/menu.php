
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width:100%;">
  
  <div id='ciudad'></div>

        
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#"><img src='img/logo.png' style='width:32px;'></a> 
      </li>
       -->
      

      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          MiCuenta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Registro / Login</a>
          <a class="dropdown-item" href="#">Olvide mi Contraseña</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Cancelar Mi Cuenta</a>
        </div>
      </li>
     

    </ul>


    <div id="google_translate_element" class="google" style="
            background-color: #8080800a;
            padding: 5px;
            margin: 10px;
            border-radius: 3px;
        "></div>

        <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ca,eu,gl,en,fr,it,pt,de,es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
                }
        </script>

        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


    <!-- <form class="form-inline my-2 my-lg-0">
        

      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>

<div id='PreLoader'>
    <div id='Loader'>
        <img src='img/loader_classic.gif'><br>
        <!-- <cite><b>Espera por favor</b>, Procesando... </cite> -->
    </div>
</div>




<script>
    
    function Ciudad(){   
        $('#PreLoader').show();
        var lat = $('#lat').val();
        var lon = $('#lon').val();

        $.ajax({
            url: 'geocity.php',
            type: 'get',        
            data: {lat:lat, lon: lon},
            success: function(data){
                $('#ciudad').html(data);
                $('#PreLoader').hide();
            }
        });
        
    }
   
    
</script>
<div id='geo' class="alert alert-warning" style='width:100%;'>
</div>

<div id='geoInfo' style='display:none;'>
<input type='hidden' id='Lat' value='0'>
<input type='hidden' id='Lon' value='0'>

</div>
<script>
        var content = document.getElementById("geo");
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(objPosition)
            {
                var lon = objPosition.coords.longitude;
                var lat = objPosition.coords.latitude;                
                // content.innerHTML = "<p><strong>Latitud:</strong> " + lat + "</p><p><strong>Longitud:</strong> " + lon + "</p>";
                $('#geo').hide();
                $('#Lat').val(lat);
                $('#Lon').val(lon);
                // console.log(lat+'|'+lon);
                Ciudad();

            }, function(objPositionError)
            {
                switch (objPositionError.code)
                {
                    case objPositionError.PERMISSION_DENIED:
                      content.innerHTML = "<b>No aceptaste Geolocalizarte</b>. Esta funcion es importante  para que algunas aplicaciones funcionen correctamente, le recomendamos aceptarla.En caso de algun incoveniente, comunicarse al Area de Informatica.<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>";
                    break;
                    case objPositionError.POSITION_UNAVAILABLE:
                        
                        content.innerHTML = "<b>Problema para Geolocalizarte</b>. Esta funcion es importante  para que algunas aplicaciones funcionen correctamente, le recomendamos aceptarla.En caso de algun incoveniente, comunicarse al Area de Informatica.<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>";
                    break;
                    case objPositionError.TIMEOUT:
                        
                      content.innerHTML = "<b>Problema para Geolocalizarte</b>. Esta funcion es importante  para que algunas aplicaciones funcionen correctamente, le recomendamos aceptarla.En caso de algun incoveniente, comunicarse al Area de Informatica.<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>";
                    break;
                    default:
                    content.innerHTML = "<b>Problema para Geolocalizarte</b>. Esta funcion es importante  para que algunas aplicaciones funcionen correctamente, le recomendamos aceptarla.En caso de algun incoveniente, comunicarse al Area de Informatica.<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>";
                }
            }, {
                maximumAge: 75000,
                timeout: 15000
            });
        }
        else
        {
            content.innerHTML = "Su navegador no soporta la API de geolocalización.";
        }

</script>