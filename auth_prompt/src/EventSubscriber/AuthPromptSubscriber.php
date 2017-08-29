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

/**
 * Class ExampleEventSubScriber.
 *
 * @package Drupal\auth_prompt
 */
class AuthPromptSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('onKernelRequestAuthenticate', 300);
    return $events;
  }


  /**
   * Subscriber Callback for the event.
   * @param AuthPrompt $event
   */
  public function checkForAnonUser(KernelEvents $event) {
    drupal_set_message(t('Please <a href="/user/login">Login</a> or <a href="/user/register">Register</a> to access all the services.'), 'warning');
  }

}