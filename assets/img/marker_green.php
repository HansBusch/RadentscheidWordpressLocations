<?php

// Add the proper header
header('Content-Type: image/svg+xml');

// alpha cut in half each year
$age = (float)$_GET['age'];
$a = $age > 360 ? 360 / $age * 255 : 255;
if ($a > 15) {

$color = '#7aff7a'.dechex($a);

// Echo the SVG content if at least 5%
echo '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 10 10">
   <ellipse style="fill:'.$color.'" cx="50%" cy="50%" rx="50%" ry="50%"/>
</svg>';
}
