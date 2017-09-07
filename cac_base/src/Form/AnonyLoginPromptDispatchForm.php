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
    if (\Drupal::currentUser()->isAnonymous()) {
      return 'anony_login_dispatch_form';
    }
  }

  /**
   * {@inheritdoc}
   */
   public function buildForm(array $form, FormStateInterface $form_state) {
     if (\Drupal::currentUser()->isAnonymous()) {
       drupal_set_message(t('Please <a href="/user/login">Login</a> or <a href="/user/register">Register</a> to access all the services we offer.'), 'warning');
     }
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
