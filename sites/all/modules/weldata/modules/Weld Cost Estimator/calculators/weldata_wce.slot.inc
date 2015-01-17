<?php

/**
 * @file
 * Calculation for Slot Weld
 */

/**
 * Calculate Weight of Weld for Slot Weld.
 */
function weldata_slot($thickness,$slot_length,$slot_width,$filler_density,$number_of_joints){
  $volume = (((M_PI * $slot_width * $slot_width)/4) + ($slot_length * $slot_width)) * $thickness * $number_of_joints;
  $weight_of_weld = $volume * $filler_density;
  return $weight_of_weld;
}