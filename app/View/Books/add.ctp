<h2>Add Book</h2>
<?php
echo $this->Form->create('Book');
echo $this->Form->input('title');
echo $this->Form->input('author');
echo $this->Form->input('genre');
echo $this->Form->end('Save');
?>