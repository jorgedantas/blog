<div>
<ul>
    <h1>Categorias Cadastradas</h1>
<?php foreach ($categorias as $categoria) : ?>
<li>
    <?php 
    
        echo  $categoria['Categoria']['nome'] ; echo "&nbsp; &nbsp;"; echo $this->Html->link('Editar',
array('controller' => 'categorias', 'action' => 'edit', $categoria['Categoria']['id'])); 
        
        ?>
</li>
<?php endforeach ?>
</ul> 
</div>
<br>
<div>
    <h1> &nbsp;Adicionar Categoria</h1>

<?php 
// Error
echo $this->Form->create('Categoria', [
    'url' => ['controller' => 'Categorias', 'action' => 'add']
]);
echo $this->Form->input('nome');
echo $this->Form->end('Criar');


?>
</div>