
<h1>Add Post</h1>
<?php
echo $this->Html->script(array('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js','imgadmin/admin.js','/imgadmin/js/ckeditor/ckeditor.js'));
//echo  pr ($categorias);
echo $this->Form->create('Post');

//echo $this->Form->create('Post', array('enctype' => 'multipart/form-data'));
echo $this->Form->input('titulo');
echo $this->Form->input('categoria_id', array('options' => $categorias));
//echo $this->Form->input('corpo', array('rows' => '3'));
echo $this->Form->textarea('corpo',array('class'=>'ckeditor'));
echo $this->Form->hidden('imagem',array('class'=>'img-select'));

//echo $this->Form->input('Post.imagem', array(
//    'type' => 'file'
//));
echo $this->Form->end('Salvar Postagem');
?>