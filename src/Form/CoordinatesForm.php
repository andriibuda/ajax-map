<?php

namespace Drupal\ajax_map\Form;

use Drupal\Core\Ajax\InvokeCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

class CoordinatesForm extends FormBase
{
    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'ajax_map_form';
    }

    /**
     * @param array $form
     * @param FormStateInterface $form_state
     * @return array
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['latitude'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Latitude'),
        );

        $form['longitude'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Longitude'),
        );

        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
            '#ajax' => [
                'callback' => '::ajaxSubmitCallback',
                'event' => 'click',
                'progress' => [
                    'type' => 'throbber',
                    'message' => 'Getting some things...',
                ],
            ],
        );
        $form['random'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Random'),
            '#ajax' => [
                'callback' => '::ajaxRandomPoint',
                'event' => 'click',
                'progress' => [
                    'type' => 'throbber',
                    'message' => 'Getting some things...',
                ],
            ],
        );
        $form['#attached']['library'][] = 'ajax_map/js';

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function ajaxSubmitCallback(array &$form, FormStateInterface $form_state) {
        $ajax_response = new AjaxResponse();

        $point = array(
            'lat' => $form_state->getValue('latitude'),
            'lng' => $form_state->getValue('longitude')
        );        

        $ajax_response->addCommand(new InvokeCommand(NULL, 'myTest', [$form_state->getValue('latitude'),  $form_state->getValue('longitude')] ));

        //$ajax_response->addCommand(new InvokeCommand(NULL, 'myTest', $point));

        return $ajax_response;
    }

    public function ajaxRandomPoint() {
        $ajax_response = new AjaxResponse();
        $ajax_response->addCommand(new InvokeCommand(NULL, 'randomMap', [
            mt_rand(-84, 84),
            mt_rand(-178, 178),
        ]));
        return $ajax_response;
    }

    /**
     * @param array $form
     * @param FormStateInterface $form_state
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        drupal_set_message('Form submitted! Hooray!');
    }
}