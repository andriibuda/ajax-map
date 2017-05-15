<?php

namespace Drupal\ajax_map\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\ajax_map\Form\CoordinatedForm;
use Drupal\Core\Url;
use Drupal\Core\Link;

class AjaxMapController extends ControllerBase
{
    public function mainPage() {
        $output = array(
            '#title' => 'Ajax Map page title',
            '#markup' => 'Ajax Map. In development... Coming soon...'
        );

        return $output;
    }

    public function themeAction() {
        $form = \Drupal::formBuilder()->getForm('Drupal\ajax_map\Form\CoordinatesForm');

        $page = array(
            '#title' => 'Ajax Google Map',
            '#theme' => 'ajax_map',
            '#var1' => $this->t('Hi, my name is variable number first'),
            '#var2' => $this->t('Hi, my name is variable number second'),
            '#form' => $form
        );
        //$page['#attached']['library'][] = 'ajax_map/ajax_map';

        return $page;
    }
}