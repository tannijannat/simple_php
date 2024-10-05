<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tasks (title, description, status) VALUES (?, ?, 'pending')");
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        echo "New task created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect back to index.php after adding the task
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Link to CSS -->
</head>
<body>

<h1>Add New Task</h1>

<form action="add_task.php" method="POST">
    <input type="text" name="title" placeholder="Task title" required>
    <textarea name="description" placeholder="Task description" required></textarea>
    <button type="submit">Add Task</button>
</form>

<p><a href="index.php">Back to Task List</a></p>

</body>
</html>
