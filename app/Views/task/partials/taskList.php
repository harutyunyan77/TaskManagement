<?php foreach ($tasks as $task): ?>
    <li>
        <div class="checkboxText">
            <!-- SVG for checked state -->
            <img
                src="./assets/checked.svg"
                data-id="<?= $task['id'] ?>"
                class="checkboxImage <?= $task['completed'] ? 'checked' : '' ?>"
                alt="Checked"
            >
            <!-- Text for the task -->
            <span class="taskText <?= $task['completed'] ? 'completed' : '' ?>">
                <?= htmlspecialchars($task['name']) ?>
            </span>
        </div>
        <!-- SVG for delete -->
        <img
            src="./assets/trash.svg"
            data-id="<?= $task['id'] ?>"
            class="deleteTaskImage"
            alt="Delete"
        >
    </li>
<?php endforeach; ?>

