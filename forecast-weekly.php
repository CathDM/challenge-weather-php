<!-- ::::::::::::::::::::::::::::::::::::weekly forcast::::::::::::::::::::::: -->
<div class="row">
  <?php
//set counter at 0 (day0)
  $i = 0;
//start the foreach loop to get the daily week forcast
  foreach($forcast->daily->data as $day):
    $average_temp =  (round($day->temperatureHigh)+round($day->temperatureLow))/2;
  ?>
  <!--div class="col-12 col-md-2" is displaying extra day/check loop-->
  <div class="col-12 col-md-4">
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