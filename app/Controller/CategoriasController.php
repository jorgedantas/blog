<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CategoriasController  extends AppController {
  
    
  public function index() {
       
       $this->set('categorias',$this->Categoria->find('all'));
       
       pr($this->Categoria->find('all'));
       exit;
   } 
   
   public function add() {
       
        if ($this->request->isPost()) {
             $this->Categoria->create();
             if ($this->Categoria->save($this->request->data)) {
                $this->Flash->success(__('Categoria criada com sucesso.'));
                return $this->redirect(array(
                    'controller' => 'Categorias',
                    'action' => 'index'
                    
                    ));
             }
             $this->Flash->error(__('Não foi possível criar a categoria.'));
        } 
    }
    
}
