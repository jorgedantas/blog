<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ComentariosController extends AppController {
  
     public function index() {
       
      
       $this->set('comentarios',$this->Comentario->find('all'));
      // $this->set('posts',$this->Post->find('all'));
       //pr($this->Comentario->find('all'));
       //exit;
   } 
   

     public function add() {
      
        if ($this->request->isPost()) {
         
             $this->request->data['Post']['user_id'] = $this->Auth->user('id');
             
             if ($this->Comentario->save($this->request->data)) {
          
                $this->Flash->success(__('Comentário Salvo.'));
                return $this->redirect(array('controller' => 'Posts' , 'action' => 'index'));
             }
             $this->Flash->error(__('Não foi possível realizar o comentário..'));
        } 
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
