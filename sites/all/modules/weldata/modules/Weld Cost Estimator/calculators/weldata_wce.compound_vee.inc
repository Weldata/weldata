<?php

/**
 * @file
 * Calculation for Compound Vee Weld
 */

/**
 * Calculate Weight of Weld for Compound Vee Weld.
 */
function weldata_compound_vee($length,$thickness,$thickness_bottom,$bevel_angle,$bevel_angle_bottom,$land_thickness,$root_gap,$cap_height,$filler_density,$number_of_joints){
  $cap_width = (($thickness_bottom * tan(deg2rad($bevel_angle_bottom))*2)+($thickness * tan(deg2rad($bevel_angle))*2)) + $root_gap;
  $area = array();
  $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)));
  $area[1] = ($thickness_bottom * $thickness_bottom * tan(deg2rad($bevel_angle_bottom)));
  $area[2] = $root_gap * ($thickness + $thickness_bottom + $land_thickness);
  $area[3] = 2 * $thickness_bottom * $thickness * tan(deg2rad($bevel_angle));
  $area[4] = 0.8 * $cap_height * $cap_width;

  $volume = array_sum($area) * $length * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}