<?php

/**
 * @file
 * Calculation for Single Vee Weld
 */

/**
 * Calculate Weight of Weld for Single Vee Weld.
 */
function weldata_single_vee($length,$bevel_angle,$thickness,$root_gap,$cap_height,$filler_density,$number_of_joints){
  $l1 = $thickness * tan(deg2rad($bevel_angle));
  $cap_width = $l1 + $l1 + $root_gap;
  $area = array();
  $area[0] = ($l1 * $thickness)/2;
  $area[1] = ($root_gap * $thickness);
  $area[2] = (0.72 * $cap_height * $cap_width);
  $weight_of_weld =  array_sum($area) * $length * $filler_density * $number_of_joints;
  return $weight_of_weld;
}