<?php

/**
 * @file
 * Calculation for Pipe Clad Weld
 */

/**
 * Calculate Weight of Weld for Pipe Clad.
 */
function weldata_pipe_clad($clad_length,$clad_thickness,$diameter,$filler_density,$number_of_joints){
  $volume = ($clad_length * $clad_thickness * $diameter) * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}