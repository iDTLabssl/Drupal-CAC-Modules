<?php

namespace Drupal\webform_cac\Element;

use Drupal\Core\Render\Element\Textfield;
use Drupal\Core\Form\FormStateInterface;

///**
// * Provides a 'business_name'.
// *
// * Webform elements are just wrappers around form elements, therefore every
// * webform element must have correspond FormElement.
// *
// * Below is the definition for a custom 'business_name' which just
// * renders a simple text field.
// *
// * @FormElement("business_name")
// *
// * @see \Drupal\Core\Render\Element\FormElement
// * @see https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Render%21Element%21FormElement.php/class/FormElement
// * @see \Drupal\Core\Render\Element\RenderElement
// * @see https://api.drupal.org/api/drupal/namespace/Drupal%21Core%21Render%21Element
// * @see \Drupal\webform_cac\Element\BusinessName
// */
//class BusinessName extends Textfield {
//
//  /**
//   * {@inheritdoc}
//   */
//  public function getInfo() {
//    $class = get_class($this);
//
//    $info = parent::getInfo();
//    $info['#element_validate'][] = [$class, 'validateBusinessName'];
//    $info['#skip_validation'] = FALSE;
//    return $info;
//  }
//
//  /**
//   * Webform element validation handler for #type 'business_name'.
//   *
//   */
//  public static function validateBusinessName(&$element, FormStateInterface $form_state, &$complete_form) {
//    $has_access = (!isset($element['#access']) || $element['#access'] === TRUE);
//
//    $value = $element['#value'];
//    if ($value === '') {
//      return;
//    }
//
//    $business_name = trim($value);
//    if ($business_name === FALSE) {
//      if ($has_access) {
//        if (isset($element['#title'])) {
//          $form_state->setError($element, t('%name must be a valid business name.', ['%name' => $element['#title']]));
//        }
//        else {
//          $form_state->setError($element);
//        }
//      }
//      return;
//    }
//
//    $name = empty($element['#title']) ? $element['#parents'][0] : $element['#title'];
//
//    // Ensure that the input does not all exist as a business name.
//
//
//    // Let's ensure that we can not use reserved names
//
//
//
///*    if ($has_access && isset($element['#min'])) {
//      $min = strtotime($element['#min']);
//      if ($business_name < $min) {
//        $form_state->setError($element, t('%name must be on or after %min.', [
//          '%name' => $name,
//          '%min' => date($time_format, $min),
//        ]));
//      }
//    }*/
//
//    // Ensure that the input is less than the #max property, if set.
///*    if ($has_access && isset($element['#max'])) {
//      $max = strtotime($element['#max']);
//      if ($business_name > $max) {
//        $form_state->setError($element, t('%name must be on or before %max.', [
//          '%name' => $name,
//          '%max' => date($time_format, $max),
//        ]));
//      }
//    }*/
//
//    $form_state->setValueForElement($element, $business_name);
//  }
//
//}
