<?php 
    session_start();
    date_default_timezone_set("Asia/Calcutta");  
    echo $time1="15:14:57";
    echo $time2=date("H:i:s");
    $start_date = new DateTime($time1);
    $since_start = $start_date->diff(new DateTime($time2));
    echo $since_start->days.' days total<br>';
    echo $since_start->y.' years<br>';
    echo $since_start->m.' months<br>';
    echo $since_start->d.' days<br>';
    echo $since_start->h.' hours<br>';
    echo $since_start->i.' minutes<br>';
    echo $since_start->s.' seconds<br>';
    
   
?>