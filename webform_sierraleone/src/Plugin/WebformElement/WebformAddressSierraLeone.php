<?php

namespace Drupal\webform_sierraleone\Plugin\WebformElement;

use Drupal\Core\Form\FormState;
use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform_sierraleone\Element\AddressSierraLeone;

/**
 * Provides an 'address' element with Sierra Leone district.
 *
 * @WebformElement(
 *   id = "webform_address_sierraleone",
 *   label = @Translation("Sierra Leone Address"),
 *   description = @Translation("Provides a form element to collect district information."),
 *   category = @Translation("Composite elements"),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 */
class WebformAddressSierraLeone extends WebformCompositeBase {

  /**
   * {@inheritdoc}
   */
  protected function getCompositeElements() {
    $elements = AddressSierraLeone::getCompositeElements();
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  protected function getInitializedCompositeElement(array &$element) {
    $form_state = new FormState();
    $form_completed = [];
    return AddressSierraLeone::processWebformComposite($element, $form_state, $form_completed);
  }

  /**
   * {@inheritdoc}
   */
  protected function formatTextItemValue(array $element, array $value) {
    $lines = [];
    if (!empty($value['address'])) {
      $lines['address'] = $value['address'];
    }
    if (!empty($value['address_2'])) {
      $lines['address_2'] = $value['address_2'];
    }
    $location = '';
    if (!empty($value['city'])) {
      $location .= $value['city'];
    }
    if (!empty($value['state_province'])) {
      $location .= ($location) ? ', ' : '';
      $location .= $value['state_province'];
    }
    if ($location) {
      $lines['location'] = $location;
    }
    if (!empty($value['country'])) {
      $lines['country'] = $value['country'];
    }
    return $lines;
  }

}
