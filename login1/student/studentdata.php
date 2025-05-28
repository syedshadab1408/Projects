<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="studentdata.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <h2>Student Portal</h2>
        <ul>
            <li onclick="showSection('home')">🏠 Home</li>
            <li onclick="showSection('timetable')">📅 Timetable</li>
            <li onclick="showSection('assignments')">📝 Assignments</li>
            <li onclick="showSection('marks')">📊 Marks</li>
            <li onclick="showSection('profile')">👤 Profile</li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Home Section -->
        <section id="home" class="section active">
            <h1>Welcome, Student!</h1>
            <p>Stay organized and achieve your goals.</p>
            <div class="overview-cards">
                <div class="card">
                    <h3>Upcoming Classes</h3>
                    <p>3 classes today</p>
                </div>
                <div class="card">
                    <h3>Pending Assignments</h3>
                    <p>2 assignments due</p>
                </div>
                <div class="card">
                    <h3>Average Marks</h3>
                    <p>85%</p>
                </div>
            </div>
        </section>

        <section id="timetable" class="section">
    <h2>Your Timetable</h2>
    <table class="timetable" border="1">
        <thead>
            <tr>
                <th>Day</th>
                <th>9:00 AM to 9:55 AM</th>
                <th>9:55 AM to 10:50 AM</th>
                <th>10:50 AM to 11:00 AM</th>
                <th>11:00 AM to 11:55 AM</th>
                <th>11:55 AM to 12:50 PM</th>
                <th>12:50 PM to 2:15 PM</th>
                <th>2:15 PM to 3:10 PM</th>
                <th>3:10 PM to 4:05 PM</th>
                <th>4:05 PM to 5:00 PM</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Monday</td>
                <td>-</td>
                <td>RM</td>
                <td>-</td>
                <td>SE</td>
                <td>CN</td>
                <td>-</td>
                <td>TC</td>
                <td>ES</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Tuesday</td>
                <td>Mini Project Lab</td>
                <td>RM</td>
                <td>-</td>
                <td>SE</td>
                <td>TC</td>
                <td>-</td>
                <td>RM</td>
                <td>ES</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Wednesday</td>
                <td>SE</td>
                <td>TC</td>
                <td>-</td>
                <td>Data Visualization Lab</td>
                <td></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Thursday</td>
                <td>TC</td>
                <td>DWH</td>
                <td>-</td>
                <td>CN</td>
                <td>DWH</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Friday</td>
                <td>RM</td>
                <td>DWH</td>
                <td>-</td>
                <td>DWH</td>
                <td>CN</td>
                <td>-</td>
                <td>CN Lab</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Saturday</td>
                <td>CN</td>
                <td>SE</td>
                <td>-</td>
                <td>TC</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>
</section>

<section id="subject-handling" class="section">
    <h2>Subject Handling Details</h2>
    <table class="subject-details" border="1">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Subject Code</th>
                <th>Staff Handling</th>
                <th>Subject</th>
                <th>Subject Code</th>
                <th>Staff Handling</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>SE</td>
                <td>BCS501</td>
                <td>Dr T Hanumanthreddy</td>
                <td>ES</td>
                <td>BCS508</td>
                <td>Manohar</td>
            </tr>
            <tr>
                <td>CN</td>
                <td>BCS502</td>
                <td>C K Srinivas</td>
                <td>RM</td>
                <td>BRMK557</td>
                <td>Y Mallikarjun</td>
            </tr>
            <tr>
                <td>TC</td>
                <td>BCS503</td>
                <td>Dr K Raghavendra Prasad</td>
                <td>Mini Project</td>
                <td>BCI586</td>
                <td>Dr K Raghavendra Prasad</td>
            </tr>
            <tr>
                <td>DV Lab</td>
                <td>BAIL504</td>
                <td>R P Rajeshwari</td>
                <td>DWH</td>
                <td>BAD515B</td>
                <td>Manamohan</td>
            </tr>
        </tbody>
    </table>
</section>

        <!-- Assignments Section -->
        <section id="assignments" class="section">
            <h2>Your Assignments</h2>
            <div class="assignment-list">
                <div class="assignment-card">
                    <h3>Math Homework</h3>
                    <p>Due: 2024-12-14</p>
                    <p>Solve 20 algebraic problems.</p>
                    <button onclick="markAssignment(this)">Mark as Done</button>
                </div>
                <div class="assignment-card">
                    <h3>Science Experiment</h3>
                    <p>Due: 2024-12-18</p>
                    <p>Prepare a project on electricity.</p>
                    <button onclick="markAssignment(this)">Mark as Done</button>
                </div>
            </div> 
        </section> 

        <!-- Marks Section -->
        <section id="marks" class="section">
            <h2>Marks Overview</h2>
            <canvas id="marksChart"></canvas>
        </section>

        <!-- Profile Section -->
        <section id="profile" class="section">
            <h2>Your Profile</h2>
            <div class="profile">
                <img src="profile-pic.jpg" alt="Student Photo">
                <div>
                    <p><strong>Name:</strong> Jane Doe</p>
                    <p><strong>Email:</strong> jane.doe@student.com</p>
                    <p><strong>Grade:</strong> 10</p>
                    <p><strong>Subjects:</strong> Math, Science, English</p>
                </div>
            </div>
        </section>
    </main>

    <script src="studentdata.js"></script>
</body>
</html>
