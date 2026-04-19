#1. Ans:
<?php
$length = 10;
$width = 5;

$area = $length * $width;
$perimeter = 2 * ($length + $width);


echo "Area: " . $area . "<br>";
echo "Perimeter: " . $perimeter;
?> <br>

#2.ans:
<?php
$price = 200;
$vat = $price * 0.15; 

echo "Original price: " . $price . "\n";
echo "VAT amount: " . $vat;
?> <br>
#3.ans:
<?php
$num = 7;

if ($num % 2 == 0) {
    echo $num . " is even.";
} else {
    echo $num . " is odd.";
}
?> <br>
#4.ans:
<?php
$a = 10;
$b = 25;
$c = 15;

if ($a > $b && $a > $c) {
    echo $a . " is the largest.";
} elseif ($b > $a && $b > $c) {
    echo $b . " is the largest.";
} else {
    echo $c . " is the largest.";
}
?><br>
#5.ans:
<?php

for ($i = 10; $i <= 100; $i++) {
    
    if ($i % 2 != 0) {
        echo $i . ", ";
    }
}
?> <br>
#6.ans:
<?php
$data = ["Apple", "Banana", "Cherry", "Date", "Elderberry"];
$target = "Cherry";
$found = false;


foreach ($data as $item) {
    if ($item == $target) {
        $found = true;
        break; 
    }
}


if ($found) {
    echo "Element '$target' found in the array.";
} else {
    echo "Element '$target' not found.";
}
?> <br>
#7.ans:
<?php

for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

echo "<br>";


for ($i = 3; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}

echo "<br>";


$letter = 'A';
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $letter . " ";
        $letter++;
    }
    echo "<br>";
}
?>