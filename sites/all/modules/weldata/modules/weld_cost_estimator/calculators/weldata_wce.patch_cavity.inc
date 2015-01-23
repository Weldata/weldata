<?php

/**
 * @file
 * Calculation for Patch And Cavity Build up Weld
 */

/**
 * Calculate Weight of Weld for Patch Build Up and Cavity Build Up.
 */
function weldata_patch_cavity($wrapper,$filler_density,$number_of_joints){

  $top_length = $wrapper->field_patch_cavity->field_top_length->value();
  $top_width = $wrapper->field_patch_cavity->field_top_width->value();
  $height_of_patch = $wrapper->field_patch_cavity->field_thickness->value();
  $bottom_length = $wrapper->field_patch_cavity->field_bottom_length->value();
  $bottom_width = $wrapper->field_patch_cavity->field_bottom_width->value();

  $a = ($bottom_length - $top_length)/2;
  $b = ($bottom_width - $top_width)/2;
  //$a = atan($height_of_patch/$a);
  //$b = atan($height_of_patch/$b);
  $volume = array();
  $volume[0] = ($top_length * $top_width * $height_of_patch);
  $volume[1] = ($a * $bottom_length * $height_of_patch);
  $volume[2] = ($b * $bottom_width * $height_of_patch);
  $weight_of_weld = array_sum($volume) * $filler_density * $number_of_joints;
  return $weight_of_weld;
}