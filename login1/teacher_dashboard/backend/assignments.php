<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "teacher_dashboard";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'addAssignment') {
        $class_id = $_POST['class_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $deadline = $_POST['deadline'];

        $stmt = $conn->prepare("INSERT INTO assignments (class_id, title, description, deadline) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $class_id, $title, $description, $deadline);
        if ($stmt->execute()) {
            echo "Assignment added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } elseif ($action === 'getAssignments') {
        $result = $conn->query("SELECT * FROM assignments");
        $assignments = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($assignments);
    }
}

$conn->close();
?>
