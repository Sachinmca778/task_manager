<!-- app/View/Task/view.ctp -->
<h2><?php echo h($task['Task']['title']); ?></h2>
<p><?php echo h($task['Task']['description']); ?></p>
<p>Created: <?php echo h($task['Task']['created']); ?></p>
<p>Modified: <?php echo h($task['Task']['modified']); ?></p>
<?php echo $this->Html->link('Edit', array('action' => 'edit', $task['Task']['id'])); ?>
<?php echo $this->Html->link('Delete', array('action' => 'delete', $task['Task']['id']), array('confirm' => 'Are you sure?')); ?>
