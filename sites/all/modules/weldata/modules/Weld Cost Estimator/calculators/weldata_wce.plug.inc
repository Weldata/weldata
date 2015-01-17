<?php

/**
 * @file
 * Calculation for Plug Weld
 */

/**
 * Calculate Weight of Weld for Plug Weld.
 */
function weldata_plug($length,$diameter,$filler_density,$number_of_joints){
  $area = (M_PI * $diameter * $diameter)/4;

  $volume = $area * $length * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}