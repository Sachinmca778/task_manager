<!-- app/View/Tasks/delete.ctp -->

<h2>Delete Task</h2>
<p>Are you sure you want to delete this task?</p>

<?php echo $this->Form->postLink(
    'Delete',
    array('action' => 'delete', $task['Task']['id']),
    array('confirm' => 'Are you sure? This action cannot be undone.')
); ?>
