<?php

namespace Drupal\events_management\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class EventForm extends FormBase
{
    public function getFormId(): string
    {
        return 'event_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state): array
    {
        $form['title'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Event Title'),
            '#required' => true,
        ];

        $form['description'] = [
            '#type' => 'textarea',
            '#title' => $this->t('Description'),
        ];

        $form['start_time'] = [
            '#type' => 'datetime',
            '#title' => $this->t('Start Time'),
        ];

        $form['end_time'] = [
            '#type' => 'datetime',
            '#title' => $this->t('End Time'),
        ];

        $form['category'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Category'),
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Save Event'),
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state): void
    {
        // Code to save event data goes here.
        drupal_set_message($this->t('Event saved.'));
    }
}
