<?php
/**
 * @file
 * Handles all form alters and submit functions for entityconnect.
 */

/**
 * Defines the settings form.
 */
function _entityconnect_admin_form($form, &$form_state) {
  $form = array();

  $form['title'] = array(
    '#prefix' => '<h1>',
    '#markup' => t('Entity Connect'),
    '#suffix' => '</h1>',
    '#weight' => -1,
  );

  $form['add'] = array(
    '#required' => '1',
    '#key_type_toggled' => '1',
    '#default_value' => variable_get('entityconnect_unload_add_default', 1),
    '#description' => t('Default: "off"<br />
                          Choose "on" if you want the "add" buttons displayed by default.<br />
                          Each field can override this value.'),
    '#weight' => '0',
    '#type' => 'radios',
    '#options' => array(
      '0' => t('on'),
      '1' => t('off'),
    ),
    '#title' => t('Default Entity Connect "add" button display'),
  );

  $form['edit'] = array(
    '#required' => '1',
    '#key_type_toggled' => '1',
    '#default_value' => variable_get('entityconnect_unload_edit_default', 1),
    '#description' => t('Default: "off"<br />
                          Choose "on" if you want the "edit" buttons displayed by default.<br />
                          Each field can override this value.'),
    '#weight' => '1',
    '#type' => 'radios',
    '#options' => array(
      '0' => t('on'),
      '1' => t('off'),
    ),
    '#title' => t('Default Entity Connect "edit" button display'),
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Save',
    '#weight' => '2',
  );
  
  $form['reset'] = array(
    '#type' => 'submit',
    '#value' => 'Reset to default',
    '#weight' => '3',
  );

  return $form;
}

/**
 * The settings form submit.
 */
function _entityconnect_admin_form_submit($form, &$form_state) {
  if ($form_state['clicked_button']['#id'] == 'edit-reset') {
    variable_set('entityconnect_unload_add_default', 1);
    variable_set('entityconnect_unload_edit_default', 1);
    drupal_set_message(t('The settings were reset to default.'));
  }
  else {
    variable_set('entityconnect_unload_add_default', $form_state['values']['add']);
    variable_set('entityconnect_unload_edit_default', $form_state['values']['edit']);
    drupal_set_message(t('The settings were saved.'));
  }
}
