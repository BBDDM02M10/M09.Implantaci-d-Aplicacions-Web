<?php

namespace Drupal\rows\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Clase de formulario.
 */
class RowsForm extends FormBase {

    /**
     * ID de formulario.
     *
     * @inheritdoc
     */
    public function getFormId() {
        return 'rows_form';
    }

    /**
     * Método en el que definimos los elementos del formulario.
     *
     * @inheritdoc
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['numero'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Numero'),
            '#size' => 20,
            '#maxlength' => 10,
            '#required' => TRUE,
        ];

        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Enviar'),
        ];

        return $form;
    }

    /**
     * Método encargado de implementar la lógica en el envío.
     *
     * @inheritdoc
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {

        $node = $this->t('/rows/@numero', ['@numero' => $form_state->getValue('numero')]);

        $response = new RedirectResponse($node);
        $response->send();

        return;
    }


}
