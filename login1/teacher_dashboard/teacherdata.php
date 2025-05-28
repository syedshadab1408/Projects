<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="teacherdata.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Top Navigation Bar -->
    <header class="top-bar">
        <div class="top-bar-left">
            <h1>Teacher Dashboard</h1>
        </div>
        <div class="top-bar-right">
            
        
        </div>
    </header>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li onclick="showSection('home')" class="active">🏠 Dashboard</li>
            <li onclick="showSection('timetable')">📅 Timetable</li>
            <li onclick="showSection('attendance')">✅ Attendance</li>
            <li onclick="showSection('assignments')">📝 Assignments</li>
            <li onclick="showSection('profile')">👤 Students</li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Home Section -->
        <section id="home" class="section active">
            <h2>Welcome, Teacher!</h2>
            <p>Track your schedule, manage attendance, and more.</p>
            <div class="dashboard-cards">
                <div class="card">
                    <h3>Today's Classes</h3>
                    <p id="todays-classes">Loading...</p>
                </div>
                <div class="card">
                    <h3>Pending Assignments</h3>
                    <p id="pending-assignments">Loading...</p>
                </div>
                <div class="card">
                    <h3>Average Attendance</h3>
                    <p id="average-attendance">Loading...</p>
                </div>
            </div>
        </section>

        <!-- Timetable Section -->

<section id="timetable" class="section">
    <h2>Weekly Timetable</h2>
    <button class="btn-primary" onclick="openModal('addTimetableModal')">Add Timetable Entry</button>
    <!-- View Timetable Button added here -->
    <button class="btn-primary" onclick="viewTimetable()">View Timetable</button>
    <div class="timetable-cards" id="timetable-container">
        <section id="timetable" class="section">
            <h2>Weekly Timetable</h2>
            <div id="timetable-container" class="timetable-cards">
                <!-- Timetable data will be loaded here dynamically -->
            </div>
        </section>
    </div>
</section>

<section id="attendance" class="section">
    <h2>Mark Attendance</h2>
    <div class="class-selection">
        <label for="classSelect">Select Class:</label>
        <select id="classSelect" onchange="loadAttendanceSheet()">
            <option value="">-- Select Class --</option>
            <option value="classA">Data-Science A</option>
            <option value="classB">CSE A</option>
            <option value="classC">CSE C</option>
        </select>
    </div>
    
    <!-- Date Picker -->
    <div class="date-selection">
        <label for="attendanceDate">Select Date:</label>
        <input type="date" id="attendanceDate" required>
    </div>

    <button class="btn-primary" onclick="loadAttendanceSheet()">Load Attendance</button>

    <div id="attendanceSheet" class="attendance-sheet" style="display: none;">
        <h3>Attendance Sheet</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>USN</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="attendanceTableBody">
                <!-- Dynamic Rows Will Be Inserted Here -->
            </tbody>
        </table>
        <button class="btn-primary" onclick="submitAttendance()">Submit Attendance</button>
    </div>
</section>

    
        <!-- Assignments Section -->
<section id="assignments" class="section">
    <h2>Manage Assignments</h2>
    
    <!-- Add Assignment Button -->
    <button class="btn-primary" onclick="openModal('addAssignmentModal')">Add Assignment</button>
    <!-- Add Assignment Modal -->
<div id="addAssignmentModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addAssignmentModal')">&times;</span>
        <h2>Add Assignment</h2>
        <form id="addAssignmentForm">
            <!-- Class ID selection -->
            <label for="class_id">Class ID:</label>
            <select id="class_id" required>
                <option value="classA">Data-Science A</option>
                <option value="classB">CSE A</option>
                <option value="classC">CSE C</option>
            </select>

            <!-- Assignment Title -->
            <label for="assignmentTitle">Title:</label>
            <input type="text" id="assignmentTitle" required>
            
            <!-- Assignment Description -->
            <label for="assignmentDescription">Description:</label>
            <textarea id="assignmentDescription" required></textarea>
            
            <!-- Assignment Due Date -->
            <label for="assignmentDeadline">Due Date:</label>
            <input type="date" id="assignmentDeadline" required>
            
            <button type="button" onclick="addAssignment()">Add Assignment</button>

        </form>
    </div>
</div>

    
    <!-- View Assignment Button -->
    <button class="btn-primary" onclick="viewAssignments()">View Assignments</button>
    
    <div class="assignment-progress">
        <canvas id="assignmentChart"></canvas>
    </div>
</section>

        

        <!-- Profile Section -->
    
<section id="profile" class="section">
    <h2>Students</h2>
    <button class="btn-primary" onclick="openModal('addStudentModal')">Add Student</button>
    <button class="btn-primary" onclick="viewStudents()">View Students</button> <!-- View Students Button -->
    <!-- <div class="profile-card">
        <img src="profile.jpg" alt="Profile Photo" id="profile-image">
        <div>
            <p><strong>Name:</strong> <span id="profile-name">Loading...</span></p>
            <p><strong>Email:</strong> <span id="profile-email">Loading...</span></p>
            <p><strong>Subject:</strong> <span id="profile-subject">Loading...</span></p>
        </div>
    </div> -->
</section>

    </main>

    <!-- Modals -->
    <div id="addStudentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addStudentModal')">&times;</span>
            <h2>Add Student</h2>
            <form id="addStudentForm">
            <label for="studentName">Name:</label>
<input type="text" id="studentName" required>

<label for="studentUSN">USN:</label>
<input type="text" id="studentUSN" required>

<button type="button" onclick="addStudent()">Add Student</button>

            </form>
        </div>
    </div>

    <div id="addTimetableModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addTimetableModal')">&times;</span>
            <h2>Add Timetable Entry</h2>
            <form id="addTimetableForm">
                <label for="day">Day:</label>
                <input type="text" id="day" required>
                <label for="timeSlot">Time Slot:</label>
                <input type="text" id="timeSlot" required>
                <label for="subject">Subject:</label>
                <input type="text" id="subject" required>
                <button type="button" onclick="addTimetable()">Add Entry</button>
            </form>
        </div>
    </div>

    <div id="addClassModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addClassModal')">&times;</span>
            <h2>Add Class</h2>
            <form id="addClassForm">
                <label for="className">Class Name:</label>
                <input type="text" id="className" required>
                <button type="button" onclick="addClass()">Add Class</button>
            </form>
        </div>
    </div>

    <script src="teacherdata.js"></script>
</body>
</html>








