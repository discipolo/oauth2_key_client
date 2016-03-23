<?php

/**
 * @file
 * Contains \Drupal\oauth2_key_client\Plugin\Oauth2KeyClient\Example.
 */

namespace Drupal\oauth2_key_client\Plugin\Oauth2KeyClient;

use Drupal\oauth2_key_client\Oauth2KeyClientPluginBase;
// TODO: turn this into KeyInput (key.module implementation) or helper form (no need for another plugin)
/**
 * Oauth 2 pluggable Auth Form.
 *
 * @Oauth2KeyClient(
 *   id = "default",
 *   label = @Translation("Oauth2 Form"),
 *   description = @Translation("Oauth2 Form description.")
 * )
 */
class DefaultOauth2KeyClient extends Oauth2KeyClientPluginBase {
  protected $consumer_secret;
  protected $consumer_key;


  /**
   * {@inheritdoc}
   */
  public function info(array &$form_state) {

  }
  /**
   * {@inheritdoc}
   */
  public function settingsForm(array &$form_state) {

  }
  /**
   * {@inheritdoc}
   *
   * @DCG: Optional.
   */
  public function AuthForm() {
    // todo use /admin/config/system/keys to store the outcome or just scrap pluggable auth forms and move to key plugins in authorizations
    //$api_key_settings = $type->getApiKeySettings();
    $form['consumer_key'] = array(
      '#type' => 'textfield',
      '#title' => t('Consumer key'),
      '#description' => t('The consumer key for authenticating through OAuth.'),
      '#default_value' => $this->getConsumerKey(),
      '#required' => TRUE,
    );

    $form['consumer_secret'] = array(
      '#type' => 'textfield',
      '#title' => t('Consumer secret'),
      '#description' => t('The consumer secret for authenticating through OAuth.'),
      '#default_value' => $this->getConsumerSecret(),
      '#required' => TRUE,
    );
kint($this);

    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function getConsumerKey() {
    return $this->consumer_key;
  }

  /**
   * {@inheritdoc}
   */
  public function getConsumerSecret() {
    return $this->consumer_secret;
  }
}
