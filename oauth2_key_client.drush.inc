<?php

/**
 * @file
 * Drush integration for oauth2_key_client module.
 */

/**
 * Implements hook_drush_command().
 */
function oauth2_key_client_drush_command() {
  $items['oauth2-key-clients-list'] = [
    'description' => 'Show a list of available oauth2_key_clients.',
  ];
  return $items;
}

/**
 * Callback function for oauth2_key_clients-list command.
 */
function drush_oauth2_key_clients_list() {
  $plugin_manager = Drupal::service('plugin.manager.oauth2_key_client');

  $rows[] = [
    'ID',
    'Label',
    'Description',
    'Method 1'
  ];

  foreach ($plugin_manager->getDefinitions() as $definition) {
    $oauth2_key_clients = $plugin_manager->createInstance($definition['id']);
    $rows[] = [
      $definition['id'],
      $definition['label'],
      $definition['description'],
      $oauth2_key_clients->info(),
    ];
  }

  drush_print_table($rows);
}
