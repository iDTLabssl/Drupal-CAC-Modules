<?php

namespace Drupal\webform_cac\Element;

use Drupal\webform\Element\WebformContact;

/**
 * Provides a form element for a contact element
 *
 * @FormElement("webform_contact_cac")
 */
class ContactCac extends WebformContact {

  /**
   * {@inheritdoc}
   */
  public static function getCompositeElements() {
    $elements = [];
    $elements += parent::getCompositeElements();
    $elements['dob'] = [
      '#type' => 'date',
      '#title' => t('Date of Birth'),
    ];
    $elements['gender'] = [
      '#type' => 'select',
      '#title' => t('Gender'),
      '#options' => 'gender',
    ];
    $elements['nationality'] = [
      '#type' => 'select',
      '#title' => t('Nationality'),
      '#options' => 'country_names',
    ];
    $elements['shares'] = [
      '#type' => 'number',
      '#title' => t('Shares %'),
    ];
    $elements['occupation'] = [
      '#type' => 'textfield',
      '#title' => t('Occupation'),
    ];
    $elements['other_directorship'] = [
      '#type' => 'textfield',
      '#title' => t('Particulars of other Directorship'),
    ];

    $elements['identification_fid'] = [
      '#title' => t('Identification'),
      '#type' => 'managed_file',
      '#upload_validators' => [
        'file_validate_extensions' => ['gif png jpg jpeg'],
      ],
    ];


    return $elements;
  }

}
