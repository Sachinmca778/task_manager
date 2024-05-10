
$(document).ready(function() {
    $('#load-tasks').click(function() {
        $.ajax({
            url: 'http://localhost/cake/tasks/index',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var taskList = $('#task-list');
                taskList.empty(); // Clear the list

                // Loop through the tasks and add them to the list
                $.each(data, function(index, task) {
                    taskList.append('<p>' + task.Task.title + '</p>');
                });
            }
        });
    });
});