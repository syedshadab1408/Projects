<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "admin_dashboard";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $studentName = $data['studentName'];
    $course = $data['course'];
    $branch = $data['branch'];
    $semester = $data['semester'];
    $totalFee = $data['totalFee'];

    // Prepare and execute SQL query
    $sql = "INSERT INTO students (student_name, course, branch, semester, total_fee) 
            VALUES ('$studentName', '$course', '$branch', '$semester', '$totalFee')";

    if ($conn->query($sql) === TRUE) {
        echo "Student details saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
