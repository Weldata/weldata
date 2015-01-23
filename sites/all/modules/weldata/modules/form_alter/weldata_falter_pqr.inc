<?php 


/**
* Implements hook_form_FORM_ID_alter
* Used to alter pqr_wps form
* $form['fgm_node_pqr_form_group_gas_table']['fields']['items'][0]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value']
*/
function weldata_falter_form_pqr_node_form_alter(&$form, &$form_state) {
  $form['fgm_node_pqr_wps_form_group_gas_table']['fields']['items'][0]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Shielding Gas';
    $form['fgm_node_pqr_wps_form_group_gas_table']['fields']['items'][1]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Backing Gas';
	  $form['fgm_node_pqr_wps_form_group_gas_table']['fields']['items'][2]['field_type_of_shielding'][LANGUAGE_NONE]['value']['#default_value'] = 'Trailing Gas';
}
