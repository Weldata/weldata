<?php

/**
 * @file
 * Calculation for Fillet Weld
 */

/**
 * Calculate Weight of Weld for Single Bevel Weld.
 */
function weldata_single_bevel($wrapper,$filler_density,$number_of_joints){

  $length = $wrapper->field_groove_weld->field_weld_length->value();
  $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
  $thickness = $wrapper->field_groove_weld->field_thickness->value();
  $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
  $cap_height = $wrapper->field_groove_weld->field_cap_height->value();

  $cap_width = ($thickness * tan(deg2rad($bevel_angle)))+ $root_gap;
  $area = array();
  $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)));
  $area[1] = ($root_gap * $thickness);
  $area[2] = (0.72 * $cap_height * $cap_width);
  $weight_of_weld =  array_sum($area) * $length * $filler_density * $number_of_joints;
  return $weight_of_weld;
}