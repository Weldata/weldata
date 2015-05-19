<?php 

/**
* Implements hook_form_FORM_ID_alter
* Used to alter WPQ form
*/
function weldata_falter_form_wpq_node_form_alter(&$form, &$form_state) {

	dpm($form);
    $form['field_wpq_welding_variables']['und'][0]['#title'] = 'Actual Values'; 
    $form['field_wpq_welding_variables']['und'][1]['#title'] = 'Range Qualified';

}