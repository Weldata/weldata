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
	$field_collection = array();
	$entity_wrapper = entity_metadata_wrapper('node', $node);
	foreach ($entity_wrapper->$variables_array as $field_collection_wrapper) {
	  $field_collection[] = $field_collection_wrapper->value();
	} 
    //print implode(", ", $field_collection);
	return $field_collection;
}

/**
 * Implements hook_preprocess_print
 * Adds Variables for PQR Table
 */
function weldata_preprocess_print(&$variables) {
  $node = $variables['node'];
  
  if($node->type == 'wps'){
	$entity_wrapper = entity_metadata_wrapper('node', $node);  
	
	//$variables['node'] = $node;
    //$variables['qualified_to'] = $entity_wrapper->field_wps_qualified_to->value();
    //$variables['date'] = $entity_wrapper->field_date->value();
    $variables['company_name'] = $entity_wrapper->field_wps_company_name->value();
    $variables['revision_number'] = $entity_wrapper->field_wps_revision_number->value();

    // Required Documents
    $variables['scope_notes'] = $entity_wrapper->field_wps_scope_notes->value();
    $variables['scope'] = $entity_wrapper->field_wps_scope->value();
    $variables['reference_documents'] = $entity_wrapper->field_wps_reference_documents->value();

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
    $variables['metal1_p_number'] = $base_material_library[0]->field_bml_p['und'][0]['value'];
    $variables['metal1_group_number'] = $base_material_library[0]->field_bml_g['und'][0]['value'];
    $variables['metal1_specification'] = $base_material_library[0]->title;
    $variables['metal1_grade'] = $base_material_library[0]->field_bml_grade['und'][0]['value'];
    $variables['metal1_uns'] = $base_material_library[0]->field_bml_uns['und'][0]['value'];

    $variables['welded_to_p_number'] = $base_material_library[1]->field_bml_p['und'][0]['value'];
    $variables['welded_to_group_number'] = $base_material_library[1]->field_bml_g['und'][0]['value'];
    $variables['welded_to_specification'] = $base_material_library[1]->title;
    $variables['welded_to_grade'] = $base_material_library[1]->field_bml_grade['und'][0]['value'];
    $variables['welded_to_uns'] = $base_material_library[1]->field_bml_uns['und'][0]['value'];

       //Base Metal Details
    $variables['base_maximum_pass_thickness'] = $entity_wrapper->field_wps_maximum_pass_thickness->value();
    $variables['base_metal_other'] = $entity_wrapper->field_wps_base_metal_other->value();
    $variables['pwht_minimum'] = weldata_get_array_value($node, 'field_wps_pwht_minimum');
    $variables['pwht_maximum'] = weldata_get_array_value($node, 'field_wps_pwht_maximum');
       //Thickness Range Qualified
    $variables['diameter_type'] = $entity_wrapper->field_wps_diameter_type->value();
    $variables['diameter_minimum'] = $entity_wrapper->field_wps_minimum_diameter->value();
    $variables['diameter_maximum'] = $entity_wrapper->field_wps_maximum_diameter->value();

    // Filler Metal
      // Filler Metal Library
    $gtaw = $entity_wrapper->field_gtaw->value(); // Getting Field Collection Entity
    $variables['filler1_classification'] = $gtaw->field_filler_metal_library['und'][0]['entity']->title;
    $variables['filler1_sfa'] = $gtaw->field_filler_metal_library['und'][0]['entity']->field_fml_specification['und'][0]['value'];
    $variables['filler1_f_number'] = $gtaw->field_filler_metal_library['und'][0]['entity']->field_fml_f_number['und'][0]['value'];
    $variables['filler1_a_number'] = $gtaw->field_filler_metal_library['und'][0]['entity']->field_fml_a_number['und'][0]['value'];
      // Filler Metal Details
    $variables['filler1_chemical_analysis_or_trade_name'] = $gtaw->field_chemical_analysis['und'][0]['value'];
    $variables['filler1_product_form_type'] = $gtaw->field_product_form_type['und'][0]['value'];
    $variables['filler1_minimum'] = $gtaw->field_thickness_range_min['und'][0]['value'];
    $variables['filler_maximum'] = $gtaw->field_thickness_range_max['und'][0]['value'];

    
    //$variables['welding_process'] =  weldata_get_array_value($node, 'field_wps_welding_process');
	  //$variables['welding_type'] = weldata_get_array_value($node, 'field_wps_welding_type');


    $variables[''] = $entity_wrapper->field_joint_design_image->value();
    $variables[''] = $entity_wrapper->field_joint_design_image->value();
    $variables[''] = $entity_wrapper->field_joint_design_image->value();
    $variables[''] = $entity_wrapper->field_joint_design_image->value();
    $variables[''] = $entity_wrapper->field_joint_design_image->value();
    $variables[''] = $entity_wrapper->field_joint_design_image->value();
    $variables[''] = $entity_wrapper->field_joint_design_image->value();
    $variables[''] = $entity_wrapper->field_joint_design_image->value();


	   
    //$variables['other_pwht'] =  field_view_field('node', $node, 'field_other_pwht',$display);
  }
}

