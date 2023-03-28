<?php

/**
 * @file
 * Contains \Drupal\block_form_example\Plugin\Block\BlockFormExample.
 */

// Пространство имён для нашего блока.
namespace Drupal\block_form_example\Plugin\Block;

use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @Block(
 *   id = "block_form_example",
 *   admin_label = @Translation("Block Form Example"),
 *   category = "Custom",
 * )
 */
class BlockFormExample extends BlockBase
{

    /**
     * Добавляем наши конфиги по умолчанию.
     *
     * {@inheritdoc}
     */
    public function defaultConfiguration()
    {
        return [
            'count' => 1,
            'message' => 'Hello My World!',
        ];
    }

    /**
     * Добавляем в стандартную форму блока свои поля.
     *
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state)
    {
        // Получаем оригинальную форму для блока.
        $form = parent::blockForm($form, $form_state);
        // Получаем конфиги для данного блока.
        $config = $this->getConfiguration();

        // Добавляем поле для ввода сообщения.
        $form['message'] = [
        '#type' => 'textfield',
        '#title' => t('Message to printing'),
        '#default_value' => $config['message'],
        ];

        // Добавляем поле для количества сообщений.
        $form['count'] = [
        '#type' => 'number',
        '#min' => 1,
        '#title' => t('How many times display a message'),
        '#default_value' => $config['count'],
        ];

        return $form;
    }

    /**
     * Валидируем значения на наши условия.
     * Количество должно быть >= 1,
     * Сообщение должно иметь минимум 5 символов.
     *
     * {@inheritdoc}
     */
    public function blockValidate($form, FormStateInterface $form_state)
    {
        $count = $form_state->getValue('count');
        $message = $form_state->getValue('message');

        // Проверяем введенное число.
        if (!is_numeric($count) || $count < 1) {
            $form_state->setErrorByName(
                'count',
                t('Needs to be an interger and more or equal 1.')
            );
        }

        // Проверяем на длину строки.
        if (strlen($message) < 5) {
            $form_state->setErrorByName(
                'message',
                t('Message must contain more than 5 letters')
            );
        }
    }

    /**
     * В субмите мы лишь сохраняем наши данные.
     *
     * {@inheritdoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state)
    {
        $this->configuration['count'] = $form_state->getValue('count');
        $this->configuration['message'] = $form_state->getValue('message');
    }

    /**
     * Генерируем и выводим содержимое блока.
     *
     * {@inheritdoc}
     */
    public function build()
    {
        $config = $this->getConfiguration();
        $message = '';

        for ($i = 1; $i <= $config['count']; $i++) {
            $message .= $config['message'] . '<br />';
        }

        $block = [
            '#type' => 'markup',
            '#markup' => $message,
        ];
        return $block;
    }

}
