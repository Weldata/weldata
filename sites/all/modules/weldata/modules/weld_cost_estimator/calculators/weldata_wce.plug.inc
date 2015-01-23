<?php

/**
 * @file
 * Calculation for Plug Weld
 */

/**
 * Calculate Weight of Weld for Plug Weld.
 */
function weldata_wce_plug($wrapper,$filler_density,$number_of_joints){

  $length = $wrapper->field_plug_slot_weld->field_weld_length->value();
  $diameter = $wrapper->field_plug_slot_weld->field_diameter->value();


  $area = (M_PI * $diameter * $diameter)/4;

  $volume = $area * $length * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}