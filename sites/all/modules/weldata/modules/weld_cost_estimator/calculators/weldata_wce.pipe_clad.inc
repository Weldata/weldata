<?php

/**
 * @file
 * Calculation for Pipe Clad Weld
 */

/**
 * Calculate Weight of Weld for Pipe Clad.
 */
function weldata_pipe_clad($wrapper,$clad_length,$filler_density,$number_of_joints){

  $diameter = $wrapper->field_groove_weld->field_diameter->value();
  $clad_thickness = $wrapper->field_groove_weld->field_thickness->value();

  $volume = ($clad_length * $clad_thickness * $diameter) * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}