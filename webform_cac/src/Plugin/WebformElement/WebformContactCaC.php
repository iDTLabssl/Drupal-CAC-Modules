<?php

namespace Drupal\webform_cac\Plugin\WebformElement;

use Drupal\Core\Form\FormState;
use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform_cac\Element\ContactCac;

/**
 * Provides a contact element for CAC webforms.
 *
 * @WebformElement(
 *   id = "webform_contact_cac",
 *   label = @Translation("CAC Company Contact"),
 *   description = @Translation("Provides a form element to collect CAC contact."),
 *   category = @Translation("Composite elements"),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 */
class WebformContactCac extends WebformCompositeBase {

  /**
   * {@inheritdoc}
   */
  protected function getCompositeElements() {
    $elements = ContactCac::getCompositeElements();
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  protected function getInitializedCompositeElement(array &$element) {
    $form_state = new FormState();
    $form_completed = [];
    return ContactCac::processWebformComposite($element, $form_state, $form_completed);
  }

  /**
   * {@inheritdoc}
   */
  protected function formatTextItemValue(array $element, array $value) {
    $lines = [];
    if (!empty($value['name'])) {
      $lines['name'] = $value['name'];
    }
    if (!empty($value['company'])) {
      $lines['company'] = $value['company'];
    }
    $lines += parent::formatTextItemValue($element, $value);
    if (!empty($value['email'])) {
      $lines['email'] = $value['email'];
    }
    if (!empty($value['phone'])) {
      $lines['phone'] = $value['phone'];
    }
    if (!empty($value['occupation'])) {
      $lines['occupation'] = $value['occupation'];
    }
    if (!empty($value['other_directorship'])) {
      $lines['other_directorship'] = $value['other_directorship'];
    }
    return $lines;
  }

}
