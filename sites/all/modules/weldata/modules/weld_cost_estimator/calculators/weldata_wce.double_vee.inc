<?php

/**
 * @file
 * Calculation for Double Vee Weld
 */

/**
 * Calculate Weight of Weld for Double Vee Weld.
 */
function weldata_double_vee($wrapper,$filler_density,$number_of_joints){

  $length = $wrapper->field_groove_weld->field_weld_length->value();
  $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
  $bevel_angle_bottom = $wrapper->field_groove_weld->field_bevel_angle_bottom->value();
  $thickness = $wrapper->field_groove_weld->field_thickness->value();
  $thickness_bottom = $wrapper->field_groove_weld->field_thickness_bottom->value();
  $land_thickness = $wrapper->field_groove_weld->field_land_thickness->value();
  $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
  $cap_height = $wrapper->field_groove_weld->field_cap_height->value();
  $cap_height_bottom = $wrapper->field_groove_weld->field_cap_height->value();

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