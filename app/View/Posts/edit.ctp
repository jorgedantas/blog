<?php
echo $this->Form->create('Post');
echo $this->Form->input('titulo');
echo $this->Form->input('categoria_id');
echo $this->Form->input('corpo', array('rows' => '6'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>