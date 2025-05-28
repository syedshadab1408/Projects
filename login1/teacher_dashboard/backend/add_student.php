<?php
// add_student.php
include('db.php');

// Get the POST data
$data = json_decode(file_get_contents("php://input"), true);

// Check if data is valid
if (isset($data['name']) && isset($data['usn'])) {
    $name = $conn->real_escape_string($data['name']);
    $usn = $conn->real_escape_string($data['usn']);

    // Insert student into the database
    $query = "INSERT INTO students (name, usn) VALUES ('$name', '$usn')";
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Student added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
}

$conn->close();
?>
