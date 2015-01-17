<?php

/**
 * @file
 * Calculation for Double Bevel Corner
 */

/**
 * Calculate Weight of Weld for Double Bevel Corner Weld.
 */
function weldata_double_bevel_corner($length,$leg_size,$bevel_angle,$bevel_angle_bottom,$thickness,$thickness_bottom,$land_thickness,$cap_height,$root_gap,$filler_density,$number_of_joints){
  $area = array();
  $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)))/2;
  $area[1] = ($thickness_bottom * $thickness_bottom * tan(deg2rad($bevel_angle_bottom)))/2;
  $area[2] = $root_gap * ($thickness + $thickness_bottom + $land_thickness);
  $area[3] = ($leg_size * $leg_size)/2;
  $area[4] = $cap_height * (($thickness_bottom * tan(deg2rad($bevel_angle_bottom))) + $root_gap);

  $volume = array_sum($area) * $length * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}