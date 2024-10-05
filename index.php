<?php
include 'db_connect.php';

// Fetch all tasks
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Link to CSS -->
</head>
<body>

<h1>Task List</h1>

<!-- Link to Add Task -->
<p><a href="add_task.php">Add New Task</a></p>

<!-- Display tasks -->
<?php
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Task ID</th><th>Title</th><th>Status</th><th>Actions</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>
                <a href='delete_task.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this task?\")'>Delete</a> |
                <a href='update_task.php?id=" . $row["id"] . "'>Mark as Completed</a>
              </td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No tasks found";
}

$conn->close();
?>

</body>
</html>
