<?php

/**
 * @file
 * Contains \Drupal\auth_prompt\Form\AuthPromptDispatchForm.
 */

namespace Drupal\auth_prompt\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\auth_prompt\AuthPrompt;

/**
 * Class AuthPromptDispatchForm.
 *
 * @package Drupal\auth_prompt\Form
 */
class AuthPromptDispatchForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'auth_prompt_dispatch_form';
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
    // AuthPrompt Dispatching
    $dispatcher = \Drupal::service('event_dispatcher');
    $event = new AuthPrompt($form_state->getValue('name'));
    $dispatcher->dispatch(AuthPrompt::SUBMIT, $event);
  }
}
