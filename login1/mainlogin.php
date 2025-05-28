<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h1>Student Management System</h1>
        <h2>Login</h2>
        <div class="login-options">
            <button onclick="location.href='taskmanager/login.php'"> taskmanager Login</button>
            <button onclick="location.href='admin/admin_login.php'">Admin Login</button>
            <button onclick="location.href='teacher_dashboard/teacher_login.php'">Teacher Login</button>
            <button onclick="location.href='student/student_login.php'">Student Login</button>
        </div>
    </div>
</body>
</html>
