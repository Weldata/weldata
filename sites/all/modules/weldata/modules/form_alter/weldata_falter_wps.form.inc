<?php 

/**
* Implements hook_form_FORM_ID_alter
* Used to alter WPS form
*/
function weldata_falter_form_wps_node_form_alter(&$form, &$form_state) {

	//Joint Design Field access
  	$form['field_joint_design_qw_402'][LANGUAGE_NONE][0]['field_pqr_joint_design_image']['#access'] = FALSE;
  	$form['field_joint_design_qw_402'][LANGUAGE_NONE][0]['field_pqr_welding_sequence_image']['#access']= FALSE;

    //GTAW Field access
    $form['field_gtaw'][LANGUAGE_NONE][0]['field_weld_metal_thickness']['#access'] = FALSE;
    

    //SMAW Field Access
    $form['field_smaw'][LANGUAGE_NONE][0]['field_weld_metal_thickness']['#access'] = FALSE;

    // Permenant Text for GAS Table
    $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][0]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Shielding Gas';
    $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][1]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Backing Gas';
    $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][2]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Trailing Gas';
    $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][3]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Other Gas';

    // Disabling Text for GAS Table
    $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][0]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;
    $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][1]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;
    $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][2]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;
    $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][3]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;

}