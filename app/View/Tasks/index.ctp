
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
<!-- <link rel="stylesheet" href="style.css" > -->
<!-- Tasks Table -->
<!-- <link href="<?php echo $this->Html->css('custom'); ?>" rel="stylesheet" > -->

<!-- <?php echo $this->Paginator->prev('<<prev'); ?>
<?php echo $this->Paginator->numbers(); ?>
<?php echo $this->Paginator->next('Next >>'); ?> -->

<!-- 
<?php echo $this->Form->create('Task', array('controller' => 'Task', 'url' => 'search')); ?>
        <div class="form-group">
            <?php echo $this->Form->input('search', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Search...')); ?>
        </div>
        <?php echo $this->Form->submit('Search', array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>
        <ul id="search-suggestions"></ul> -->

        <?php echo $this->Form->create('Task', array('controller'  => 'Task', 'url' => 'search' )); ?>
    <?php echo $this->Form->input('search', array('id' => 'search', 'placeholder' => 'Search tasks')); ?>
    <?php echo $this->Form->submit('Search'); ?>
<?php echo $this->Form->end(); ?>

<ul id="search-suggestions"></ul>
<h2>Tasks</h2>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th class='title'>Title</th>
            <th>Description</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= $task['Task']['title'] ?></td>
            <td><?= $task['Task']['description'] ?></td>
            <td><?= $task['Task']['created'] ?></td>
            <!-- <td>
                <a href="/tasks/view/<?= $task['Task']['id'] ?>" class="btn btn-info btn-sm" ></style>>View</a>
                <a href="/tasks/edit/<?= $task['Task']['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/tasks/delete/<?= $task['Task']['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
            </td> -->
            <td>
            <?php echo $this->Html->link('View', array('action' => 'view', $task['Task']['id']), array('class' => 'btn btn-info btn-sm')); ?>
<?php echo $this->Html->link('Edit', array('action' => 'edit', $task['Task']['id']), array('class' => 'btn btn-warning btn-sm')); ?>
<?php echo $this->Html->link('Delete', array('action' => 'delete', $task['Task']['id']), array('class' => 'btn btn-danger btn-sm', 'confirm' => 'Are you sure?')); ?>
</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- <a href="/tasks/add" class="btn btn-primary">Add Task</a> -->
<?php echo $this->Html->link('Add Task', array('controller' => 'tasks', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>

<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> -->

<?php echo $this->Paginator->prev('<< Prev'); ?>
<?php echo $this->Paginator->numbers(); ?>
<?php echo $this->Paginator->next('Next >>'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- <script>
    document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const searchSuggestions = document.getElementById('search-suggestions');
    console.log(searchInput);
    // Event listener for input changes
    searchInput.addEventListener('input', async () => {
        const keyword = searchInput.value;

        if (keyword.length >= 1) {
            try {
                const response = await fetch(`http://localhost/cake/tasks/searchSuggestions?keyword=${encodeURIComponent(keyword)}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }

                const suggestions = await response.json();
                updateSuggestions(suggestions);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        } else {
            clearSuggestions();
        }
    });

    // Event delegation for li click (since li elements are generated dynamically)
    searchSuggestions.addEventListener('click', (event) => {
        if (event.target.tagName === 'LI') {
            searchInput.value = event.target.textContent.trim();
        }
    });

    function updateSuggestions(suggestions) {
        searchSuggestions.innerHTML = ''; // Clear previous suggestions
        suggestions.forEach(suggestion => {
            const li = document.createElement('li');
            li.textContent = suggestion;
            searchSuggestions.appendChild(li);
        });
    }

    function clearSuggestions() {
        searchSuggestions.innerHTML = ''; // Clear suggestions
    }
});

</script> -->

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const searchSuggestions = document.getElementById('search-suggestions');
    // console.log(searchInput);

    // Event listener for input changes
    searchInput.addEventListener('input', async () => {
        const keyword = searchInput.value;
console.log(keyword);
        if (keyword.length >= 1) {
            try {
                const response = await fetch(`/cake/tasks/searchSuggestions?keyword=${encodeURIComponent(keyword)}`);
                console.log(response);
                if (!response.ok) {

                    throw new Error('Network response was not ok.');
                }


                const suggestions = await response.json();
                updateSuggestions(suggestions);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        } else {
            clearSuggestions();
        }
    });

    // Event delegation for li click (since li elements are generated dynamically)
    searchSuggestions.addEventListener('click', (event) => {
        if (event.target.tagName === 'LI') {
            searchInput.value = event.target.textContent.trim();
            clearSuggestions();
        }
    });

    function updateSuggestions(suggestions) {
        searchSuggestions.innerHTML = ''; // Clear previous suggestions
        suggestions.forEach(suggestion => {
            const li = document.createElement('li');
            li.textContent = suggestion;
            searchSuggestions.appendChild(li);
        });
    }

    function clearSuggestions() {
        searchSuggestions.innerHTML = ''; // Clear suggestions
    }
});

</script>
<button id="load-tasks">Load Tasks</button>
<div id="task-list"></div>

<!-- <div class="tasks index">
    <h2><?php echo __('Tasks'); ?></h2>
    <div id="task-list"></div>
</div> -->