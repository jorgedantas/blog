<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ComentariosController extends AppController {
      //public $autoRender = false;
     
      public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add','index');
      }
    
     public function index() {
       
      
       $this->set('comentarios',$this->Comentario->find('all'));
       
      // $this->set('posts',$this->Post->find('all'));
       //pr($this->Comentario->find('all'));
       //exit;
   } 
    public $helpers = array('Js' => array('Jquery'));
    public $components = array('RequestHandler');
    
     public function add() {
        //echo $this->data ;
        if(!empty($this->data)){ 
             if($this->Comentario->save($this->data)){	
              //  echo 'Comentário Enviado !!!'; 
                 $this->set('data', 'Comentário enviado com sucesso !!!');
                 $this->render('/Comentarios/SerializeJson/');
                 }
             else{ 
                echo 'Não foi possível realizar o comentário !!!'; } 
        } 
            //if ($this->request->is('ajax')) {
//            if ($this->RequestHandler->isAjax()) {
//            // Use data from serialized form
//           
//           // print_r(file_get_contents('php://input'));
//              pr($this->request->data); // name, email, message
//           //  exit();
//           //  $this->request->data['Post']['user_id'] = $this->Auth->user('id');
//             if ($this->Comentario->save($this->request->data)) {
//          
//              //  $this->Flash->success(__('Comentário Salvo.'));
//                return pr("Comentário Salvo");//$this->redirect(array('controller' => 'Pages' , 'action' => 'display'));
//             }
//            return pr("Não foi possível realizar o comentário");
//             //$this->Flash->error(__('Não foi possível realizar o comentário..')); // Render the contact-ajax-response view in the ajax layout
//            }
            
//        if ($this->request->isPost()) {
//          // pr('Post'); // name, email, message
//           //  exit();
//             pr($this->request->data); 
//             $this->request->data['Post']['user_id'] = $this->Auth->user('id');
//             
//             if ($this->Comentario->save($this->request->data)) {
//          
//                $this->Flash->success(__('Comentário Salvo.'));
//                return $this->redirect(array('controller' => 'Pages' , 'action' => 'display'));
//             }
//             $this->Flash->error(__('Não foi possível realizar o comentário..'));
//        } 
    } 
    public function delete($id) {

        //if ($this->request->is('get')) {
        //    throw new MethodNotAllowedException();
       // }

        if ($this->Comentario->delete($id)) {
            $this->Flash->success(
                __('Comentário Deletado com sucesso.')
            );
        } else {
            $this->Flash->error(
                __('Erro ao Deletar')
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
     public function ativar($id) {
        // pr($id);
          //$this->Comentario->id = $id;
          //$this->Comentario->ativo =false;
          //$comentario = $this->Comentario->findById($id);
        //  $this->set('Comentarios', $this->Comentario->findById($id));
         // $this->Comentario->findById($id);
         // $this->Comentario->read(null, 1);
         // $this->Comentario->set('ativo', true);
         // $this->Comentario->save();
         $this->Comentario->id = $id;
        $this->Comentario->saveField('ativo', true);
        return $this->redirect(array('action' => 'index'));
    }
     public function desativar($id) {
       
         $this->Comentario->id = $id;
         $this->Comentario->saveField('ativo', false);
        return $this->redirect(array('action' => 'index'));
    }
    
}
