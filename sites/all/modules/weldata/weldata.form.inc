<?php
/**
* Implements hook_form_alter
* Used as a dummy function, so that drupal reads this file - https://api.drupal.org/api/drupal/modules!system!system.api.php/function/hook_form_FORM_ID_alter/7#comment-8714
*/
function weldata_form_alter(&$form, &$form_state){

}

/**
* Implements hook_form_FORM_ID_alter
* Used to alter pqr_wps form
* $form['fgm_node_pqr_wps_form_group_gas_table']['fields']['items'][0]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value']
*/
function weldata_form_pqr_wps_node_form_alter(&$form, &$form_state) {
  $form['fgm_node_pqr_wps_form_group_gas_table']['fields']['items'][0]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Shielding Gas';
    $form['fgm_node_pqr_wps_form_group_gas_table']['fields']['items'][1]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Backing Gas';
	  $form['fgm_node_pqr_wps_form_group_gas_table']['fields']['items'][2]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Trailing Gas';
}


/**
* Implements hook_form_FORM_ID_alter
* Used to alter the units - #field_suffix
*/
function weldata_form_weld_cost_estimator_node_form_alter(&$form, &$form_state){
//TODO: Use ajax in this function to alter field_suffix
$form['actions']['preview']['#value'] = "Calculate";
$node = $form_state['node'];
  if(isset($node->nid)){
    $unit = field_get_items('node', $node, 'field_unit')[0]['value'];
    if($unit == 'metric'){
      $form['field_weld_length'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_leg_size'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_leg_size_2'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_slot_length'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_slot_width'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_top_length'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_bottom_length'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_top_width'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_bottom_width'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_height_of_patch'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_thickness'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_thickness_bottom'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';

      $form['field_cap_height'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_cap_height_bottom'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_extension'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_extension_thickness'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_throat'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_clad_length'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_clad_thickness'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_root_gap'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_radius'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_diameter'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_land_thickness'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      //Filler
      $form['field_filler_density'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'g/cc';
      $form['field_wire_diameter'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm';
      $form['field_wire_feed_speed'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'mm/min';
      $form['field_gas_flow'][LANGUAGE_NONE][0]['value']['#field_suffix'] = 'CMH';
    }
  }
}