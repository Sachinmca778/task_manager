<!-- search.ctp -->

<!-- <?php
    echo $this->Form->create(null, ['url' => ['controller' => 'Task', 'action' => 'search'], 'class' => 'my-3']);
    echo $this->Form->input('search', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Search...']);
    echo $this->Form->button('Search', ['class' => 'btn btn-primary']);
    echo $this->Form->end();
?> -->

<h2>Search Results</h2>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= h($task['Task']['title']) ?></td>
            <td><?= h($task['Task']['description']) ?></td>
            <td><?= h($task['Task']['created']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
