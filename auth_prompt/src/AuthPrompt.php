<?php

namespace Drupal\auth_prompt;

use Symfony\Component\EventDispatcher\Event;


class AuthPrompt extends Event {

  const SUBMIT = 'event.submit';

  protected $referenceID;

  public function __construct($referenceID)
  {
    $this->referenceID = $referenceID;
  }

  public function getReferenceID()
  {
    return $this->referenceID;
  }

  public function myEventDescription() {
    return "This is as an auth prompt event";
  }

}