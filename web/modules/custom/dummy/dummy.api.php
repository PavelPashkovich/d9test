<?php

/**
 * @file
 * Hooks for dummy module.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Adds messages to page.
 *
 * @return array|string
 * Returns string or array of strings with additional messages.
 */
function hook_dummy_page_message(): array|string
{
    return [
        'First message',
        'Second message',
    ];
}

/**
 * Alters messages being added to page.
 *
 * @param array $messages
 * Array with messages.
 *
 * @return void
 */
function hook_dummy_page_messages_alter(&$messages): void
{
    $messages[0] = 'Replaced!';
}

/**
 * Alters messages being added to page by USER_TYPE
 *
 * @param array $messages
 * Array with messages.
 *
 * @return void
 */
function hook_dummy_page_messages_USER_TYPE_alter(array &$messages): void
{
  $messages[] = 'New message!';
}

/**
 * @} End of "addtogroup hooks".
 */
