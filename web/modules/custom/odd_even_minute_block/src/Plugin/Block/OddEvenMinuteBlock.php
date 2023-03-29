<?php

namespace Drupal\odd_even_minute_block\Plugin\Block;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides 'Odd Even Minute Block' Block.
 *
 * @Block(
 *  id = "odd_even_minute_block",
 *  admin_label = @Translation("Odd Even Minute Block"),
 *  category = @Translation("Custom"),
 * )
 */
class OddEvenMinuteBlock extends BlockBase implements ContainerFactoryPluginInterface {

  private $getOddEvenMinute;
  private $config;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->getOddEvenMinute = $container->get('get_odd_even_minute');
    $instance->config = $container->get('config.factory');

    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $minute = $this->getOddEvenMinute->getOddEvenMinute();

    $config = $this->config->get('odd_even_minute_block.admin_settings');

    $message = $config->get($minute);

    return [
      '#markup' => "<h2>$message</h2>",
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts(): array {
    return ['odd_even_minute'];
  }

}
