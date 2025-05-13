<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE tasks SET status = '$status' WHERE id = $id";
    if ($conn->query($sql)) {
        header('Location: index.php'); // Redirect to the main page
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
