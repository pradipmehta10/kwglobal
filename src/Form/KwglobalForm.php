<?php

namespace Drupal\kwglobal\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Logger\LoggerChannelFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * This class accept the input of name.
 *
 * @package Drupal\kwglobal\Form
 */
class KwglobalForm extends FormBase {

  /**
   * The logger factory.
   *
   * @var useDrupal\Core\Logger\LoggerChannelFactory
   */
  protected $loggerFactory;

  /**
   * Constructs a KwglobalForm object.
   *
   * @param Drupal\Core\Logger\LoggerChannelFactory $loggerFactory
   *   The logger factory.
   */
  public function __construct(LoggerChannelFactory $loggerFactory) {
    $this->loggerFactory = $loggerFactory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('logger.factory'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'kwglobal_form_id';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('Enter The Name.'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    $name = $form_state->getValue('name');

    /*
     * Validation for name, it must be filled with
     * at least 2 length.
     */
    if (empty($name)) {
      $form_state->setErrorByName('name', $this->t('Name cannot be blank.'));
    }
    elseif (strlen($name) < 2) {
      $form_state->setErrorByName('name', $this->t('Name must be at least 2 characters.'));
    }

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $name = $form_state->getValue('name');
    $this->messenger()->addStatus($this->t('You have submitted: <strong> %name </strong>', ['%name' => $name]));
    $this->loggerFactory->get('kwglobal')->notice($this->t('You have submitted: <strong> %name </strong>', ['%name' => $name]));
  }

}
