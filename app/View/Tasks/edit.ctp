<!-- app/View/Task/edit.ctp -->
<h2>Edit Task</h2>
<?php
echo $this->Form->create('Task');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('title');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->end('Save');
?>
