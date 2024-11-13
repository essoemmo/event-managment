<?php

namespace Drupal\events_management\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class EventsManagementSettingsForm extends ConfigFormBase
{

    protected function getEditableConfigNames(): array
    {
        return ['events_management.settings'];
    }

    public function getFormId(): string
    {
        return 'events_management_settings_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state): array
    {
        $config = $this->config('events_management.settings');

        $form['show_past_events'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Show Past Events'),
            '#default_value' => $config->get('show_past_events'),
        ];

        $form['events_per_page'] = [
            '#type' => 'number',
            '#title' => $this->t('Number of Events per Page'),
            '#default_value' => $config->get('events_per_page'),
            '#min' => 1,
        ];

        return parent::buildForm($form, $form_state);
    }

    public function submitForm(array &$form, FormStateInterface $form_state): void
    {
        $this->config('events_management.settings')
            ->set('show_past_events', $form_state->getValue('show_past_events'))
            ->set('events_per_page', $form_state->getValue('events_per_page'))
            ->save();

        parent::submitForm($form, $form_state);
    }
}
