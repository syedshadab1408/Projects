<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="setting.css">
</head>
<body>
    <div class="container">
        <h1>Student Management System</h1>

        <!-- Settings Button -->
        <button id="settingsBtn" class="settings-btn">Settings</button>

        <!-- Settings Modal -->
        <div id="settingsModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Settings</h2>
                
                <!-- Course and Branch Management -->
                <h3>Manage Courses and Branches</h3>
                <form id="settingsForm">
                    <label for="newCourse">Add New Course:</label>
                    <input type="text" id="newCourse" placeholder="Enter new course"><br>

                    <label for="newBranch">Add New Branch:</label>
                    <input type="text" id="newBranch" placeholder="Enter new branch"><br>

                    <label for="newSemester">Add New Semester:</label>
                    <input type="text" id="newSemester" placeholder="Enter new semester"><br>

                    <h3>Theme Settings</h3>
                    <label for="themeColor">Choose Background Theme:</label>
                    <select id="themeColor">
                        <option value="default">Default</option>
                        <option value="dark">Dark</option>
                        <option value="light">Light</option>
                    </select><br>

                    <button type="submit" class="btn">Save Settings</button>
                </form>
            </div>
        </div>

        <!-- Your Existing Content: Fee Collection Form, Student/Teacher Management, etc. -->
        <div id="content">
            <!-- Existing content goes here, like fee collection forms, tables for students, etc. -->
        </div>

    </div>

    <script>
        // Settings modal functionality
        var settingsBtn = document.getElementById("settingsBtn");
        var settingsModal = document.getElementById("settingsModal");
        var closeBtn = document.getElementsByClassName("close-btn")[0];

        // Open settings modal
        settingsBtn.onclick = function() {
            settingsModal.style.display = "block";
        }

        // Close settings modal
        closeBtn.onclick = function() {
            settingsModal.style.display = "none";
        }

        // Close settings modal when clicking outside the modal
        window.onclick = function(event) {
            if (event.target == settingsModal) {
                settingsModal.style.display = "none";
            }
        }

        // Handle form submission to save settings
        document.getElementById('settingsForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var newCourse = document.getElementById('newCourse').value;
            var newBranch = document.getElementById('newBranch').value;
            var newSemester = document.getElementById('newSemester').value;
            var themeColor = document.getElementById('themeColor').value;

            // Add new course to course list (you can expand this logic further)
            if (newCourse) {
                var courseSelect = document.getElementById('course');
                var newCourseOption = document.createElement('option');
                newCourseOption.value = newCourse;
                newCourseOption.textContent = newCourse;
                courseSelect.appendChild(newCourseOption);
            }

            // Add new branch to branch list
            if (newBranch) {
                var branchSelect = document.getElementById('branch');
                var newBranchOption = document.createElement('option');
                newBranchOption.value = newBranch;
                newBranchOption.textContent = newBranch;
                branchSelect.appendChild(newBranchOption);
            }

            // Add new semester to semester list
            if (newSemester) {
                var semesterSelect = document.getElementById('semester');
                var newSemesterOption = document.createElement('option');
                newSemesterOption.value = newSemester;
                newSemesterOption.textContent = newSemester;
                semesterSelect.appendChild(newSemesterOption);
            }

            // Apply the selected theme
            if (themeColor === "dark") {
                document.body.style.backgroundColor = "#333";
                document.body.style.color = "#fff";
            } else if (themeColor === "light") {
                document.body.style.backgroundColor = "#f4f4f9";
                document.body.style.color = "#333";
            } else {
                document.body.style.backgroundColor = "#fff";
                document.body.style.color = "#333";
            }

            // Close modal and reset form
            settingsModal.style.display = "none";
            document.getElementById('settingsForm').reset();
        });
    </script>
</body>
</html>
