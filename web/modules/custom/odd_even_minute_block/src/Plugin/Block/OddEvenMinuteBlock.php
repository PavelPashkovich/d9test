<?php

namespace Drupal\odd_even_minute_block\Plugin\Block;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides 'Odd Even Minute Block' Block.
 *
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

        $minute = \Drupal::service('get_odd_even_minute')->getOddEvenMinute();

        $config = \Drupal::config('odd_even_minute_block.admin_settings');

        $message = $config->get($minute);

        return [
            '#markup' => "<h2>$message</h2>",
        //      '#cache' => [
        //        'contexts' => [
        //          'odd_even_minute'
        //        ]
        //      ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheContexts(): array
    {
        return ['odd_even_minute'];
    }
}
