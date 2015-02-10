<?php
/**
 * Created by PhpStorm.
 * User: Vassya
 * Date: 07.02.2015
 * Time: 12:35
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Users;
use Application\Form\RegistrationForm;

class UsersController extends AbstractActionController
{
    protected $usersTable;
    public function getUsersTable()
    {
        if (!$this->usersTable) {
            $sm = $this->getServiceLocator();
            $this->usersTable = $sm->get('Application\Model\UsersTable');
        }
        return $this->usersTable;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'users' => $this->getUsersTable()->fetchAll()
        ));
    }

    public function addAction()
    {
        $form = new RegistrationForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $user = new Users();
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $user->exchangeArray($form->getData());
                $this->getUsersTable()->saveUser($user);

                // Redirect to list of albums
                return $this->redirect()->toRoute('users');
            }
        }
        return array('form' => $form);
    }
}
