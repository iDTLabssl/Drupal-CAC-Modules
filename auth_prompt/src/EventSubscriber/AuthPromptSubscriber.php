<?php

/**
 * @file
 * This is to run auth_prompt on every page checking if the user is
 * anonymous and displaying a prompt message
 */


namespace Drupal\auth_prompt\EventSubscriber;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class auth_prompt_Subscriber implements EventSubscriberInterface {

  public function checkForRedirection(GetResponseEvent $event) {
    if ($event->getRequest()->query->get('redirect-me')) {
      $event->setResponse(new RedirectResponse('/user/login'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('checkForRedirection');
    return $events;
  }

}