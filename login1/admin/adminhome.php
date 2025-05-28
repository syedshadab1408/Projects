
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Admin Dashboard</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Admin Dashboard</h1>
            <nav class="nav">
                <ul>
                    <li><a href="#Dashboard">Dashboard</a></li>
                    <li><a href="#students">Students</a></li>
                    <li><a href="#teachers">Teachers</a></li>
                    <li><a href="fee.php">Fee collection</a></li>
                    <li><a href="setting.php">Settings</a></li>
                </ul>
            </nav>
        </header>

        <main class="main-content">
            <section id="dashboard" class="section">
                <h2>Overview</h2>
                <div class="dashboard-stats">
                    <div class="stat">
                        <h3>Total Students</h3>
                        <p id="total-students">500</p>
                    </div>
                    <div class="stat">
                        <h3>Total Teachers</h3>
                        <p id="total-teachers">100</p>
                    </div>
                    <div class="stat">
                        <h3>Total Admins</h3>
                        <p id="total-admins">20</p>
                    </div>
                </div>
            </section>

            <section id="students" class="section">
                <h2>Students Management</h2>
                <button class ="btn" onclick="location.href='student.php'">Add student</button>
                <button class="btn">View All Students</button>
            </section>

            <section id="teachers" class="section">
                <h2>Teachers Management</h2>
                <button class ="btn" onclick="location.href='../teacher_dashboard/teacher.php'">Add teacher</button>
                <button class="btn">View All Teachers</button>
            </section>

            <section id="admins" class="section">
                <h2>Admin Management</h2>
                <button class="btn">Add Admin</button>
                <button class="btn">View All Admins</button>
            </section>
        </main>

        <footer class="footer">
            <p>&copy; 2024 Advanced Student Management System</p>
        </footer>
    </div>
    <script src="script.js" defer></script>

</body>
</html>
