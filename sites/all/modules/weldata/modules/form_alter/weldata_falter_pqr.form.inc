<?php 

/**
* Implements hook_form_alter
* Used as a dummy function, so that drupal reads this file - https://api.drupal.org/api/drupal/modules!system!system.api.php/function/hook_form_FORM_ID_alter/7#comment-8714
*/
function weldata_falter_form_alter(&$form, &$form_state, $form_id){

}



/**
* Implements hook_form_FORM_ID_alter
* Used to alter PQR form
*/
function weldata_falter_form_pqr_node_form_alter(&$form, &$form_state) {
  dpm($form);
  
      $form['field_gtaw']['und'][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][0]['field_type_of_shielding']['und']['value']['#default_value'] = 'Shielding Gas';
    $form['field_gtaw']['und'][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][1]['field_type_of_shielding']['und']['value']['#default_value'] = 'Backing Gas';
    $form['field_gtaw']['und'][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][2]['field_type_of_shielding']['und']['value']['#default_value'] = 'Trailing Gas';
    $form['field_gtaw']['und'][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][3]['field_type_of_shielding']['und']['value']['#default_value'] = 'Other Gas';

    $form['field_gtaw']['und'][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][0]['field_type_of_shielding']['und']['value']['#disabled'] = TRUE;
    $form['field_gtaw']['und'][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][1]['field_type_of_shielding']['und']['value']['#disabled'] = TRUE;
    $form['field_gtaw']['und'][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][2]['field_type_of_shielding']['und']['value']['#disabled'] = TRUE;
    $form['field_gtaw']['und'][0]['fgm_field_collection_item_field_gtaw_form_group_gtaw_gas_table']['fields']['items'][3]['field_type_of_shielding']['und']['value']['#disabled'] = TRUE;

}