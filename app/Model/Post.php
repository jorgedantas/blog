<?php

class Post extends AppModel {
    public $validate = array(
        'titulo' => 'notEmpty'
    );
    
   public $hasMany = ['Comentario'];
   public $belongesTo = ['Categoria'];
}

