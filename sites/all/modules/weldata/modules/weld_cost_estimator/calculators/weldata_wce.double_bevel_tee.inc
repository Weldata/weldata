<?php

/**
 * @file
 * Calculation for Double Bevel Tee Weld
 */

/**
 * Calculate Weight of Weld for Double Bevel Tee Weld.
 */
function weldata_double_bevel_tee($length,$leg_size,$leg_size_2,$bevel_angle,$bevel_angle_bottom,$thickness,$thickness_bottom,$land_thickness,$root_gap,$filler_density,$number_of_joints){
  $area = array();
  $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)))/2;
  $area[1] = ($thickness_bottom * $thickness_bottom * tan(deg2rad($bevel_angle_bottom)))/2;
  $area[2] = $root_gap * ($thickness + $thickness_bottom + $land_thickness);
  $area[3] = ($leg_size * $leg_size)/2;
  $area[4] = ($leg_size_2 * $leg_size_2)/2;

  $volume = array_sum($area) * $length * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}