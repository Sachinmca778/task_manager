<h2>Books</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book): ?>
    <tr>
        <td><?php echo $book['Book']['id']; ?></td>
        <td><?php echo $book['Book']['title']; ?></td>
        <td><?php echo $book['Book']['author']; ?></td>
        <td><?php echo $book['Book']['genre']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $book['Book']['id'])); ?>
            <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $book['Book']['id']), array('confirm' => 'Are you sure?')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Html->link('Add Book', array('action' => 'add')); ?>