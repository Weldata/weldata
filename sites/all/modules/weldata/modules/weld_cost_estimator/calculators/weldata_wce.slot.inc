<?php

/**
 * @file
 * Calculation for Slot Weld
 */

/**
 * Calculate Weight of Weld for Slot Weld.
 */
function weldata_slot($wrapper,$slot_length,$filler_density,$number_of_joints){

  $slot_width = $wrapper->field_groove_weld->field_top_width->value();
  $thickness = $wrapper->field_groove_weld->field_thickness->value();

  $volume = (((M_PI * $slot_width * $slot_width)/4) + ($slot_length * $slot_width)) * $thickness * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}