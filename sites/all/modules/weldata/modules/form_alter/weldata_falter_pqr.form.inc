<?php 

/**
* Implements hook_form_FORM_ID_alter
* Used to alter PQR form
*/
function weldata_falter_form_pqr_node_form_alter(&$form, &$form_state) {
  dpm($form);

	//Joint Design Field access
  	$form['field_joint_design_qw_402'][LANGUAGE_NONE][0]['field_wps_joint_design_image']['#access'] = FALSE;

  
  	//GTAW Field access
    $form['field_gtaw'][LANGUAGE_NONE][0]['field_thickness_range_min']['#access'] = FALSE;
    $form['field_gtaw'][LANGUAGE_NONE][0]['field_thickness_range_max']['#access'] = FALSE;


    //SMAW Field Access
    $form['field_smaw'][LANGUAGE_NONE][0]['field_thickness_range_min']['#access'] = FALSE;
    $form['field_smaw'][LANGUAGE_NONE][0]['field_thickness_range_max']['#access'] = FALSE;

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