<?php

namespace Drupal\odd_even_minute_block\Cache\Context;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\Context\CacheContextInterface;
use Drupal\Core\Cache\Context\CalculatedCacheContextInterface;
use Drupal\Core\Cache\Context\RequestStackCacheContextBase;

/**
 * Cache context ID: 'odd_even_minute'.
 */
class OddEvenMinuteCacheContext /**extends RequestStackCacheContextBase*/ implements CacheContextInterface
{

  /**
   * @inheritDoc
   */
  public static function getLabel()
  {
    return t('Odd Even Minute Cache Context');
  }

  /**
   * @inheritDoc
   */
  public function getContext()
  {
    return ((int) date('i')) % 2 === 0 ? 'even_minute' : 'odd_minute';
  }

  /**
   * @inheritDoc
   */
  public function getCacheableMetadata()
  {
    return new CacheableMetadata();
  }
}
