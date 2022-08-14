<?php

// Add the proper header
header('Content-Type: image/svg+xml');

//Sanitization the hex color.
$age = (float)$_GET['age'];
$hue = 100 * ($age < 180 ? 1 : 180.0 / $age);

$color = convertHSL(120, $hue, 74);

// Echo the SVG content
echo '<svg xmlns="http://www.w3.org/2000/svg">
   <ellipse style="fill:'.$color.'" cx="150" cy="150" rx="150" ry="150"/>
</svg>';

/**
 * convert a HSL colorscheme to either Hexadecimal (default) or RGB.
 * Source: https://stackoverflow.com/questions/20423641/php-function-to-convert-hsl-to-rgb-or-hex
 * 
 * We want a method where we can programmatically generate a series of colors
 * between two values (eg. red to green) which is easy to do with HSL because
 * you just change the hue. (0 = red, 120 = green).  You can use this function
 * to convert those hsl color values to either the rgb or hexadecimal color scheme.
 * e.g. You have
 *   hsl(50, 100%, 50%)
 * To convert,
 * $hex = convertHSL(50,100,50);  // returns #ffd500
 * or 
 * $rgb = convertHSL(50,100,50, false);  // returns rgb(255, 213, 0)
 *  
 * see https://coderwall.com/p/dvsxwg/smoothly-transition-from-green-to-red
 * @param int $h the hue
 * @param int $s the saturation
 * @param int $l the luminance
 * @param bool $toHex whether you want hexadecimal equivalent or rgb equivalent
 * @return string usable in HTML or CSS
 */

function convertHSL($h, $s, $l, $toHex=true){
    $h /= 360;
    $s /=100;
    $l /=100;

    $r = $l;
    $g = $l;
    $b = $l;
    $v = ($l <= 0.5) ? ($l * (1.0 + $s)) : ($l + $s - $l * $s);
    if ($v > 0){
          $m;
          $sv;
          $sextant;
          $fract;
          $vsf;
          $mid1;
          $mid2;

          $m = $l + $l - $v;
          $sv = ($v - $m ) / $v;
          $h *= 6.0;
          $sextant = floor($h);
          $fract = $h - $sextant;
          $vsf = $v * $sv * $fract;
          $mid1 = $m + $vsf;
          $mid2 = $v - $vsf;

          switch ($sextant)
          {
                case 0:
                      $r = $v;
                      $g = $mid1;
                      $b = $m;
                      break;
                case 1:
                      $r = $mid2;
                      $g = $v;
                      $b = $m;
                      break;
                case 2:
                      $r = $m;
                      $g = $v;
                      $b = $mid1;
                      break;
                case 3:
                      $r = $m;
                      $g = $mid2;
                      $b = $v;
                      break;
                case 4:
                      $r = $mid1;
                      $g = $m;
                      $b = $v;
                      break;
                case 5:
                      $r = $v;
                      $g = $m;
                      $b = $mid2;
                      break;
          }
    }
    $r = round($r * 255, 0);
    $g = round($g * 255, 0);
    $b = round($b * 255, 0);

    if ($toHex) {
        $r = ($r < 15)? '0' . dechex($r) : dechex($r);
        $g = ($g < 15)? '0' . dechex($g) : dechex($g);
        $b = ($b < 15)? '0' . dechex($b) : dechex($b);
        return "#$r$g$b";
    } else {
        return "rgb($r, $g, $b)";    
    }
}