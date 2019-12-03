<?php 
$api_url = 'https://api.darksky.net/forecast/9ed42673ea99f52039d07960d352e976/51.0543,3.7167';
$forcast  = json_decode(file_get_contents($api_url));

echo '<pre>';
print_r($forcast);
echo '</pre>';

//current conditions
$temperature_current = round($forcast->currently->temperature);
$summery_current = $forcast->currently->summary;
$windSpeed_current = round($forcast->currently->windSpeed);
$humidity_current = $forcast->currently->humidity*100;

//Set time zone based on locattion searched
date_default_timezone_set($forecast->timezone);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Weather-App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
  <body>
<!-- //add  darksky object   -->
<main class = "container text-center">
<h1 class ="display-1">Fourcast</h1>
<div class="card p-4" style="margin:0 auto; max-width: 320px;">
<h2>Current Forecast</h2>
<h3 class="display-2"><?php echo $temperature_current; ?>&#8451;</h3>
<h3>Humidity <?php echo $humidity_current; ?>%</h3>
<p class="lead"><?php echo $summery_current; ?>
<p class="lead"><?php echo $windSpeed_current; ?><abbr title="miles per hour">Mph</abbr>
</div>

<ul class="list-group"style="margin:0 auto; max-width: 320px;">

<?php
//start the foreach loop to get the hourly forcast
foreach($forcast->hourly->data as $hour):

?>
  <li class="list-group-item d-flex justify-content-between">
  <p class="lead m-0">
  <?php echo date("g a",$hour->time); ?>
  </p>
  <p class="lead m-0">
  <?php echo round($hour->temperature); ?>&deg;
  </p>
  
  </li>
<?php 
//end of foreach loop 
endforeach;
?>
</ul>
</main>
  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  </body> 
</html>