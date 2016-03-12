<?php
App::uses('Component', 'Controller');

class UploadComponent extends Component {
    public $max_files = 3;
    
    
    public function upload($data = null){
        if(!empty($data)){
            if(count($data) > $this->max_files){
                throw new NotFoundException("Error");
            }
            echo pr($data);
            exit();
            foreach ($data as $file)
            {
                $filename = $file['name'];
                $file_tmp_name = $file['tmp_name'];
                //$dir = WWW_ROOT .'img'. DS .'upload';
                $dir = WWW_ROOT.'img'.DS;
                $allowed = array('png','jpg','jpeg','bmp');
                if (!in_array(substr(strrchr($filename, '.'),1), $allowed)) {
                    throw  new NotFoundException("error",1);
                }elseif(is_uploaded_file($file_tmp_name)){
                    move_uploaded_file($file_tmp_name, $dir.DS.String::uuid().'-'.filename);
                }
            }
        }
    }
//    public function upload($imagem = array(), $dir = 'img')
//    {
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
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

