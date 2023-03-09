<?php
function getBirthday($pesel){
$year=substr($pesel, 0, 2);
if( (int)$pesel[2]>1){
    $day=substr($pesel,4, 2);
    $month=substr($pesel, 2, 2);
    $month[0]= (int)$month[0]-2;
    echo $day."-".$month."-"."20".$year."r";
}
else {
    $day=substr($pesel,4, 2);
    $month=substr($pesel, 2, 2);
    echo $day."-".$month."-"."19".$year."r";
}
}
getBirthday("10292912345");
?>