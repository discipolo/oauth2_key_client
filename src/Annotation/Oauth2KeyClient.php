<?php

/**
 * @file
 * Contains \Drupal\oauth2_key_client\Annotation\Oauth2KeyClient.
 */

namespace Drupal\oauth2_key_client\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines oauth2_key_clients annotation object.
 *
 * @Annotation
 */
class Oauth2KeyClient extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The human-readable name of the plugin.
   *
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $title;

  /**
   * The description of the plugin.
   *
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $description;

}
