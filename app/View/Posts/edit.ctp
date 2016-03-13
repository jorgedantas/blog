
<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Html->script(array('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js','imgadmin/admin.js','/imgadmin/js/ckeditor/ckeditor.js'));
echo $this->Form->input('titulo');
echo $this->Form->input('categoria_id', array('options' => $categorias));
//echo $this->Form->input('corpo', array('rows' => '3'));
echo $this->Form->textarea('corpo',array('class'=>'ckeditor'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>