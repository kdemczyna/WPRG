<?php

print_r(diceThrow(10));
function diceThrow($amount){
    $diceResult = array();
    for ($i=0; $i<$amount; $i++){
        $diceResult[$i] = rand(1, 6);
    }
    return $diceResult;
}
?>