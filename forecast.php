<?php

//https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=YOUR_API_KEY
$location = htmlentities($_POST['location']) ;
$coordinates = $location;
$api_url = 'https://api.darksky.net/forecast/9ed42673ea99f52039d07960d352e976/'.$coordinates;
$forcast  = json_decode(file_get_contents($api_url));

    // echo '<pre>';
    // print_r($forcast);
    // echo '</pre>';

//current conditions
$temperature_current = round($forcast->currently->temperature);
$summery_current = $forcast->currently->summary;
$windSpeed_current = round($forcast->currently->windSpeed);
$humidity_current = $forcast->currently->humidity*100;

//:::::::::::::::::2dooo!!!!!!!!!
//Set time zone based on geolocation searched(!!!!!set to proper timezone!ERROR)
//date_default_timezone_set($forecast->timezone);
//convert farenh into celcius
//sett loop from the next day
//clean up file into partials

?>
