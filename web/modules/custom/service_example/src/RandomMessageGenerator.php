<?php

namespace Drupal\service_example;

/**
 * Class RandomMessageGenerator
 *
 * @package Drupal\service_example
 */
class RandomMessageGenerator
{
  private array $messages;

  public function __construct()
  {
    $this->setMessages();
  }

  public function setMessages(): void
  {
    $this->messages = [
      'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
      'Phasellus maximus tincidunt dolor et ultrices.',
      'Maecenas vitae nulla sed felis faucibus ultricies. Suspendisse potenti.',
      'In nec orci vitae neque rhoncus rhoncus eu vel erat.',
      'Donec suscipit consequat ex, at ultricies mi venenatis ut.',
      'Fusce nibh erat, aliquam non metus quis, mattis elementum nibh. Nullam volutpat ante non tortor laoreet blandit.',
      'Suspendisse et nunc id ligula interdum malesuada.',
    ];
  }

  public function getRandomMessage() {
    $random = rand(0, count($this->messages) - 1);
    return $this->messages[$random];
  }
}
