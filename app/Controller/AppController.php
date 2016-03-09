<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
   
     public $components = [
        'Session',
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'Posts', 'action' => 'index'),
            'logoutRedirect' => array(
                'controller' => 'Users',
                'action' => 'login',
                'home'
            ),
            'authError' => 'Você deve fazer login para ter acesso a essa área!', 
            'loginError'=> 'Combinação de usuário e senha errada!',
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller') // Added this line
        )
        ];
        public function isAuthorized($user) {
        // Admin can access every action
        //if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
       // }

        // Default deny
       // return false;
        } 
        //public function beforeFilter() {
        //    $this->Auth->allow('index', 'view');
        //}
    
}
