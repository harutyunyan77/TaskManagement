// Adding Task

document.getElementById('addTaskButton').addEventListener('click', function () {
    const taskName = document.getElementById('taskInput').value;

    if (taskName.trim() === '') {
        alert('Please enter a task text.');
        return;
    }

    fetch('/tasks/create', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ name: taskName }),
    }).then(response => response.json())
      .then(data => {
          if (data.success) {
              location.reload();
          } else {
              alert('Failed to add task.');
          }
      });
});

// Setting completed or not

document.querySelectorAll('.checkboxImage').forEach(checkbox => {
    checkbox.addEventListener('click', function () {
        const taskId = this.dataset.id;
        const isChecked = this.classList.contains('checked');

        // Toggle the checked class
        this.classList.toggle('checked');

        // Toggle the completed class on the task text
        const taskText = this.nextElementSibling;
        taskText.classList.toggle('completed');

        // Determine the new completed state
        const completed = isChecked ? 0 : 1;

        // Send the request to update the task completion status
        fetch('/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: taskId, completed: completed }),
        }).then(response => response.json())
          .then(data => {
              if (!data.success) {
                  alert('Failed to update task status.');
              }
          });
    });
});




//Deleting task

document.querySelectorAll('.deleteTaskImage').forEach(img => {
    img.addEventListener('click', function () {
        const taskId = this.dataset.id;

        // Show confirmation dialog
        const confirmDelete = confirm("Are you sure you want to delete this task?");

        // Proceed only if the user confirms
        if (confirmDelete) {
            fetch('/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: taskId }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.closest('li').remove(); 
                } else {
                    alert('Failed to delete task.');
                }
            });
        }
    });
});


