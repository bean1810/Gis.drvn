<?php
$url = "https://foursquare.com/oauth2/authenticate?client_id=5ZTLNUBCGJJDHYLBUNLV05PJGU4FVADO2IPKNW0NT2JIFEIQ&response_type=token&redirect_uri=http://goong.io/foursquare.php";
header('Location: ' . $url);
?>