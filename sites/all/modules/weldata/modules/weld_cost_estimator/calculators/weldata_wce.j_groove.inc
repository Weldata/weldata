<?php

/**
 * @file
 * Calculation for J Groove Weld
 */

/**
 * Calculate Weight of Weld for J Groove Weld.
 */
function weldata_j_groove($wrapper,$length,$filler_density,$number_of_joints){

  $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
  $extension = $wrapper->field_groove_weld->field_extension->value();
  $thickness = $wrapper->field_groove_weld->field_thickness->value();
  $extension_thickness = $wrapper->field_groove_weld->field_extension_thickness->value();
  $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
  $cap_height = $wrapper->field_groove_weld->field_cap_height->value();
  $radius = ($wrapper->field_groove_weld->field_diameter->value())/2;

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