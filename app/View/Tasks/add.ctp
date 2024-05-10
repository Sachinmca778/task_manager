<button><h2>Add Task</h2></button>
<?php
echo $this->Form->create('Task');
echo $this->Form->input('title');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->end('Save');
?>
