<?php

/**
 * @file
 * Calculation for Double Bevel Tee Weld
 */

/**
 * Calculate Weight of Weld for Double Bevel Tee Weld.
 */
function weldata_double_bevel_tee($wrapper,$filler_density,$number_of_joints){

  $length = $wrapper->field_groove_weld->field_weld_length->value();
  $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
  $bevel_angle_bottom = $wrapper->field_groove_weld->field_bevel_angle_bottom->value();
  $thickness = $wrapper->field_groove_weld->field_thickness->value();
  $thickness_bottom = $wrapper->field_groove_weld->field_thickness_bottom->value();
  $land_thickness = $wrapper->field_groove_weld->field_land_thickness->value();
  $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
  $leg_size = $wrapper->field_groove_weld->field_leg_size->value();
  $leg_size_2 = $wrapper->field_groove_weld->field_leg_size_2->value();


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