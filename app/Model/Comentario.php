<?php

class Comentario extends AppModel {
    public $validate = array(
        'nome' => 'notEmpty',
        'email' => 'notEmpty',
        'corpo' => 'notEmpty'
        );
    public $belongesTo = ['Post'];
}
