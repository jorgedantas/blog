<?php

class Comentario extends AppModel {
   
    
    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Nome é requerido'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Email é requerido'
            )
        ),
        'corpo' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Envie uma mensagem'
                
            )
        )
    );
   // public $belongesTo = ['Post'];
    
     public $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id'
        )
    );
}


