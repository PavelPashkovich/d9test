<?php

namespace Drupal\odd_even_minute_block;

/**
 * Class OddEvenMinuteService
 *
 * @package Drupal\odd_even_minute_block
 */
class OddEvenMinuteService
{

  /**
   * Get odd or even minute depending on current time.
   *
   * @return string
   *    Odd or even minute.
   */
    public function getOddEvenMinute(): string
    {
        return ((int) date('i')) % 2 === 0 ? 'even_minute' : 'odd_minute';
    }
}
