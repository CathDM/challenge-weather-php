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

//2dooo!!!!!!!!!Set time zone based on locattion searched(!!!!!set to proper timezone!ERROR)
//date_default_timezone_set($forecast->timezone);

?>

<!-----ref to partial file--->
<?php require 'partials/header.php' ?>
<!-- //add darksky object   -->
<main class = "container text-center">
  <h1 class ="display-1">Fourcast</h1>
    <div class="card p-4" style="margin:0 auto; max-width: 320px;">
      <h2>Current Forecast</h2>
      <h3 class="display-2"><?php echo $temperature_current; ?>&deg;</h3>
      <h4>Humidity <?php echo $humidity_current; ?>%</h3>
      <p class="lead"><?php echo $summery_current; ?>
      <p class="lead"><?php echo $windSpeed_current; ?><abbr title="miles per hour">Mph</abbr>
    </div>

<!------::::::::::::::::::::::hourly forecast------>
<ul class="list-group"style="margin:0 auto; max-width: 320px;">
  <?php
//set counter at 0 (12h counter)
    $i = 0;
//start the foreach loop to get the hourly forcast 
foreach($forcast->hourly->data as $hour):

  ?>
    <li class="list-group-item d-flex justify-content-between">
      <p class="lead m-0">
<!-- set notation according to time zone wit (g, a)-->
        <?php echo date("g a",$hour->time); ?>
      </p>
      <p class="lead m-0">
        <?php echo round($hour->temperature); ?>&deg;
      </p>
      <p class="lead m-0">
  <!-- //span class that hides the elm but ref it if needed. -->
        <span class="sr-only">Humidity</span><?php echo $hour->humidity*100; ?>%
      </p>
    </li>
  <?php 
//Increase counter by one for each iteration
    $i++;
//stop the loop after 12 iteration (incl break to stop loop)
    if($i==12) break;
//end of foreach loop 
    endforeach;
  ?>
</ul>

<!-- ::::::::::::::::::::::::::::::::::::weekly forcast::::::::::::::::::::::: -->
<div class="row">
  <?php
//set counter at 0 (day0)
  $i = 0;
//start the foreach loop to get the daily week forcast
  foreach($forcast->daily->data as $day):
    $average_temp =  (round($day->temperatureHigh)+round($day->temperatureLow))/2;
  ?>
  
  <div class="col-12 col-md-2">
    <div class="card p-4 mb-4">
      <h2 class="h5">
  <!-- set notation according to weekday (l)-->
        <?php echo date("l", $day->time); ?>
      </h2>
      <h3 class="display-4">
        <?php echo round($average_temp); ?>&deg;
      </h3>
      <div class="d-flex justify-content-between">
      <p class="lead">
        Max <?php echo round($day->temperatureHigh); ?>&deg;
      </p>
      <p class="lead">
        Min <?php echo round($day->temperatureLow) ; ?>&deg;
      </p>
      </div>
      <p class="lead">
        Humidity <?php echo $day->humidity*100; ?>%
      </p>
      <p class="lead m-0">
        <?php echo $day->summary; ?>
      </p>
    </div>
  </div>

  <?php 
//Increase counter by one for each iteration
  $i++;
//stop the loop after 12 iteration (incl break to stop loop)
    if($i==6) break;
//end of foreach loop 
    endforeach;
  ?>
</div>
</main>
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  </body> 
</html>