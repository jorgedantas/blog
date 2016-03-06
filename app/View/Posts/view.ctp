<h1><?php echo h($post['Post']['titulo']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['corpo']); ?></p>

<div id="comentarios">
    <ol>
    <?php foreach ($post['Comentario'] as $comentario): ?> 
    <li>
    <div>Nome : <?= $comentario['nome'] ?> </div>
    <div>Email : <?= $comentario['email'] ?></div>
    <div>Comentário : <?= $comentario['corpo'] ?></div>
    </li>
    
    <?php endforeach ?>
    </ol>
</div>


<?php 

echo $this->Form->create('Comentario', [
    'url' => ['controller' => 'Comentarios', 'action' => 'add']
]);

echo $this->Form->input('nome');
echo $this->Form->input('email');
echo $this->Form->input('corpo');
echo $this->Form->hidden('post_id', array('value' => $post['Post']['id']));
echo $this->Form->end('Enviar');

?>