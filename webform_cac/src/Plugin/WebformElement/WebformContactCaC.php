<?php

namespace Drupal\webform_cac\Plugin\WebformElement;

use Drupal\Core\Form\FormState;
use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform\WebformSubmissionInterface;

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
//  public function getCompositeElements() {
//    $elements = ContactCac::getCompositeElements();
//    return $elements;
//  }

//  /**
//   * {@inheritdoc}
//   */
//  public function getInitializedCompositeElement(array &$element) {
//    $form_state = new FormState();
//    $form_completed = [];
//    return ContactCac::processWebformComposite($element, $form_state, $form_completed);
//  }

  /**
   * {@inheritdoc}
   */
  protected function formatTextItemValue(array $element, WebformSubmissionInterface $webform_submission, array $options = []) {
    $value = $this->getValue($element, $webform_submission, $options);
    $lines = [];
    if (!empty($value['name'])) {
      $lines['name'] = $value['name'];
    }
    if (!empty($value['company'])) {
      $lines['company'] = $value['company'];
    }
    $lines += parent::formatTextItemValue($element, $webform_submission, $options);
    if (!empty($value['email'])) {
      $lines['email'] = $value['email'];
    }
    if (!empty($value['phone'])) {
      $lines['phone'] = $value['phone'];
    }
    return $lines;
  }

}
