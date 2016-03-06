<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ComentariosController extends AppController {
  
    
   public function add() {
        if ($this->request->isPost()) {
             $this->Comentario->create();
             if ($this->Comentario->save($this->request->data)) {
                $this->Flash->success(__('Comentário Enviado.'));
                return $this->redirect(array(
                    'controller' => 'Posts',
                    'action' => 'index',
                    $this->request->data['Comentarios']['post_id']
                    ));
             }
             $this->Flash->error(__('Não foi possível postar o comentário.'));
        } 
    } 
    
}
