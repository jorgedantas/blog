<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PostsController extends AppController {
   // public $autoRender = false;
    
 
    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
    public function index() {
       //echo  pr($this->Post->find('all'));
      //exit();
        $this->set('posts',$this->Post->find('all'));
    }
  
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
        $this->set('categorias',['Selecione uma categoria'] + $this->Post->Categoria->find('list', array(
        'fields' => array('Categoria.id','Categoria.nome')
        )
    
        ));
     
 
        if ($this->request->isPost()) {
          //  echo pr($this->request->data['Post']);
           // exit();
        
         
            //Autotização 
           
             $this->request->data['Post']['user_id'] = $this->Auth->user('id');
             
             if ($this->Post->save($this->request->data)) {
//                $log = $this->Post->getDataSource()->getLog(false, false);
//                debug($log);
//                exit();
                 // echo pr($this->request->data);
                 // exit();
                $this->Flash->success(__('Postagem Enviada.'));
                return $this->redirect(array('action' => 'index'));
             }
             $this->Flash->error(__('Não foi possível realizar a postagem..'));
        } 
    } 
    
   public function edit($id = null) {
       
        $this->Post->id = $id;
        $this->set('categorias',['Selecione uma categoria'] +$this->Post->Categoria->find('list', array(
             'fields' => array('Categoria.id','Categoria.nome'))
         ));
        
//    if (!$id) {
//        throw new NotFoundException(__('Postagem Inválida'));
//    }

        $post = $this->Post->findById($id);
       
        $this->set('categorias',['Selecione uma categoria'] +$this->Post->Categoria->find('list', array(
             'fields' => array('Categoria.id','Categoria.nome'))

         ));
    
//    if (!$post) {
//        throw new NotFoundException(__('Postagem Inválida'));
//    }
    
   
   // pr($this->Post->Categorias->find('list'));
    
  //  exit;
    
    if ($this->request->is(array('post', 'put'))) {
       
        if ($this->Post->save($this->request->data)) {
             // echo pr($this->request->data);
            //  exit();
            
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
