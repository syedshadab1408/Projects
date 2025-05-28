<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $subject = $_POST['subject'];

    $sql = "INSERT INTO teachers (name, subject) VALUES ('$name', '$subject')";
    if ($conn->query($sql) === TRUE) {
        echo "New teacher added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Teacher</title>
</head>
<body>
    <h1>Add Teacher</h1>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="subject">Subject:</label>
        <input type="text" name="subject" required><br>
        <button type="submit">Add Teacher</button>
    </form>
</body>
</html>
