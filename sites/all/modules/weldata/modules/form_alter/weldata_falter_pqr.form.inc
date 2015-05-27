<?php 

/**
* Implements hook_form_FORM_ID_alter
* Used to alter PQR form
*/
function weldata_falter_form_pqr_node_form_alter(&$form, &$form_state) {

  dpm($form);

  // Revision
  $form['revision_information']['#access'] = FALSE;

  $node =  $form_state['node'];

  if(isset($node->nid)){
    $form['revision_information']['#access'] = TRUE;
    $form['revision_information']['#type'] = 'vertical_tabs';
    $form['revision_information']['revision']['#access'] = TRUE;
    $form['revision_information']['log']['#type'] = 'textfield';
    $form['revision_information']['log']['#title'] = 'Revision Number';
    $form['revision_information']['log']['#maxlength'] = 5;
    $form['revision_information']['log']['#description'] = 'Enter your revision number';
  }

  //Joint Design Field access - The following fields are required only for WPS.
  	$form['field_joint_design_qw_402'][LANGUAGE_NONE][0]['field_wps_joint_design_image']['#access'] = FALSE;

  
  //GTAW Field access - The following fields are required only for WPS.
    $form['field_gtaw'][LANGUAGE_NONE][0]['field_thickness_range_min']['#access'] = FALSE;
    $form['field_gtaw'][LANGUAGE_NONE][0]['field_thickness_range_max']['#access'] = FALSE;


   //SMAW Field Access - The following fields are required only for WPS.
    $form['field_smaw'][LANGUAGE_NONE][0]['field_thickness_range_min']['#access'] = FALSE;
    $form['field_smaw'][LANGUAGE_NONE][0]['field_thickness_range_max']['#access'] = FALSE;

  // Adds Label for Certification Details Table
  $form['fgm_node_pqr_form_group_pqr_certification_table']['fields']['items'][0]['field_pqr_certification_details'][LANGUAGE_NONE]['value']['#title'] = 'Manufacturer';
  $form['fgm_node_pqr_form_group_pqr_certification_table']['fields']['items'][0]['field_pqr_certification_details'][LANGUAGE_NONE]['value']['#title_display']= TRUE;
  $form['fgm_node_pqr_form_group_pqr_certification_table']['fields']['items'][1]['field_pqr_certification_details'][LANGUAGE_NONE]['value']['#title'] = 'Certified By';
  $form['fgm_node_pqr_form_group_pqr_certification_table']['fields']['items'][1]['field_pqr_certification_details'][LANGUAGE_NONE]['value']['#title_display']= TRUE;


}