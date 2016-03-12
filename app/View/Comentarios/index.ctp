

<table>
    <tr>
        <th>Id</th>
        <th>Post</th>
        <th>Nome</th>
        <th>Email</th>
        <th>corpo</th>
        <th>Situação</th>
        <th>Ações</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($comentarios as $comentario): ?>
    
    <?php //pr($comentario['Post']['titulo']) ?>
    
    <tr>
        <td><?php echo $comentario['Comentario']['id']; ?></td>
        <td>
            <?php echo $comentario['Post']['titulo']; ?> 
           
        </td>
        <td>
            <?php echo $comentario['Comentario']['nome']; ?> 
           
        </td>
        <td><?php echo $comentario['Comentario']['email']; ?></td>
        <td><?php echo $comentario['Comentario']['corpo']; ?></td>
        <td><?php  
        
/* @var $comentario type */
        if ( $comentario['Comentario']['ativo'] === true) {
                 echo "Ativo" ;    
        }else {
                echo "Bloqueado" ;   
        }
        
        
        
        ?></td>
        <td><?php echo $this->Html->link('Ativar',
        array('controller' => 'Comentarios', 'action' => 'ativar', $comentario['Comentario']['id'])); ?> / <?php echo $this->Html->link('Desativar',
        array('controller' => 'Comentarios', 'action' => 'desativar', $comentario['Comentario']['id'])); ?>/ <?php echo $this->Html->link('Remover',
        array('controller' => 'Comentarios', 'action' => 'delete', $comentario['Comentario']['id'])); ?></td>
        
    </tr>
    <?php endforeach; ?>
    <?php unset($comentario); ?>
</table>