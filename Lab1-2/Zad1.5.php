<?php
function rectangle(){
    echo ("Prosze podac dlugosc boku a\n");
    $a=(int)readline();
    echo ("Prosze podac dlugosc boku b\n");
    $b=(int)readline();
    echo $a*$b;
}
function triangle(){
    echo ("Prosze podac dlugosc boku a\n");
    $a=(int)readline();
    echo ("Prosze podac dlugosc wysokosci\n");
    $h=(int)readline();
    echo ($a*$h)/2;
}
function trapeze(){
    echo ("Prosze podac dlugosci boku a\n");
    $a=(int)readline( );
    echo ("Prosze podac dlugosci boku b\n");
    $b=(int)readline();
    echo ("Prosze podac dlugosc wysokosci\n");
    $h=(int)readline();
    echo (($a+$b)*$h)/2;
}
echo ("Pole\n1.Prostokat\n2.Trojkat\n3.Trapez\n");
$figure=readline();
switch ($figure){
    case 1:
rectangle();
        break;
    case 2:
        triangle();
        break;
    case 3:
        trapeze();
        break;
}
?>