<?php
$number = readline();
echo isPrime($number);
function isPrime($number){
    $iterator=0;
    if($number==2) {
        $iterator++;
        return "to jest liczba pierwsza\t iteracje = ".$iterator;
        }
    else if ($number==1) {
        $iterator++;
        return "to nie jest liczba pierwsza\t iteracje = ".$iterator;
        }
    for ($i=2; $i<$number; $i++){
        $iterator++;
        if ($number % $i == 0) {
            return "to nie jest liczba pierwsza\t iteracje = ".$iterator;
        }
    }
    $iterator++;
    return "to jest liczba pierwsza\t iteracje = ".$iterator;

}
?>