<?php 
$a = array(2, 4, 6, 8);
$a1 = [2, 4, 6, 8];
echo "sum(a) = " . array_sum($a) . "\n";
echo "max(a) =" . max($a) . "\n";
var_dump($a);

$b = ["a" => 1.2, "b" => 2.3, "c" => 3.4];
echo "sum(b) = " . array_sum($b) . "\n";
echo "max(b) =" . max($b) . "\n";

echo "<pre>";
var_dump($b);
echo "<pre>";
?>