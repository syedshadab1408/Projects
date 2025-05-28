<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
    <link rel="stylesheet" href="studentstyle.css">
</head>
<body>
    <div class="container">
        <h1>Student Details</h1>
        <form id="studentForm">
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" required><br>

            <label for="course">Course:</label>
            <select id="course" name="course" required>
                <option value="Bachelors">Bachelors</option>
                <option value="Masters">Masters</option>
                <option value="Diploma">Diploma</option>
            </select><br>

            <label for="branch">Branch:</label>
            <select id="branch" name="branch" required>
                <option value="Computer Science">Computer Science</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
                <option value="Civil Engineering">Civil Engineering</option>
                <option value="Data Science">Data Science</option>
                <option value="AI ML">AI ML</option>
            </select><br>

            <label for="semester">Semester:</label>
            <select id="semester" name="semester" required>
                <option value="Semester 1">Semester 1</option>
                <option value="Semester 2">Semester 2</option>
                <option value="Semester 3">Semester 3</option>
                <option value="Semester 4">Semester 4</option>
                <option value="Semester 5">Semester 5</option>
                <option value="Semester 6">Semester 6</option>
                <option value="Semester 7">Semester 7</option>
                <option value="Semester 8">Semester 8</option>
            </select><br>

            <label for="totalFee">Total Fee:</label>
            <input type="number" id="totalFee" name="totalFee" required><br>

            <button type="submit" class="btn">Submit</button>
        </form>
        
        <div id="studentData">
            <h2>Student Details:</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Branch</th>
                        <th>Semester</th>
                        <th>Total Fee</th>
                    </tr>
                </thead>
                <tbody id="studentList">
                    <!-- Student details will be added here dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('studentForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Get values from form fields
            var studentName = document.getElementById('studentName').value;
            var course = document.getElementById('course').value;
            var branch = document.getElementById('branch').value;
            var semester = document.getElementById('semester').value;
            var totalFee = document.getElementById('totalFee').value;

            // Create a new row in the student table
            var table = document.getElementById('studentList');
            var newRow = table.insertRow();

            newRow.innerHTML = `<tr>
                <td>${studentName}</td>
                <td>${course}</td>
                <td>${branch}</td>
                <td>${semester}</td>
                <td>${totalFee}</td>
            </tr>`;

            // Clear the form
            document.getElementById('studentForm').reset();
        });
    </script>
</body>
</html>
