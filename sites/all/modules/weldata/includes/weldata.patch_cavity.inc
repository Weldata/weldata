<?php

/**
 * @file
 * Calculation for Patch And Cavity Build up Weld
 */

/**
 * Calculate Weight of Weld for Patch Build Up and Cavity Build Up.
 */
function weldata_patch_cavity($top_length,$top_width,$bottom_length,$bottom_width,$height_of_patch,$filler_density,$number_of_joints){
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