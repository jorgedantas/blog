
<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('titulo');
echo $this->Form->input('Categoria', array('options' => $categorias));
echo $this->Form->input('corpo', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>