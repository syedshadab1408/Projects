<?php
// Database connection settings
$servername = "localhost";
$username = "root";  // Default XAMPP username
$password = "";      // Default XAMPP password (empty)
$dbname = "teacher_dashboard"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch assignments
$sql = "SELECT * FROM assignments"; // Replace 'assignments' with your table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Adding CSS for styling the table
    echo "<style>
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #ddd;
            }
            h1 {
                text-align: center;
                font-family: Arial, sans-serif;
                color: #333;
            }
          </style>";

    echo "<h1>Assignment List</h1>";
    
    // Start the main table
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Class ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>
            </tr>";
    
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["class_id"] . "</td>
                <td>" . $row["title"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . $row["deadline"] . "</td>
              </tr>";
    }

    // Close the table
    echo "</table>";
} else {
    echo "<h1>No assignments found.</h1>";
}

$conn->close();
?>
