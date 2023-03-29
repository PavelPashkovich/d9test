<?php

namespace Drupal\odd_even_minute_block\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class ModuleConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'odd_even_minute_block.admin_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'odd_even_minute_block_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('odd_even_minute_block.admin_settings');

    $form['odd_minute'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Message for odd minute'),
      '#default_value' => $config->get('odd_minute') ?? '',
    ];

    $form['even_minute'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Message for even minute'),
      '#default_value' => $config->get('even_minute') ?? '',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('odd_even_minute_block.admin_settings')
      ->set('odd_minute', $form_state->getValue('odd_minute'))
      ->set('even_minute', $form_state->getValue('even_minute'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
