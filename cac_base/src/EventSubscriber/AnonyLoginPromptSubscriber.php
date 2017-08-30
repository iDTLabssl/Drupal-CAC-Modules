<?php
namespace Drupal\cac_base\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

use Drupal\Core\Form\drupal_set_message;
use Drupal\Core\Entity\t;
/**
 * Redirect .html pages to corresponding Node page.
 */
class AnonyLoginPromptSubscriber implements EventSubscriberInterface {

  /**
   *
   * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
   *   The response event.
   */
  public function anonymousLoginPrompt(FilterResponseEvent $event) {
    $request = $event->getRequest();
    $redirect_url = $request->server->get('REQUEST_URI', null);
    drupal_set_message(t('fffffffffff'), 'warning');
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