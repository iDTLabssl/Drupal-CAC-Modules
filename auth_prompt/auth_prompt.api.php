<?php

/**
 * @file
 * Respond to unauthenticated user access.
 *
 * This hooks allows modules to respond whenever an anonymous user access
 * the site and reminds them to login/signup.
 *
 * @param int $current_user = \Drupal::currentUser();
 *   user state
 *
 * @param \Drupal\node\NodeInterface $node
 *   The node being viewed.
 */
function hook_auth_prompt_message($current_user, \Drupal\node\NodeInterface $node) {
  // If this is the the user who has viewed this node is anonymous we display a
  // message letting them know.
  if ($current_user->id() == 0) {
    drupal_set_message(t('Please <a href="/user/login">Login</a> or <a href="/user/register">Register</a> to access all the services we offer.'), 'warning');
  }
}

/**
 * @} End
 */
