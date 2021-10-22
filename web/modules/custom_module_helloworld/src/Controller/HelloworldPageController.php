<?php

namespace Drupal\helloworld\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for our sample page route.
 */
class HelloworldPageController extends ControllerBase {

  /**
   * Returns build array for the simple page.
   */
  public function showHello() {
    
    return [
      '#markup' => $this->t('Ciao Mondo!!!!'),
    ];
  }
  
}
