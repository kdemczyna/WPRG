<?php

echo arrElement(readline());
function arrElement($index){
    $randArr = array();
    for($i=0; $i<20; $i++){
        $randArr[$i] = rand(1, 1000);
    };
    return $randArr[$index];
}
?>