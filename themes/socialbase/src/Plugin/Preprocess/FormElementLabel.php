<?php

namespace Drupal\socialbase\Plugin\Preprocess;

use Drupal\bootstrap\Plugin\Preprocess\FormElementLabel as BaseFormElementLabel;
use Drupal\bootstrap\Utility\Element;
use Drupal\bootstrap\Utility\Variables;

/**
 * Pre-processes variables for the "form_element_label" theme hook.
 *
 * @ingroup plugins_preprocess
 *
 * @BootstrapPreprocess("form_element_label")
 */
class FormElementLabel extends BaseFormElementLabel {

  /**
   * {@inheritdoc}
   */
  public function preprocessElement(Element $element, Variables $variables) {

    if (isset($element['#id'])) {
      if (strpos($element['#id'], 'field-visibility') !== FALSE) {
        if (isset($element['#attributes']['title'])) {
          $description = $element['#attributes']['title'];
          $element['#attributes'] = [];
          $variables['description'] = $description;
        }
        // Set the materialize icon.
        $variables['icon'] = _socialbase_get_visibility_icon($element['#title']);
      }

      if ($element['#id'] == 'edit-message-0-value') {
        $variables['title_display'] = 'invisible';
      }

    }

    parent::preprocessElement($element, $variables);

  }

}