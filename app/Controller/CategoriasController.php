<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CategoriasController  extends AppController {
  
    
  public function index() {
       
       $this->set('categorias',$this->Categoria->find('all'));
       
       //pr($this->Categoria->find('all'));
       //exit;
   } 
   
   public function add() {
       
       
       $this->set('categorias',$this->Categoria->find('all'));
       
        if ($this->request->isPost()) {
             $this->Categoria->create();
             if ($this->Categoria->save($this->request->data)) {
                $this->Flash->success(__('Categoria criada com sucesso.'));
                return $this->redirect(array(
                    'controller' => 'Categorias',
                    'action' => 'add'
                    
                    ));
             }
             $this->Flash->error(__('Não foi possível criar a categoria.'));
        } 
    }
    
     public function edit($id = null) {
       
       
        if (!$id) {
            throw new NotFoundException(__('Categoria Inválida'));
        }

        $categoria = $this->Categoria->findById($id);
       

        if (!$categoria) {
            throw new NotFoundException(__('Categoria Inválida'));
        }


       // pr($this->Post->Categorias->find('list'));

      //  exit;

        if ($this->request->is(array('categoria', 'put'))) {
            $this->Categoria->id = $id;

            if ($this->Categoria->save($this->request->data)) {
                $this->Flash->success(__('Sua Categoria foi atualizada.'));
                return $this->redirect(array('action' => 'add'));
            }
            $this->Flash->error(__('Não foi possivel realizar a alteraçao.'));
        }

        if (!$this->request->data) {
            $this->request->data = $categoria;
        }
    }

    
}
