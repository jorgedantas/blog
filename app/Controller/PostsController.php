<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PostsController extends AppController {
   // public $autoRender = false;
    
     public $components = ['Upload'];
 
    //public function beforeFilter(){ 
    //cada posição do array será uma ação publica 
    //$this->Auth->allow = array('add','areaPublica'); 
    //}
    //public function upload() {
      //  
    //}
     
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
   
        $this->set('posts',$this->Post->find('all'));
    }
   
//    public function upload($imagem , $dir = 'img')
//    {
//        // pr('$imagem');
//   
//    //exit();
//        $dir = WWW_ROOT.$dir.DS;
//
//        if(($imagem['error']!=0) and ($imagem['size']==0)) {
//            throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);
//        }
//
//        $this->checa_dir($dir);
//
//        $imagem = $this->checa_nome($imagem, $dir);
//
//        $this->move_arquivos($imagem, $dir);
//
//        return $imagem['name'];
//    }

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
        $this->set('categorias',$this->Post->Categoria->find('list', array(
        'fields' => array('Categoria.nome'),
        'recursive' => 0)
    
        ));
     
        
         
        if ($this->request->isPost()) {
           // echo pr($this->request->data);
            //exit();
         //   if( !empty($this->request->data)){
          //  $this->Upload->upload($this->request->data['Img']);
      //  }
           //  $this->Post->create();
            //Autotização 
           
             $this->request->data['Post']['user_id'] = $this->Auth->user('id');
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
   $this->set('categorias',$this->Post->Categoria->find('list', array(
        'fields' => array('Categoria.nome'),
        'recursive' => 0)
    
    ));
    
    if (!$post) {
        throw new NotFoundException(__('Postagem Inválida'));
    }
    
   
   // pr($this->Post->Categorias->find('list'));
    
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

/**
 * Verifica se o diretório existe, se não ele cria.
 * @access public
 * @param Array $imagem
 * @param String $data
*/ 
public function checa_dir($dir)
{
    App::uses('Folder', 'Utility');
    $folder = new Folder();
    if (!is_dir($dir)){
        $folder->create($dir);
    }
}

/**
 * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente
 * @access public
 * @param Array $imagem
 * @param String $data
 * @return nome da imagem
*/ 
public function checa_nome($imagem, $dir)
{
    $imagem_info = pathinfo($dir.$imagem['name']);
    $imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];
    debug($imagem_nome);
    $conta = 2;
    while (file_exists($dir.$imagem_nome)) {
        $imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;
        $imagem_nome .= '.'.$imagem_info['extension'];
        $conta++;
        debug($imagem_nome);
    }
    $imagem['name'] = $imagem_nome;
    return $imagem;
}

/**
 * Trata o nome removendo espaços, acentos e caracteres em maiúsculo.
 * @access public
 * @param Array $imagem
 * @param String $data
*/ 
public function trata_nome($imagem_nome)
{
    $imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
    return $imagem_nome;
}

/**
 * Move o arquivo para a pasta de destino.
 * @access public
 * @param Array $imagem
 * @param String $data
*/ 
public function move_arquivos($imagem, $dir)
{
   
    App::uses('File', 'Utility');
    $arquivo = new File($imagem['tmp_name']);
    $arquivo->copy($dir.$imagem['name']);
    $arquivo->close();
}

        
}
