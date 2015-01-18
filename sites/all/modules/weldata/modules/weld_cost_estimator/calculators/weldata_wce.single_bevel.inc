<?php

/**
 * @file
 * Calculation for Fillet Weld
 */

/**
 * Calculate Weight of Weld for Single Bevel Weld.
 */
function weldata_single_bevel($length,$bevel_angle,$thickness,$root_gap,$cap_height,$filler_density,$number_of_joints){
  $cap_width = ($thickness * tan(deg2rad($bevel_angle)))+ $root_gap;
  $area = array();
  $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)));
  $area[1] = ($root_gap * $thickness);
  $area[2] = (0.72 * $cap_height * $cap_width);
  $weight_of_weld =  array_sum($area) * $length * $filler_density * $number_of_joints;
  return $weight_of_weld;
}