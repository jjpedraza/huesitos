<?php
require("components.php");
$lat = LimpiaVariable($_GET['lat']); 
$lon = LimpiaVariable($_GET['lon']); 
$lat='42.848675';
$lon='-94.076689';


//$Barrio =  GeoData($lat,$lon)->address->{'neighbourhood'};
//$Calle =  GeoData($lat,$lon)->address->{'road'};

// $Ciudad =  GeoData($lat,$lon)->address->{'county'};
$Ciudad = "";
if (isset(GeoData($lat,$lon)->address->{'city'})) {
    $Ciudad =  GeoData($lat,$lon)->address->{'city'};
} else {
    if (isset(GeoData($lat,$lon)->address->{'county'})) {
        $Ciudad = GeoData($lat,$lon)->address->{'county'};
    } else {
        $Ciudad =  GeoData($lat,$lon)->address->{'town'};
    }
}
$Estado =  GeoData($lat,$lon)->address->{'state'};
$Pais =  GeoData($lat,$lon)->address->{'country'};
$PaisCode =  GeoData($lat,$lon)->address->{'country_code'};

$CP = "";
if (isset(GeoData($lat,$lon)->address->{'postcode'})) {
    $CP = GeoData($lat,$lon)->address->{'postcode'};
} 





echo "<b style='font-size:14pt;'>".$Ciudad."</b>"."<br><cite style='font-size:10pt;'>".$Estado.", ".$Pais."</cite>";



?>