<?php 

/**
* Implements hook_form_FORM_ID_alter
* Used to alter WPS form
*/
function weldata_falter_form_wps_node_form_alter(&$form, &$form_state) {
  dpm($form);

	//Joint Design Field access - The following fields are required only for PQR.
  	$form['field_joint_design_qw_402'][LANGUAGE_NONE][0]['field_pqr_joint_design_image']['#access'] = FALSE;
  	$form['field_joint_design_qw_402'][LANGUAGE_NONE][0]['field_pqr_welding_sequence_image']['#access']= FALSE;

    //GTAW Field access - The following fields are required only for WPS.
    $form['field_gtaw'][LANGUAGE_NONE][0]['field_weld_metal_thickness']['#access'] = FALSE;
    

    //SMAW Field Access - The following fields are required only for WPS.
    $form['field_smaw'][LANGUAGE_NONE][0]['field_weld_metal_thickness']['#access'] = FALSE;

  // Permanent Text for PWHT Thickness Range Qualified Table
  $form['fgm_node_wps_form_group_wps_pwht_thickness']['fields']['items'][0]['field_wps_pwht_parameters'][LANGUAGE_NONE]['value']['#default_value'] = 'Complete Penetration';
  $form['fgm_node_wps_form_group_wps_pwht_thickness']['fields']['items'][1]['field_wps_pwht_parameters'][LANGUAGE_NONE]['value']['#default_value'] = 'Partial Penetration';
  $form['fgm_node_wps_form_group_wps_pwht_thickness']['fields']['items'][2]['field_wps_pwht_parameters'][LANGUAGE_NONE]['value']['#default_value'] = 'Impact Tested';
  $form['fgm_node_wps_form_group_wps_pwht_thickness']['fields']['items'][3]['field_wps_pwht_parameters'][LANGUAGE_NONE]['value']['#default_value'] = 'Fillet Welds';

    // Disabling Text for PWHT Thickness Range Qualified Table
  $form['fgm_node_wps_form_group_wps_pwht_thickness']['fields']['items'][0]['field_wps_pwht_parameters'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;
  $form['fgm_node_wps_form_group_wps_pwht_thickness']['fields']['items'][1]['field_wps_pwht_parameters'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;
  $form['fgm_node_wps_form_group_wps_pwht_thickness']['fields']['items'][2]['field_wps_pwht_parameters'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;
  $form['fgm_node_wps_form_group_wps_pwht_thickness']['fields']['items'][3]['field_wps_pwht_parameters'][LANGUAGE_NONE]['value']['#disabled'] = TRUE;

  // Adds Label for Certification Details Table
  $form['fgm_node_wps_form_group_certification_table']['fields']['items'][0]['field_certification_details'][LANGUAGE_NONE]['value']['#title'] = 'Prepared By';
  $form['fgm_node_wps_form_group_certification_table']['fields']['items'][0]['field_certification_details'][LANGUAGE_NONE]['value']['#title_display']= TRUE;
  $form['fgm_node_wps_form_group_certification_table']['fields']['items'][1]['field_certification_details'][LANGUAGE_NONE]['value']['#title'] = 'Reviewed By';
  $form['fgm_node_wps_form_group_certification_table']['fields']['items'][1]['field_certification_details'][LANGUAGE_NONE]['value']['#title_display']= TRUE;
  $form['fgm_node_wps_form_group_certification_table']['fields']['items'][2]['field_certification_details'][LANGUAGE_NONE]['value']['#title'] = 'Approved By';
  $form['fgm_node_wps_form_group_certification_table']['fields']['items'][2]['field_certification_details'][LANGUAGE_NONE]['value']['#title_display']= TRUE;

}