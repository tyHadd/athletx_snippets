<?php
function NormalDate($x){
    $time = strtotime($x);
    $newformat = date('n/j/y',$time);
    return $newformat;
}

function shortDatewithYear($x){
    $time = strtotime($x);
    $newformat = date('F j, Y',$time);
    return $newformat;
}

function shortDate($s, $e){ //nice formatted date - without writing months both times
    $sm = date('m', strtotime($s));
    $em = date('m', strtotime($e));
    $finaldate = "";

    if($s==$e){
        $startdate = date('F j, Y', strtotime($s));
        $finaldate = "$startdate";
    }
    else {
        if($sm==$em){ //"<option value='KENTUCKY Baseball - June 29-July 5'>Kentucky - June 29-July 5</option>",
        $startdate = date('F j', strtotime($s));
        $enddate = date('j, Y', strtotime($e));
        $finaldate = "$startdate-$enddate";
        }
        else {
        $startdate = date('F j', strtotime($s));
        $enddate = date('F j, Y', strtotime($e));
        $finaldate = "$startdate-$enddate";
        }
    }
    return $finaldate;
}

function longDate($s, $e){ //nice formatted date - with writing months both times
    $startdate = date('F j', strtotime($s));
    $enddate = date('F j', strtotime($e));
    $finaldate = "$startdate-$enddate";
}

function formatDate($d, $format){ //custom format on date
    $time = strtotime($d);
    $newformat = date($format,$time);
    return $newformat;
}

function pastDate($d){ //see if
    $today = date("Y-m-d");
    $eventdate = $d; //from database

    $today_time = strtotime($today);
    $eventdate_time = strtotime($eventdate);
    $waypast_time = strtotime('+2 weeks', $eventdate_time);

    if ($eventdate_time < $today_time) {
        if($waypast_time < $today_time){
        return "archive";
        }
        else {
        return "past";
        }
    }
    else {
        return "upcoming";
    }
}

function age($birthdate){
    $age = date_diff(date_create($birthdate), date_create('now'))->y;
    return $age;
}
?>