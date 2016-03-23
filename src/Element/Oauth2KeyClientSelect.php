<?php

/**
 * @file
 * Contains \Drupal\oauth2_key_client\Element\Oauth2KeyClientSelect.
 */

namespace Drupal\oauth2_key_client\Element;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Tableselect;
use Drupal\Core\Url;

/**
 * Provides a select form element that displays available providers.
 *
 * Properties:
 * - #empty_option: The label that will be displayed to denote no selection.
 * - #empty_value: The value of the option that is used to denote no selection.
 * - #oauth2_key_client_filters: An array of filters to apply to the list of providers.
 * - #oauth2_key_client_description: A boolean value that determines if information about
 *   providers is added to the element's description.
 *
 * @FormElement("oauth2_key_client_select")
 */
class Oauth2KeyClientSelect extends Tableselect {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $info = parent::getInfo();
    $class = get_class($this);

    // Add a process function.
    array_unshift($info['#process'], array($class, 'processOauth2KeyClientSelect'));

    // Add a property for provider filters.
    $info['#oauth2_key_client_filters'] = array();

    // Add a property for provider description.
    $info['#oauth2_key_client_description'] = TRUE;

    return $info;
  }

  /**
   * Processes a oauth2_key_client select list form element.
   *
   * @param array $element
   *   The form element to process.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   * @param array $complete_form
   *   The complete form structure.
   *
   * @return array
   *   The processed element.
   */
  public static function processOauth2KeyClientSelect(&$element, FormStateInterface $form_state, &$complete_form) {
    // Get the list of available oauth2_key_client and define the options.


    $manager = \Drupal::service('plugin.manager.oauth2_key_client');
    $plugins = $manager->getDefinitions();

    foreach ($plugins as $plugin_id => $definition) {
//      $opts[$plugin_id] = [
//        'title' => (string) $definition['title'],
//        'endpoint' => $definition['path'],
//        'category' => $definition['category'],
//      ];
//      if (isset($definition['warning'])) {
//        $opts[$plugin_id]['description'] = $definition['warning'] . ' ' . $definition['description'];
//        $opts[$plugin_id]['#attributes'] = array('class' => array('services-experimental'));
//      } else {
//        $opts[$plugin_id]['description'] = $definition['description'];
//      }
      $opts[$plugin_id] = $definition;

    }

    $element['#options'] = $opts;



    // Prefix the default description with information about providers,
    // unless disabled.
    if ($element['#oauth2_key_client_description']) {
//      $original_description = (isset($element['#description'])) ? $element['#description'] : '';
//      $oauth2_key_client_description = t('Choose an available provider. If the desired oauth2_key_client is not listed, <a href=":link">create a new oauth2_key_client</a>.', array(':link' => Url::fromRoute('entity.oauth2_key_client.add_form')->toString()));
//      $element['#description'] = $oauth2_key_client_description . ' ' . $original_description;
    }

    return $element;
  }

}
