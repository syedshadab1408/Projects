<?php
// search_student.php

// Database connection (use your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher_dashboard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the student name from the query parameter
$studentName = isset($_GET['name']) ? $_GET['name'] : '';

// Prepare the SQL query
$query = "SELECT name, usn, attendance_status FROM students WHERE name LIKE ?";
$stmt = $conn->prepare($query);
$searchTerm = "%$studentName%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Check if any student was found
if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
    echo json_encode([
        'status' => 'success',
        'student' => $student
    ]);
} else {
    // If no student is found
    echo json_encode([
        'status' => 'error',
        'message' => 'No student found'
    ]);
}

$stmt->close();
$conn->close();
?>
