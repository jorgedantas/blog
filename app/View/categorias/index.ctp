<ul>
<?php foreach ($categorias as $categoria) : ?>
<li>
    <?= $categoria['Categoria']['nome'] ?>
</li>
<?php endforeach ?>
</ul>
<h1>Categorias</h1>

<?php 
// Error
echo $this->Form->create('Categoria', [
    'url' => ['controller' => 'Categorias', 'action' => 'add']
]);
echo $this->Form->input('nome');
echo $this->Form->end('Criar');


?>