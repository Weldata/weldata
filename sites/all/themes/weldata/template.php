<?php

/**
 * @file
 * Template.php - process theme data for your sub-theme.
 */
 
 
 /**
 * Implements hook_date_combo
 * Removes Fieldset from date fields
 */
function weldata_date_combo($variables) {
  return theme('form_element', $variables);
}

/**
* Altering Date Popup to remove labels and description for specific field
*/
/*function weldata_date_popup_process_alter(&$element, &$form_state, $context) {
  unset($element['date']['#description']);
  unset($element['date']['#title']);
}*/


/**
* Custom theme function for the login/register link.
* Change "Register" to create an account
*/
function weldata_lt_login_link($variables) {
// Only display register text if registration is allowed.
	if (variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL)) {
		return t('Log in / Create an account');
	}
	else {
		return t('Log in');
	}
}

// Convert username to link in logged in users.
function weldata_lt_loggedinblock(){
  global $user;
  return l(check_plain($user->name), 'user/' . $user->uid) .' | ' . l(t('Log out'), 'user/logout');
}
 
function weldata_get_array_value($node, $variables_array) { 
	$results = array();
	$entity_wrapper = entity_metadata_wrapper('node', $node);
	foreach ($entity_wrapper->$variables_array as $wrapper) {
	  $results[] = $wrapper->value();
	} 
	return $results;
}

/**
 * Implements hook_preprocess_print
 * Adds Variables for PQR Table
 */
function weldata_preprocess_print(&$variables) {
  $node = $variables['node'];
  
  if($node->type == 'wps'){
	$entity_wrapper = entity_metadata_wrapper('node', $node);  
	  
    $variables['wps_number'] = $node->title;  
    $variables['qualified_to'] = $entity_wrapper->field_qualified_to->value();
    $variables['date'] = format_date($entity_wrapper->field_date->value(), $type = 'wps_pqr');
    $variables['company_name'] = $entity_wrapper->field_wps_company_name->value();
    $variables['revision_number'] = $entity_wrapper->field_wps_revision_number->value();
    $variables['welding_process'] =  weldata_get_array_value($node, 'field_welding_process');
    $variables['welding_type'] = weldata_get_array_value($node, 'field_welding_type');

    // Required Documents
    $variables['scope_notes'] = $entity_wrapper->field_wps_scope_notes->value();
    $variables['scope'] = implode(", ",weldata_get_array_value($node, 'field_wps_scope'));
    $variables['reference_documents'] = implode(", ",weldata_get_array_value($node, 'field_wps_reference_documents'));

    // Joint Design
    $variables['joint_design_name'] = $entity_wrapper->field_wps_joint_design->value();
    $variables['joint_root_spacing'] = $entity_wrapper->field_wps_root_spacing->value();
    $variables['joint_backing'] = $entity_wrapper->field_wps_backing->value();
    $variables['backing_material'] = $entity_wrapper->field_wps_backing_material->value();
    $variables['retainers'] = $entity_wrapper->field_wps_retainers->value();
    $variables['joint_other'] = $entity_wrapper->field_wps_joint_design_other->value();
    $variables[''] = $entity_wrapper->field_joint_design_image->value();


    // Base Metals
       //Base Metal Library
    $base_material_library = $entity_wrapper->field_base_material_library->value();
    $variables['metal1_p_number'] = $base_material_library[0]->field_bml_p[LANGUAGE_NONE][0]['value'];
    $variables['metal1_group_number'] = $base_material_library[0]->field_bml_g[LANGUAGE_NONE][0]['value'];
    $variables['metal1_specification'] = $base_material_library[0]->title;
    $variables['metal1_grade'] = $base_material_library[0]->field_bml_grade[LANGUAGE_NONE][0]['value'];
    $variables['metal1_uns'] = $base_material_library[0]->field_bml_uns[LANGUAGE_NONE][0]['value'];

    $variables['welded_to_p_number'] = $base_material_library[1]->field_bml_p[LANGUAGE_NONE][0]['value'];
    $variables['welded_to_group_number'] = $base_material_library[1]->field_bml_g[LANGUAGE_NONE][0]['value'];
    $variables['welded_to_specification'] = $base_material_library[1]->title;
    $variables['welded_to_grade'] = $base_material_library[1]->field_bml_grade[LANGUAGE_NONE][0]['value'];
    $variables['welded_to_uns'] = $base_material_library[1]->field_bml_uns[LANGUAGE_NONE][0]['value'];

       //Base Metal Details
    $variables['base_maximum_pass_thickness'] = $entity_wrapper->field_wps_maximum_pass_thickness->value();
    $variables['base_metal_other'] = $entity_wrapper->field_wps_base_metal_other->value();
    $variables['pwht_minimum'] = weldata_get_array_value($node, 'field_wps_pwht_minimum');
    $variables['pwht_maximum'] = weldata_get_array_value($node, 'field_wps_pwht_maximum');
       //Thickness Range Qualified
    $variables['diameter_type'] = $entity_wrapper->field_wps_diameter_type->value();
    $variables['diameter_minimum'] = $entity_wrapper->field_wps_minimum_diameter->value();
    $variables['diameter_maximum'] = $entity_wrapper->field_wps_maximum_diameter->value();

    /* Welding Processes */
    $gtaw = $entity_wrapper->field_gtaw->value(); // Getting Field Collection Entity

    // Filler Metal
          // Filler Metal Library
    $variables['filler1_classification'] = $gtaw->field_filler_metal_library[LANGUAGE_NONE][0]['entity']->title;
    $variables['filler1_sfa'] = $gtaw->field_filler_metal_library[LANGUAGE_NONE][0]['entity']->field_fml_specification[LANGUAGE_NONE][0]['value'];
    $variables['filler1_f_number'] = $gtaw->field_filler_metal_library[LANGUAGE_NONE][0]['entity']->field_fml_f_number[LANGUAGE_NONE][0]['value'];
    $variables['filler1_a_number'] = $gtaw->field_filler_metal_library[LANGUAGE_NONE][0]['entity']->field_fml_a_number[LANGUAGE_NONE][0]['value'];
      // Filler Metal Details
    $variables['filler1_size'] = $gtaw->field_filler_metal_size[LANGUAGE_NONE][0]['value'];
    $variables['filler1_chemical_analysis_or_trade_name'] = $gtaw->field_chemical_analysis[LANGUAGE_NONE][0]['value'];
    $variables['filler1_product_form_type'] = $gtaw->field_product_form_type[LANGUAGE_NONE][0]['value'];
    $variables['filler1_minimum'] = $gtaw->field_thickness_range_min[LANGUAGE_NONE][0]['value'];
    $variables['filler_maximum'] = $gtaw->field_thickness_range_max[LANGUAGE_NONE][0]['value'];
      // Consumeable Insert Details
    $variables['consumable_insert_classification'] = $gtaw->field_gtaw_consumable_insert[LANGUAGE_NONE][0]['entity']->title;
    $variables['consumable_insert_SFA'] = $gtaw->field_gtaw_consumable_insert[LANGUAGE_NONE][0]['entity']->field_fml_specification[LANGUAGE_NONE][0]['value'];
    $variables['consumable_insert_f_number'] = $gtaw->field_gtaw_consumable_insert[LANGUAGE_NONE][0]['entity']->field_fml_f_number[LANGUAGE_NONE][0]['value'];
    $variables['consumable_insert_a_number'] = $gtaw->field_gtaw_consumable_insert[LANGUAGE_NONE][0]['entity']->field_fml_a_number[LANGUAGE_NONE][0]['value'];
    $variables['consumable_insert_size'] = $gtaw->field_consumable_insert_size[LANGUAGE_NONE][0]['value'];

    // Position (QW-405)
    $variables['position_of_groove'] = $gtaw->field_position_of_groove[LANGUAGE_NONE][0]['value'];    
    $variables['welding_progression'] = $gtaw->field_weld_progression[LANGUAGE_NONE][0]['value']; 
    $variables['position_fillet'] = $gtaw->field_position_of_fillet[LANGUAGE_NONE][0]['value']; 
    $variables['position_other'] = $gtaw->field_other_position[LANGUAGE_NONE][0]['value']; 

    // Preheat (QW-406)
    $variables['preheat_temp'] = $gtaw->field_preheat_temperature[LANGUAGE_NONE][0]['value'];    
    $variables['interpass_temp'] = $gtaw->field_interpass_temperature[LANGUAGE_NONE][0]['value']; 
    $variables['preheat_maintenance'] = $gtaw->field_preheat_maintenance[LANGUAGE_NONE][0]['value']; 
    $variables['preheat_other'] = $gtaw->field_other_preheat[LANGUAGE_NONE][0]['value'];

    // Gas (QW-408)

    $variables['shieldgas_mixture'] = $gtaw->field_gas_mixture[LANGUAGE_NONE][0]['value'];    
    $variables['trailinggas_mixture'] = $gtaw->field_gas_mixture[LANGUAGE_NONE][1]['value'];
    $variables['backinggas_mixture'] = $gtaw->field_gas_mixture[LANGUAGE_NONE][2]['value'];
    $variables['gas_other_mixture'] = $gtaw->field_gas_mixture[LANGUAGE_NONE][3]['value']; 
    $variables['shieldgas_flow_rate'] = $gtaw->field_gas_flow_rate[LANGUAGE_NONE][0]['value'];    
    $variables['trailinggas_flow_rate'] = $gtaw->field_gas_flow_rate[LANGUAGE_NONE][1]['value']; 
    $variables['backinggas_flow_rate'] = $gtaw->field_gas_flow_rate[LANGUAGE_NONE][2]['value'];
    $variables['gas_other_flow_rate'] = $gtaw->field_gas_flow_rate[LANGUAGE_NONE][3]['value']; 

    // Electrical (QW-409)
    $variables['current_polarity'] = $gtaw->field_polarity[LANGUAGE_NONE][0]['value'];    
    $variables['ampere_range'] = $gtaw->field_ampere_range[LANGUAGE_NONE][0]['value']; 
    $variables['voltage_range'] = $gtaw->field_voltage_range[LANGUAGE_NONE][0]['value']; 
    $variables['pulsing_current'] = $gtaw->field_dc_pulsing_current[LANGUAGE_NONE][0]['value']; 
    $variables['travel_speed'] = $gtaw->field_travel_speed[LANGUAGE_NONE][0]['value'];    
    $variables['heat_input_max'] = $gtaw->field_maximum_heat_input[LANGUAGE_NONE][0]['value']; 
    $variables['tungsten_size'] = $gtaw->field_tungsten_size[LANGUAGE_NONE][0]['value']; 
    $variables['tungsten_type'] = $gtaw->field_tungsten_type[LANGUAGE_NONE][0]['value'];    
    $variables['wire_feed_type'] = $gtaw->field_wire_feed_type[LANGUAGE_NONE][0]['value']; 
    $variables['wire_feed_speed'] = $gtaw->field_gtaw_wire_feed_speed[LANGUAGE_NONE][0]['value']; 
    $variables['electrical_other'] = $gtaw->field_other_electrical[LANGUAGE_NONE][0]['value'];

    // Technique (QW-410)
    $variables['string_weave'] = $gtaw->field_string_or_weave[LANGUAGE_NONE][0]['value'];    
    $variables['orifice_gas_cup_size'] = $gtaw->field_orifice_gas_cup_size[LANGUAGE_NONE][0]['value']; 
    $variables['multi_single_pass'] = $gtaw->field_multi_single_pass[LANGUAGE_NONE][0]['value']; 
    $variables['multi_single_electrode'] = $gtaw->field_multiple_single_electrode[LANGUAGE_NONE][0]['value'];    
    $variables['oscillation'] = $gtaw->field_oscillation[LANGUAGE_NONE][0]['value']; 
    
    // Certification Details
      // Names
    $certification_detials = weldata_get_array_value($node, 'field_certification_details');
    $certification_date = weldata_get_array_value($node, 'field_certification_date');

    $variables['prepared_by_name'] = $certification_detials[0];
    $variables['reviewed_by_name'] = $certification_detials[1];
    $variables['approved_by_name'] = $certification_detials[2];
    $variables['prepared_by_date'] = format_date($certification_date[0], $type = 'wps_pqr');
    $variables['reviewed_by_date'] = format_date($certification_date[1], $type = 'wps_pqr');
    $variables['approved_by_date'] = format_date($certification_date[2], $type = 'wps_pqr');
 
	   
    //$variables['other_pwht'] =  field_view_field('node', $node, 'field_other_pwht',$display);
    // weldata_get_array_value($node, 'field_wps_pwht_minimum');
  }
}

