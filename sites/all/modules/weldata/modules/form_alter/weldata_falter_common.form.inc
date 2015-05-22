<?php 

/**
* Implements hook_form_FORM_ID_alter
* Used to alter Common Fields in Multiple Forms
*/
function  weldata_falter_form_alter(&$form, &$form_state, $form_id) {

  // Permenant Text for GAS Table for GTAW (PQR and WPS Form)
  $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][0]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Shielding Gas';
  $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][1]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Backing Gas';
  $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][2]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Trailing Gas';
  $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][3]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Other Gas';

  // Disabling Text for GAS Table for GTAW (PQR and WPS Form)
  $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][0]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;
  $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][1]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;
  $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][2]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;
  $form['field_gtaw'][LANGUAGE_NONE][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][3]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;

}