<?php
/**
*@file
* Contains \Drupal\cac_base\AnonyLoginPromptSubScriber.
*/
namespace Drupal\cac_base\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Drupal\Core\Config\ConfigEvents;
use Drupal\cac_base\AnonyLoginPrompt;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class AnonyLoginPromptSubScriber.
 * Drupal\cac_base
 */
class AnonyLoginPromptSubscriber implements EventSubscriberInterface {
  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[ConfigEvents::SAVE][] = array('onSavingConfig', 800);
    $events[AnonyLoginPrompt::SUBMIT][] = array('anonymousLoginPrompt', 800);
    return $events;
  }

  /**
   * Subscriber Callback for the event.
   * @param AnonyLoginPrompt $event
   */
  public function anonymousLoginPrompt(AnonyLoginPrompt $event) {
    $request = $event->getRequest();
    $redirect_url = $request->server->get('REQUEST_URI', null);
    drupal_set_message(t('Please <a href="/user/login">Login</a> or <a href="/user/register">Register</a> to access all the services we offer.'), 'status');
  }

  /**
   * Registers the methods in this class that should be listeners.
   *
   * @return array
   *   An array of event listener definitions.
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = ['anonymousLoginPrompt'];
    return $events;
  }
}