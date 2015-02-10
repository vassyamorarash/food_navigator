<?php
/**
 * Created by PhpStorm.
 * User: Vassya
 * Date: 08.02.2015
 * Time: 20:54
 */

namespace Application\Form;

use Zend\Form\Form;

class RegistrationForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('users');

        $this->add(array(
            'name' => 'login',
            'type' => 'Text',
            'options' => array(
                'label' => 'Login',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'name' => 'conf_password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Confirm Password',
            ),
        ));
        $this->add(array(
            'name' => 'first_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'First Name',
            ),
        ));
        $this->add(array(
            'name' => 'second_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Second Name',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Register',
                'id' => 'submitbutton',
            ),
        ));
    }
}
