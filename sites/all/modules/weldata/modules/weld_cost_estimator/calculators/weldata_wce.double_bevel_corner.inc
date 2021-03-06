<?php

/**
 * @file
 * Calculation for Double Bevel Corner
 */

/**
 * Calculate Weight of Weld for Double Bevel Corner Weld.
 */
function weldata_double_bevel_corner($wrapper,$filler_density,$number_of_joints){

  $length = $wrapper->field_fillet_groove_weld->field_weld_length->value();
  $bevel_angle = $wrapper->field_fillet_groove_weld->field_bevel_angle->value();
  $bevel_angle_bottom = $wrapper->field_fillet_groove_weld->field_bevel_angle_bottom->value();
  $thickness = $wrapper->field_fillet_groove_weld->field_thickness->value();
  $thickness_bottom = $wrapper->field_fillet_groove_weld->field_thickness_bottom->value();
  $land_thickness = $wrapper->field_fillet_groove_weld->field_land_thickness->value();
  $root_gap = $wrapper->field_fillet_groove_weld->field_root_gap->value();
  $cap_height = $wrapper->field_fillet_groove_weld->field_cap_height->value();
  $leg_size = $wrapper->field_fillet_groove_weld->field_leg_size->value();

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