<?php

/**
 * @file
 * Calculation for Double Vee Weld
 */

/**
 * Calculate Weight of Weld for Double Vee Weld.
 */
function weldata_double_vee($length,$thickness,$thickness_bottom,$bevel_angle,$bevel_angle_bottom,$land_thickness,$root_gap,$cap_height,$cap_height_bottom,$filler_density,$number_of_joints){
  $cap_width = (($thickness_bottom * tan(deg2rad($bevel_angle_bottom))*2)+($thickness * tan(deg2rad($bevel_angle))*2)) + $root_gap;
  $area = array();
  $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)));
  $area[1] = ($thickness_bottom * $thickness_bottom * tan(deg2rad($bevel_angle_bottom)));
  $area[2] = $root_gap * ($thickness + $thickness_bottom + $land_thickness);
  $area[3] = 0.8 * $cap_height * $cap_width;
  $area[4] = 0.8 * $cap_height * [(2 * $thickness * tan(deg2rad($bevel_angle))) + $root_gap];
  $area[5] = 0.8 * $cap_height_bottom * ((2 * $thickness_bottom * tan(deg2rad($bevel_angle_bottom))) + $root_gap);

  $volume = array_sum($area) * $length * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}