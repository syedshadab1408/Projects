

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div>
        <h1>Admin Login</h1>
        <form id="loginForm" action="#" method="POST" onsubmit="return validateForm()">
            <label for="Username">Name:</label>
            <input type="text" id="Username" required><br>

            <label for="Password">Password:</label>
            <input type="password" id="Password" required><br>

            <a href="forgot.html">Forgot Password</a><br><br>

            <button type="submit" class="button">Login</button>
            <p id="error-message" class="error-message"></p>
        </form>
    </div>

    <script>
        function validateForm() {
            // Get the values of the username and password fields
            var username = document.getElementById("Username").value;
            var password = document.getElementById("Password").value;

            // Get the error message element
            var errorMessage = document.getElementById("error-message");

            // Clear previous error message
            errorMessage.textContent = "";

            // Check if the username and password fields are empty
            if (username === "" || password === "") {
                errorMessage.textContent = "Username and password are required!";
                return false; // Prevent form submission
            }

            // You can add specific username and password logic here
            // Example: correct username = 'admin' and correct password = 'password123'
            if (username === "admin" && password === "password123") {
                // Redirect to admin home page
                window.location.href = "adminhome.php"; // Change this to your admin home page
                return false; // Prevent form submission since we're redirecting
            } else {
                errorMessage.textContent = "Incorrect username or password.";
                return false; // Prevent form submission
            }
        }
    </script>
</body>
</html>
