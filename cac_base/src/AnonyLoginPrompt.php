<?php

namespace Drupal\cac_base;

use Symfony\Component\EventDispatcher\Event;

class AnonyLoginPrompt extends Event {

  const SUBMIT = 'event.submit';
  protected $referenceID;

  public function __construct($referenceID) {
    $this->referenceID = $referenceID;
  }

  public function getReferenceID() {
    return $this->referenceID;
  }

  public function myEventDescription() {
    return "An event to prompt the user to sign up/register an acount.";
  }
}