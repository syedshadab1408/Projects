<?php
include 'db.php'; // Database connection file

// Set headers for JSON response
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get raw JSON input
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    // Validate input
    if (!isset($data['class_id']) || !isset($data['date']) || !isset($data['attendance'])) {
        echo json_encode(["error" => "Invalid input data."]);
        exit();
    }

    // Extract data from payload
    $class_id = $data['class_id'];
    $date = $data['date'];
    $attendance_list = $data['attendance'];

    // Prepare query
    $query = "INSERT INTO attendance (student_id, class_id, date, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(["error" => "Failed to prepare query."]);
        exit();
    }

    // Process attendance data
    foreach ($attendance_list as $student) {
        $name = $student['name'];
        $usn = $student['usn'];
        $status = $student['status'];

        // Fetch the student ID using USN (assuming USN is unique in 'students' table)
        $fetch_query = "SELECT id FROM students WHERE usn = ?";
        $fetch_stmt = $conn->prepare($fetch_query);
        $fetch_stmt->bind_param("s", $usn);
        $fetch_stmt->execute();
        $fetch_stmt->bind_result($student_id);
        $fetch_stmt->fetch();
        $fetch_stmt->close();

        // Check if student exists
        if (!$student_id) {
            echo json_encode(["error" => "Student with USN '$usn' not found."]);
            exit();
        }

        // Insert attendance
        $stmt->bind_param("iiss", $student_id, $class_id, $date, $status);
        $stmt->execute();
    }

    // Return success response
    echo json_encode(["message" => "Attendance submitted successfully!"]);
} else {
    // Invalid request method
    echo json_encode(["error" => "Invalid request method."]);
}
?>
