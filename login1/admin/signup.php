<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Page</title>
    <link rel="stylesheet" href="signupstyle.css">
</head>
<body>
    <div class="signup-container">
        <h1>Create an Account</h1>
        <form action="#">
            <label for="name">Full Name:</label>
            <input type="text" id="name" placeholder="Enter your full name" required><br>

            <label for="email">Email Address:</label>
            <input type="email" id="email" placeholder="Enter your email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" placeholder="Enter a secure password" required><br>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" placeholder="Re-enter your password" required><br>
            <p id="error-message" style="color: red; font-size: 14px; display: none;">Passwords do not match!</p>
            <button type="submit">Sign Up</button>
            <p class="signin">Already have an acount ? <a href="student_login.html">Signin</a> </p>
            
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
