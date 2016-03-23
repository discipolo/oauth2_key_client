<?php

/**
 * @file
 * Contains \Drupal\oauth2_key_client\Oauth2KeyClientInterface.
 */

namespace Drupal\oauth2_key_client;

/**
 * Interface definition for auth form plugins.
 */
interface Oauth2KeyClientInterface {



  /**
   * info.
   *
   * @DCG: Optional.
   */
  public function info(array &$form_state);

  /**
   * settingsForm.
   *
   * @DCG: Optional.
   */
  public function settingsForm(array &$form_state);

}
