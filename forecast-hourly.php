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