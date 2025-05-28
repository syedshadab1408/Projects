<?php
// view_students.php
include('db.php');

// Get all students from the database
$query = "SELECT * FROM students";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Start of table and CSS
    echo '
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:nth-child(odd) {
            background-color: #f1f1f1;
        }
        tr:hover {
            background-color: #ddd;
        }
        .table-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .no-data {
            text-align: center;
            font-size: 18px;
            color: #ff0000;
            margin-top: 20px;
        }
    </style>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>USN</th>
                </tr>
            </thead>
            <tbody>';
    
    // Fetching student data from the database and displaying it in rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['usn']}</td>
              </tr>";
    }
    
    echo '</tbody>
    </table>
    </div>';
} else {
    echo '<div class="no-data">No students found.</div>';
}

$conn->close();
?>
