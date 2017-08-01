<?php

namespace Drupal\webform_cac\Element;

use Drupal\webform\Element\WebformCompositeBase;

/**
 * Provides a form element for a contact element
 *
 * @FormElement("webform_contact_cac")
 */
class ContactCac extends WebformCompositeBase {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return parent::getInfo() + ['#theme' => 'webform_composite_contact_cac'];
  }

  /**
   * {@inheritdoc}
   */
  public static function getCompositeElements() {
    $elements = [];
    $elements['name'] = [
      '#type' => 'textfield',
      '#title' => t('Name'),
    ];
    $elements['company'] = [
      '#type' => 'textfield',
      '#title' => t('Company'),
    ];
    $elements['email'] = [
      '#type' => 'email',
      '#title' => t('Email'),
    ];
    $elements['phone'] = [
      '#type' => 'tel',
      '#title' => t('Phone'),
    ];
    $elements['address'] = [
      '#type' => 'textfield',
      '#title' => t('Address'),
    ];
    $elements['address_2'] = [
      '#type' => 'textfield',
      '#title' => t('Address 2'),
    ];
    $elements['city'] = [
      '#type' => 'textfield',
      '#title' => t('City/Town'),
    ];
    $elements['state_province'] = [
      '#type' => 'select',
      '#title' => t('District'),
      '#options' => 'state_province_names',
    ];
    $elements['postal_code'] = [
      '#type' => 'textfield',
      '#title' => t('Zip/Postal Code'),
    ];
    $elements['country'] = [
      '#type' => 'select',
      '#title' => t('Country'),
      '#options' => 'country_names',
    ];
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
    $elements['appointment_date'] = [
      '#type' => 'date',
      '#title' => t('Date of Appointment'),
    ];
    return $elements;
  }

}
