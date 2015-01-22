<?php

/**
 * @file
 * Calculation for Fillet Weld
 */


/**
* Calculate Weight of Weld for Fillet Weld.
*/
function weldata_wce_fillet_weld( $wrapper, $filler_density, $number_of_joints){

  $weld_length = $wrapper->field_fillet_weld->field_weld_length->value();
  $leg_size = $wrapper->field_fillet_weld->field_leg_size->value();
  $size_variation = ($wrapper->field_fillet_weld->field_size_variation->value())/100;		
  
$area = 0.5 * $leg_size * $leg_size * $weld_length * $number_of_joints * $filler_density;
$weight_of_weld =  ($area + ($area * $size_variation)) * $number_of_joints;
return $weight_of_weld;
}