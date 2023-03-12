<?php
$randArr = array();
for($i=0; $i<20; $i++) {
    $randArr[$i] = rand(1, 100);
}
print_r($randArr);

echo maxFor($randArr, count($randArr))."\n";
echo maxForEach($randArr)."\n";
echo maxWhile($randArr, count($randArr))."\n";
echo maxDoWhile($randArr, count($randArr))."\n";
function maxFor($arr, $size){
    $max = $arr[0];
    for ($i=0; $i<$size; $i++){
       if ($arr[$i]>$max){
           $max = $arr[$i];
       }
    }
    return $max;
}

function maxForEach($arr){
    $max = $arr[0];
foreach ($arr as $value)
    if($value>$max){
        $max = $value;
    }
    return $max;
}
function maxWhile($arr, $size){
    $max = $arr[0];
    $index = 1;
while ($index<=$size-1){
        if($arr[$index]>$max){
            $max = $arr[$index];
            $index++;
        }
        else $index++;
}
    return $max;
}
function maxDoWhile($arr, $size){
    $max = $arr[0];
    $index = 1;
    do{
    if($arr[$index]>$max){
        $max = $arr[$index];
        $index++;
    }
    else $index++;
    } while ($index < $size);
    return $max;
}
?>
