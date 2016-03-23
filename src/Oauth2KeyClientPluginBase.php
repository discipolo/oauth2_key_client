<?php

/**
 * @file
 * Contains \Drupal\oauth2_key_client\Oauth2KeyClientPluginBase.
 */

namespace Drupal\oauth2_key_client;

use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslationInterface;

// TODO: inject Key manager and interface

/**
 * Base class for oauth2_key_clients plugins.
 */
abstract class Oauth2KeyClientPluginBase extends PluginBase implements Oauth2KeyClientInterface {

  public function __construct(array $configuration, $plugn_id, $plugin_definition ){

    parent::__construct($configuration, $plugn_id, $plugin_definition);


  }
//  use StringTranslationTrait;
//  /**
//   * Constructs a MyClass object.
//   *
//   * @param \Drupal\Core\StringTranslation\TranslationInterface $string_translation
//   *   The string translation service.
//   */
//  public function __construct(TranslationInterface $string_translation) {
//    // You can skip injecting this service, the trait will fall back to \Drupal::translation()
//    // but it is recommended to do so, for easier testability,
//    $this->stringTranslation = $string_translation;
//  }


}
