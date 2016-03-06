

<h1 style="float: right;">
    <?php echo $this->Html->link('Nova Postagem',
array('controller' => 'posts', 'action' => 'add')); ?>
   

</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Data Criação</th>
        <th>Ações</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['titulo'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td>
       <span><?php echo $this->Html->link('Editar',
array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])); ?>
                /
        <?php echo $this->Html->link('Excluir',
array('controller' => 'posts', 'action' => 'delete', $post['Post']['id'])); ?></span></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>