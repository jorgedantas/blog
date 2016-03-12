<?php

class Post extends AppModel {
    public $validate = array(
        'titulo' => 'notEmpty'
    );
    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
   
   public $hasMany = ['Comentario'];
   
   public $belongesTo = ['Categoria'];
   
   public $belongsTo = array(
        'Categoria' => array(
            'className' => 'Categoria',
            'foreignKey' => 'id'
        )
    );
//   public function beforeSave($options = array())
//{
//       pr ($this->data);
//       exit();
//    if(!empty($this->data['Post']['imagem'])) {
//        //$this->data['Post']['imagem'] = $this->upload($this->data['Post']['imagem']);
//         $this->upload($this->request->data['Post']['imagem']);
//    } else {
//        unset($this->data['Post']['imagem']);
//    }
//}
   
}

