<?php

/**
 * @file
 * Calculation for Single Vee Weld
 */

/**
 * Calculate Weight of Weld for Single Vee Weld.
 */
function weldata_wce_single_vee($wrapper, $filler_density, $number_of_joints){
	
  $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
  $thickness = $wrapper->field_groove_weld->field_thickness->value();
  $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
  $cap_height = $wrapper->field_groove_weld->field_cap_height->value();
  	
	
  $l1 = $thickness * tan(deg2rad($bevel_angle));
  $cap_width = $l1 + $l1 + $root_gap;
  $area = array();
  $area[0] = ($l1 * $thickness)/2;
  $area[1] = ($root_gap * $thickness);
  $area[2] = (0.72 * $cap_height * $cap_width);
  $weight_of_weld =  array_sum($area) * $length * $filler_density * $number_of_joints;
  return $weight_of_weld;
}