<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Database</title>
    <link rel="stylesheet" href="studentstyle.css">  
</head>
<body>
    <div class="container">
        <h1>Teacher Database</h1>
        <form id="teacherForm">
            <label for="teacherName">Teacher Name:</label>
            <input type="text" id="teacherName" name="teacherName" required><br>

            <label for="course">Course:</label>
            <select id="course" name="course" required>
                <option value="Bachelors">Bachelors</option>
                <option value="Masters">Masters</option>
                <option value="Diploma">Diploma</option>
            </select><br>

            <label for="department">Department:</label>
            <select id="department" name="department" required>
                <option value="Computer Science">Computer Science</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
                <option value="Civil Engineering">Civil Engineering</option>
                <option value="Mathematics">Mathematics</option>
            </select><br>

            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary" required><br>

            <button type="submit" class="btn">Submit</button>
        </form>
        
        <div id="teacherData">
            <h2>Teacher Details:</h2>
            <table>
                <thead>
                    <tr>
                        <th>Teacher Name</th>
                        <th>Course</th>
                        <th>Department</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody id="teacherList">
                    <!-- Teacher details will be added here dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('teacherForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Get values from form fields
            var teacherName = document.getElementById('teacherName').value;
            var course = document.getElementById('course').value;
            var department = document.getElementById('department').value;
            var salary = document.getElementById('salary').value;

            // Create a new row in the teacher table
            var table = document.getElementById('teacherList');
            var newRow = table.insertRow();

            newRow.innerHTML = `<tr>
                <td>${teacherName}</td>
                <td>${course}</td>
                <td>${department}</td>
                <td>${salary}</td>
            </tr>`;

            // Clear the form
            document.getElementById('teacherForm').reset();
        });
    </script>
    <script src="script.js" defer></script>

</body>
</html>
