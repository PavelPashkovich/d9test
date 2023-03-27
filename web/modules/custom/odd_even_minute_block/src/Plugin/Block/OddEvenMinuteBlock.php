<?php

namespace Drupal\odd_even_minute_block\Plugin\Block;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides 'Odd Even Minute Block' Block.
 * @Block(
 *  id = "odd_even_minute_block",
 *  admin_label = @Translation("Odd Even Minute Block"),
 *  category = @Translation("Custom"),
 * )
 */
class OddEvenMinuteBlock extends BlockBase
{

  /**
   * @inheritDoc
   */
  public function build(): array
  {
    $minute = $this->getMinute();
    return [
      '#markup' => "<h2>$minute</h2>",
//      '#cache' => [
//        'contexts' => [
//          'odd_even_minute'
//        ]
//      ]
    ];
  }

  public function getMinute()
  {
    return ((int) date('i')) % 2 === 0 ? 'Even minute' : 'Odd minute';
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return ['odd_even_minute'];
  }
}
