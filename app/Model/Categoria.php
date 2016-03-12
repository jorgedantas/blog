<?php

class Categoria extends AppModel {
    public $validate = array(
        'nome' => 'notEmpty'
    );
    
    public $hasMany = ['Post'];
    
}