<?php

namespace Drupal\webform_cac\Element;

use Drupal\webform\Element\WebformContact;

/**
 * Provides a form element for a contact element
 *
 * @FormElement("webform_contact_cac")
 */
class ContactChangeCac extends WebformContact {

  /**
   * {@inheritdoc}
   */
  public static function getCompositeElements() {
    $elements = [];
    $elements += parent::getCompositeElements();
    $elements['date_action'] = [
      '#type' => 'date',
      '#title' => t('Date of Action'),
    ];
    $elements['type'] = [
      '#type' => 'select',
      '#title' => t('Director/Secretary'),
      '#options' => 'gender',
    ];
    $elements['nationality'] = [
      '#type' => 'select',
      '#title' => t('Nationality'),
      '#options' => 'country_names',
    ];
    $elements['shares'] = [
      '#type' => 'textfield',
      '#title' => t('Shares %'),
    ];

/*    $elements['identification_fid'] = [
      '#title' => t('Identification'),
      '#type' => 'managed_file',
      '#upload_validators' => [
        'file_validate_extensions' => ['gif png jpg jpeg'],
      ],
    ];*/


    return $elements;
  }

}
