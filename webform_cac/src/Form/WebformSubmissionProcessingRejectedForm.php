<?php

namespace Drupal\webform_cac\Form;

use Drupal\webform_cac\Form\WebformSubmissionProcessingForm;

/**
 * Provides a form for deleting a content_entity_example entity.
 *
 * @ingroup content_entity_example
 */
class WebformSubmissionProcessingRejectedForm extends WebformSubmissionProcessingForm {

  public function getStatus() {
    return 'rejected';
  }

}
