<?php
/**
 * @file
 * Used to alter units (metric or imperial) in node view
 */

/**
 * Implements hook_node_view
 * Used to alter the units
 */
function weldata_node_view($node, $view_mode, $langcode) {
//TODO: Check if hook_node_view_alter() is a better option than this function.
  $unit = field_get_items('node', $node, 'field_unit')[0]['value'];
  if ($unit == 'metric'){
    //Weld Length
    $node->content['field_weld_length'][0]['#markup'] = $node->content['field_weld_length']['#items'][0]['value'].'<span class="field-suffix">mm</span>';
    //Leg Size
    $node->content['field_leg_size'][0]['#markup'] = $node->content['field_leg_size']['#items'][0]['value'].'<span class="field-suffix">mm</span>';
  }
}