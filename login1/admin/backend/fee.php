<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $amount = $_POST['amount'];
    $paid_date = $_POST['paid_date'];

    $sql = "INSERT INTO fees (student_id, amount, paid_date) VALUES ('$student_id', '$amount', '$paid_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Fee record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch students for the dropdown
$students = $conn->query("SELECT id, name FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fee Collection</title>
</head>
<body>
    <h1>Fee Collection</h1>
    <form action="" method="POST">
        <label for="student_id">Student:</label>
        <select name="student_id" required>
            <?php while ($row = $students->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
        </select><br>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" required><br>
        <label for="paid_date">Paid Date:</label>
        <input type="date" name="paid_date" required><br>
        <button type="submit">Add Fee</button>
    </form>
</body>
</html>
