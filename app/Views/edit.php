<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
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
        .edit-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .edit-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .edit-container input[type="text"] {
            width: calc(100% - 50px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .edit-container button {
            padding: 10px;
            border: none;
            background-color: #000000;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <h1>Edit Task</h1>
        <form method="post" action="<?= base_url('todo/update/'.$task['id']); ?>">
            <input type="text" name="task" value="<?= $task['task'] ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
