<?php

namespace Drupal\odd_even_minute_block;

interface OddEvenMinuteServiceInterface {
  /**
   * Method, which returns odd or even minute depending on current time.
   *
   * @return string
   *    Odd or even minute.
   */
  public function getOddEvenMinute();
}