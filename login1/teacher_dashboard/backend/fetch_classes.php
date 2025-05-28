<?php
// Assuming you are using a database like MySQL
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

// Query to fetch the classes added by the teacher
$sql = "SELECT id, class_name FROM classes";
$result = $conn->query($sql);

$classes = [];

if ($result->num_rows > 0) {
    // Fetch all classes
    while ($row = $result->fetch_assoc()) {
        $classes[] = $row;  // Store the entire row (id and class_name)
    }
} else {
    $classes = [];
}

$conn->close();

// Output HTML and CSS
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
    <style>
        /* Table Styling */
        .class-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .class-table th, .class-table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .class-table th {
            background-color: #4CAF50; /* Green background for header */
            color: white; /* White text for header */
        }

        .class-table tr:nth-child(even) {
            background-color: #f2f2f2; /* Light gray for even rows */
        }

        .class-table tr:nth-child(odd) {
            background-color: #fff; /* White background for odd rows */
        }

        .class-table tr:hover {
            background-color: #f1f1f1; /* Light gray when hovered */
        }

        /* Paragraph Styling */
        p {
            font-size: 16px;
            color: #333;
        }

        /* Add a color for the table header */
        .class-table td {
            color: #333; /* Dark text color for cells */
        }

        /* Styling for the table container */
        .table-container {
            margin: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>

<?php
// Check if there are any classes, and generate a table
if (count($classes) > 0) {
    echo '<div class="table-container">
            <table class="class-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class Name</th>
                </tr>
            </thead>
            <tbody>';

    // Display each class in a row
    foreach ($classes as $class) {
        echo '<tr>
                <td>' . htmlspecialchars($class['id']) . '</td>
                <td>' . htmlspecialchars($class['class_name']) . '</td>
              </tr>';
    }

    echo '</tbody></table>
        </div>';
} else {
    echo '<p>No classes found.</p>';
}
?>

</body>
</html>
