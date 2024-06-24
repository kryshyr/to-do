<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .todo-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .todo-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .todo-container input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        .todo-container button {
            padding: 10px;
            border: none;
            background-color: #000000;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer;
        }

        .todo-container ul {
            list-style: none;
            padding: 0;
        }

        .todo-container li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .todo-container li:last-child {
            border-bottom: none;
        }

        .todo-container li input[type="checkbox"] {
            margin-right: 10px;
        }

        .todo-container li button {
            border: none;
            background: none;
            cursor: pointer;
            color: #ff0000;
        }

        .todo-container li span {
            flex-grow: 1;
        }
    </style>

</head>

<body>
    <div class="todo-container">
        <h1>Todo List</h1>
        <form id="addTaskForm" method="post" action="<?= base_url('/todo/add'); ?>">
            <div class="form-group">
                <input type="text" name="task" placeholder="Add a new task" required>
                <button type="submit">Add</button>
            </div>
        </form>

        <ul id="todoList">
            <?php
            // Separate tasks into two arrays: completed and not completed
            $completedTasks = [];
            $notCompletedTasks = [];
            // iterate over each tasks in the $tasks array
            foreach ($tasks as $task) {
                if ($task['is_done']) {
                    $completedTasks[] = $task;
                } else {
                    $notCompletedTasks[] = $task;
                }
            }
            ?>

            <!-- Display ongoing tasks first in ascending order of updated_at -->
            <?php foreach ($notCompletedTasks as $task): ?>
                <!-- to render each task as a list item -->
                <li>
                    <!-- check if the task is already done or is set to done-->
                    <input type="checkbox" <?= $task['is_done'] ? 'checked' : '' ?>
                        onclick="window.location.href='<?= base_url('todo/toggle/' . $task['id']); ?>'">
                    <span><?= $task['task'] ?></span>
                    <a href="<?= base_url('todo/edit/' . $task['id']); ?>">✏️</a>
                    <button onclick="window.location.href='<?= base_url('todo/delete/' . $task['id']); ?>'">🗑️</button>
                </li>
            <?php endforeach; ?>

            <!-- Display completed tasks at the bottom -->
            <?php foreach ($completedTasks as $task): ?>
                <li>
                    <input type="checkbox" <?= $task['is_done'] ? 'checked' : '' ?>
                        onclick="window.location.href='<?= base_url('todo/toggle/' . $task['id']); ?>'">
                    <span style="text-decoration: line-through;"><?= $task['task'] ?></span>
                    <a href="<?= base_url('todo/edit/' . $task['id']); ?>">✏️</a>
                    <button onclick="window.location.href='<?= base_url('todo/delete/' . $task['id']); ?>'">🗑️</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>