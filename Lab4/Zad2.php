<?php
function fibonacciRekurencyjnie($n)
{
    $a = 0;
    $b = 1;

    for ($i = 0; $i < $n; $i++) {
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }

    return $a;
}

function fibonacciOgolny($n)
{
    return round((1 / sqrt(5)) * pow(((1 + sqrt(5)) / 2), $n), 0);
}

echo "Wpisz ktory wyraz ciagu fibbonaciego chcesz wyliczyc: ";
$number = fgets(STDIN);
$timeStart = microtime(true);
echo fibonacciOgolny($number)."\n";
$timeEnd = microtime(true);
echo "Obliczenia z uzyciem wzoru ogolnego zajely: " . ($timeEnd - $timeStart)."\n";

$timeStart = microtime(true);
echo fibonacciRekurencyjnie($number)."\n";
$timeEnd = microtime(true);
echo "Obliczenia z uzyciem wzoru rekurencyjnego zajely: " .($timeEnd - $timeStart);


?>