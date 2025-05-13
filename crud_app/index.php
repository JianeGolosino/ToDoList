<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

    <h2>To-do List</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Task</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tasks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <form action='edit_task.php' method='POST'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <td>" . $row['id'] . "</td>
                            <td><input type='text' name='name' value='" . $row['name'] . "'></td>
                            <td><input type='text' name='task' value='" . $row['task'] . "'></td>
                            <td><input type='date' name='due_date' value='" . $row['due_date'] . "'></td>
                            <td>
                                <select name='status'>
                                    <option value='pending' " . ($row['status'] === 'pending' ? 'selected' : '') . ">Pending</option>
                                    <option value='in progress' " . ($row['status'] === 'in progress' ? 'selected' : '') . ">In Progress</option>
                                    <option value='done' " . ($row['status'] === 'done' ? 'selected' : '') . ">Done</option>
                                </select>
                            </td>
                            <td>
                                <button type='submit' class='btn'>Save</button>
                                <a href='delete.php?id=" . $row['id'] . "' class='btn-delete'>Delete</a>
                            </td>
                        </form>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No tasks found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Floating Add Button -->
    <a href="add.php" id="add-task-btn">Add New Task</a>

    <!-- Cat gif for animation -->
    <img id="cat" src="images/cat.gif" alt="Walking Cat">

</body>
</html>
