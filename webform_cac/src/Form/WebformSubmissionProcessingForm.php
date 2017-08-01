<?php

namespace Drupal\webform_cac\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides a form for deleting a content_entity_example entity.
 *
 * @ingroup content_entity_example
 */
abstract class WebformSubmissionProcessingForm extends ContentEntityConfirmFormBase {


  abstract public function getStatus();

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to change submission state to %status?',
      array(
        '%status' => $this->getStatus()
      ));
  }

  /**
   * {@inheritdoc}
   *
   * If the delete command is canceled, return to the contact list.
   */
  public function getCancelUrl() {
    return new Url('entity.webform.user.submission');
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Confirm');
  }

  /**
   * {@inheritdoc}
   *
   * Delete the entity and log the event. logger() replaces the watchdog.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $entity->processing_state = $this->getStatus();
    $entity->save();


    $this->logger('webform_cac')->notice('@type: processing status updated %title to %status.',
      array(
        '@type' => $this->entity->bundle(),
        '%title' => $this->entity->label(),
        '%state' => $this->getStatus(),
      ));
    //$form_state->setRedirect('entity.webform.user.submission');
  }

}
