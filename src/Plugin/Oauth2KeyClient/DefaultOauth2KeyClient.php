<?php

/**
 * @file
 * Contains \Drupal\oauth2_key_client\Plugin\Oauth2KeyClient\Example.
 */

namespace Drupal\oauth2_key_client\Plugin\Oauth2KeyClient;

use Drupal\oauth2_key_client\Oauth2KeyClientPluginBase;
// for guzzle-oauth2-plugin token retrieval helper

use GuzzleHttp\Client;
use CommerceGuys\Guzzle\Oauth2\GrantType\RefreshToken;
use CommerceGuys\Guzzle\Oauth2\GrantType\PasswordCredentials;
use CommerceGuys\Guzzle\Oauth2\GrantType\ClientCredentials;
use CommerceGuys\Guzzle\Oauth2\Middleware\OAuthMiddleware;
use GuzzleHttp\HandlerStack;

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
  public function fetchAccessToken($baseurl = 'https://example.com', $config) {



    $handlerStack = HandlerStack::create();
    $client = new Client(['handler'=> $handlerStack, 'base_uri' => $baseurl, 'auth' => 'oauth2']);

    $grant = new ClientCredentials($client, $config);
    // $grant = new PasswordCredentials($client, $config);

    $refreshToken = new RefreshToken($client, $config);
    $middleware = new OAuthMiddleware($client, $grant, $refreshToken);

    $handlerStack->push($middleware->onBefore());
    $handlerStack->push($middleware->onFailure(5));

    $access_token = $middleware->getAccessToken();
    $refresh_token = $middleware->getRefreshToken();
    $tokens = array(
      'access_token' => $access_token,
      'refresh_token' => $refresh_token
    );


// Use $middleware->getAccessToken(); and $middleware->getRefreshToken() to get tokens
// that can be persisted for subsequent requests.

    return $tokens;
  }

  /**
   * {@inheritdoc}
   */
  public function createKeyEntity(){}
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

}
