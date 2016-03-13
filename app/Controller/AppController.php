<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {


   
     public $components = [
        'Paginator',
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
      
            return true;
     
        } 
         public $paginate = array(
        'limit' => 1,
        'order' => array(
            'Post.title' => 'asc'
        )
    );
    
//         public $paginate = array(
//                    'limit' => 5,
//                    'order' =>array('Post.id' => 'Desc')
//                );
        //public function beforeFilter() {
        //    $this->Auth->allow('index', 'view');
        //}
    
}
