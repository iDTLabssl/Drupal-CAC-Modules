<?php

namespace Drupal\webform_sierraleone\Element;

use Drupal\webform\Element\WebformAddress;

/**
 * Provides a form element for an address element with Crafty Clicks postcode lookup.
 *
 * @FormElement("webform_address_sierraleone")
 */
class AddressSierraLeone extends WebformAddress {

  /**
   * {@inheritdoc}
   */
  public static function getCompositeElements() {
    $elements = parent::getCompositeElements();
    $elements['state_province']['#title'] = 'District';
    $elements['state_province']['#options'] = 'districts';
    $elements['country']['#default'] = 'Sierra Leone';
    unset($elements['postal_code']);
    return $elements;
  }

}
