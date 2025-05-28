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

if (isset($data['day']) && isset($data['time_slot']) && isset($data['subject'])) {
    $day = $conn->real_escape_string($data['day']);
    $time_slot = $conn->real_escape_string($data['time_slot']);
    $subject = $conn->real_escape_string($data['subject']);

    // Insert into the database
    $query = "INSERT INTO timetable (day, time_slot, subject) VALUES ('$day', '$time_slot', '$subject')";
    if ($conn->query($query) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Timetable entry added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
}

$conn->close();
?>
