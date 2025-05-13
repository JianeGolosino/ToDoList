<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $task = $_POST['task'];
    $due_date = $_POST['due_date'];

    $stmt = $conn->prepare("INSERT INTO tasks (name, task, due_date, status) VALUES (?, ?, ?, 'pending')");
    $stmt->bind_param("sss", $name, $task, $due_date);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

    <div class="container">
        <h2>Add New Task</h2>
        <form action="" method="POST" class="add-form">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="task">Task:</label>
            <input type="text" name="task" id="task">

            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date">

            <input type="submit" value="Add Task" class="add-btn">
        </form>
    </div>

</body>
</html>
