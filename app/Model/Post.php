<?php

class Post extends AppModel {
    public $validate = array(
        'titulo' => 'notEmpty'
    );
    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
   
  // public $hasMany = ['Comentario'];
   
    public $hasMany = array(
        'Comentario' => array(
            'className' => 'Comentario',
            'conditions' => array('ativo' => true),
            'dependent' => false,
        )
    );
   
   public $belongsTo = array(
        'Categoria' => array(
            'className' => 'Categoria',
            'foreignKey' => 'categoria_id'
        )
    );

}

