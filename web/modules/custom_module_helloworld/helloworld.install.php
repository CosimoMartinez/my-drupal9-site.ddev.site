<?php

/**
 * @file
 * Install, update and uninstall functions for the helloworld module.
 */

/**
 * Implements hook_requirements().
 */
function helloworld_requirements($phase) {
  $requirements = [];

  switch ($phase) {
    // Called while the module is installed.
    case 'install':
      break;

    // Called while the update.php is being executed.
    case 'update':
      break;

    // Called during regular use of the website.
    case 'runtime':
      // Let's check if the name of this module is still "helloworld".
      // If it is, that means that it was not customized and the developers
      // should consider renaming it.
      $module_name = basename(__FILE__, '.install');
      // A little trick that will prevent the string from being replaced. We'll
      // compare the module name to the base64 encoding of "helloworld". If we
      // don't do this, the error will always be displayed because the string we
      // will be checking this against will be the current name of the module.
      if ($module_name == base64_decode('Ym9pbGVycGxhdGU=')) {
        $requirements[] = [
          'title' => t('Dev module name'),
          'value' => $module_name,
          'description' => t('Module name was not changed. Consider renaming the module. This is coming from the hook_requirements() implementation in %module file.', [
            '%module' => drupal_get_path('module', $module_name) . '/' . $module_name . '.module',
          ]),
          'severity' => REQUIREMENT_WARNING,
        ];
      }
      else {
        $requirements[] = [
          'title' => t('Dev module name'),
          'value' => $module_name,
          'description' => t('You have changed the name of custom module. Everything is OK. This is coming from the hook_requirements() implementation in %module file.', [
            '%module' => drupal_get_path('module', $module_name) . '/' . $module_name . '.module',
          ]),
          'severity' => REQUIREMENT_OK,
        ];
      }
      break;
  }

  return $requirements;
}
