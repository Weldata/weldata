<?php

/**
 * @file
 * Calculation for J Groove Weld
 */

/**
 * Calculate Weight of Weld for J Groove Weld.
 */
function weldata_j_groove($length,$extension,$extension_thickness,$thickness,$cap_height,$root_gap,$bevel_angle,$radius,$filler_density,$number_of_joints){
  $l1 = $thickness - $extension_thickness - $radius;
  $area = array();
  $area[0] = ($l1 * $l1 * tan(deg2rad($bevel_angle)))/2;
  $area[1] = (M_PI * $radius * $radius)/4;
  $area[2] = $radius * $l1;
  $area[3] = $extension * ($thickness - $extension_thickness);
  $area[4] = $root_gap * $thickness;
  $area[5] = (($l1  * tan(deg2rad($bevel_angle))) + $radius + $extension + $root_gap) * $cap_height * 0.72;

  $volume = array_sum($area) * $length * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}