<?php

/**
 * @file
 * Contains \Drupal\cac_base\Form\AnonyLoginPromptDispatchForm.
 */

namespace Drupal\cac_base\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\cac_base\AnonyLoginPrompt;

/**
 * Class AnonyLoginPromptDispatchForm.
 *
 * @package Drupal\cac_base\Form
 */
class AnonyLoginPromptDispatchForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'anony_login_dispatch_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Reference'),
      '#description' => $this->t('Authentication prompt to an anonymus user of the website.'),
      '#maxlength' => 64,
      '#size' => 64,
    );
    $form['dispatch'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Dispatch'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // AnonyLoginPrompt Dispatching
    $dispatcher = \Drupal::service('event_dispatcher');
    $event = new AnonyLoginPrompt($form_state->getValue('name'));
    $dispatcher->dispatch(AnonyLoginPrompt::SUBMIT, $event);
  }
}
