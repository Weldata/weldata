<?php

/**
 * @file
 * Calculation for Fillet Weld
 */


/**
* Calculate Weight of Weld for Fillet Weld.
*/
function weldata_fillet_weld($weld_length,$leg_size,$filler_density,$size_variation,$number_of_joints){
$area = 0.5 * $leg_size * $leg_size * $weld_length * $number_of_joints * $filler_density;
$weight_of_weld =  ($area + ($area * $size_variation)) * $number_of_joints;
return $weight_of_weld;
}