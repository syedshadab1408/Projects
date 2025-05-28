<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $setting_name = $_POST['setting_name'];
    $setting_value = $_POST['setting_value'];

    $sql = "INSERT INTO settings (setting_name, setting_value) VALUES ('$setting_name', '$setting_value')";
    if ($conn->query($sql) === TRUE) {
        echo "Setting updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Settings</title>
</head>
<body>
    <h1>Settings</h1>
    <form action="" method="POST">
        <label for="setting_name">Setting Name:</label>
        <input type="text" name="setting_name" required><br>
        <label for="setting_value">Setting Value:</label>
        <input type="text" name="setting_value" required><br>
        <button type="submit">Update Setting</button>
    </form>
</body>
</html>
