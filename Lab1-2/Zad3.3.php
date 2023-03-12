<?php
multiplicationTable(11);
function multiplicationTable($size){
    for ($i=0; $i<$size; $i++){
        for ($j=0; $j<$size; $j++){
            echo $i*$j."\t";
        }
        echo "\n";
    }
}
?>