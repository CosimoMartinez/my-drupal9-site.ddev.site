<?php

namespace Drupal\helloworld\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a sample block.
 *
 * @Block(
 *   id = "helloworld_block",
 *   admin_label = @Translation("Helloworld Data")
 * )
 */
class HelloworldBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {


    $date = \Drupal::service('date.formatter')->format(time(), 'large');

    return array(
      '#theme' => 'helloworld',
      '#today' => $date,
    );
    
  }

}