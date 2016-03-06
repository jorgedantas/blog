<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PostsController extends AppController {
   // public $autoRender = false;
    public function index() {
   
        $this->set('posts',$this->Post->find('all'));
    }
   // public function categoria($id){
    //    $this->Post->Category->id = $id;
        
    //    $this->set('posts',$this->Post->Category->read());
    //}
    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
    
    public function add() {
        if ($this->request->isPost()) {
             $this->Post->create();
             if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Postagem Enviada.'));
                return $this->redirect(array('action' => 'index'));
             }
             $this->Flash->error(__('Não foi possível realizar a postagem..'));
        } 
    } 
    
   public function edit($id = null) {
       
       
    if (!$id) {
        throw new NotFoundException(__('Postagem Inválida'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Postagem Inválida'));
    }
    
   
    pr($this->Post->Categorias->find('list'));
    
  //  exit;
    
    if ($this->request->is(array('post', 'put'))) {
        $this->Post->id = $id;
        
        if ($this->Post->save($this->request->data)) {
            $this->Flash->success(__('Sua Postagem foi atualizada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Não foi possivel realizar a postagem.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}
    
    public function delete($id) {
        
    //if ($this->request->is('get')) {
    //    throw new MethodNotAllowedException();
   // }

    if ($this->Post->delete($id)) {
        $this->Flash->success(
            __('Postagem excluida com sucesso.')
        );
    } else {
        $this->Flash->error(
            __('Erro ao excluir')
        );
    }

    return $this->redirect(array('action' => 'index'));
}
        
}
