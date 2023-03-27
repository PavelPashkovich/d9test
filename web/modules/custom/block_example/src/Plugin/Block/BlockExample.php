<?php

namespace Drupal\block_example\Plugin\Block;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "block_example",
 *   admin_label = @Translation("Block Example Admin Label"),
 *   category = "Custom",
 * )
 */
class BlockExample extends BlockBase
{

  /**
   * @inheritDoc
   */
  public function build(): array
  {
    return [
      '#type' => 'markup',
      '#markup' => 'Hello from Block example text!'
    ];
  }
}
