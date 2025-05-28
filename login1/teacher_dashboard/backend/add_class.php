<?php
header('Content-Type: application/json');

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "teacher_dashboard";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Get the POST data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['class_name'])) {
    $class_name = $conn->real_escape_string($data['class_name']);

    // Insert into the database
    $query = "INSERT INTO classes (class_name) VALUES ('$class_name')";
    if ($conn->query($query) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Class added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
}

$conn->close();
?>
