<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Collection</title>
    <link rel="stylesheet" href="fee.css">
</head>
<body>
    <div class="container">
        <h1>Fee Collection</h1>

        <!-- Student Fee Collection Form -->
        <h2>Student Fee Collection</h2>
        <form id="studentFeeForm">
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" required><br>

            <label for="course">Course:</label>
            <select id="course" name="course" required>
                <option value="Bachelors">Bachelors</option>
                <option value="Masters">Masters</option>
                <option value="Diploma">Diploma</option>
            </select><br>

            <label for="totalFee">Total Fee:</label>
            <input type="number" id="totalFee" name="totalFee" required><br>

            <label for="feePaid">Amount Paid:</label>
            <input type="number" id="feePaid" name="feePaid" required><br>

            <label for="paymentDate">Payment Date:</label>
            <input type="date" id="paymentDate" name="paymentDate" required><br>

            <button type="submit" class="btn">Submit Student Fee</button>
        </form>

        <!-- Teacher Fee Collection Form -->
        <h2>Teacher Fee Collection</h2>
        <form id="teacherFeeForm">
            <label for="teacherName">Teacher Name:</label>
            <input type="text" id="teacherName" name="teacherName" required><br>

            <label for="salaryAmount">Salary Amount:</label>
            <input type="number" id="salaryAmount" name="salaryAmount" required><br>

            <label for="salaryPaid">Salary Paid:</label>
            <input type="number" id="salaryPaid" name="salaryPaid" required><br>

            <label for="paymentDateTeacher">Payment Date:</label>
            <input type="date" id="paymentDateTeacher" name="paymentDateTeacher" required><br>

            <button type="submit" class="btn">Submit Teacher Salary</button>
        </form>

        <!-- Fee Collection Data -->
        <div id="feeCollectionData">
            <h2>Fee Collection Records</h2>
            <h3>Student Fee Records:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Total Fee</th>
                        <th>Amount Paid</th>
                        <th>Payment Date</th>
                    </tr>
                </thead>
                <tbody id="studentFeeList">
                    <!-- Student fee records will appear here -->
                </tbody>
            </table>

            <h3>Teacher Salary Records:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Teacher Name</th>
                        <th>Salary Amount</th>
                        <th>Salary Paid</th>
                        <th>Payment Date</th>
                    </tr>
                </thead>
                <tbody id="teacherSalaryList">
                    <!-- Teacher salary records will appear here -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Student Fee Form Submission
        document.getElementById('studentFeeForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Get values from student fee form
            var studentName = document.getElementById('studentName').value;
            var course = document.getElementById('course').value;
            var totalFee = document.getElementById('totalFee').value;
            var feePaid = document.getElementById('feePaid').value;
            var paymentDate = document.getElementById('paymentDate').value;

            // Create a new row for the student fee collection table
            var studentTable = document.getElementById('studentFeeList');
            var newRow = studentTable.insertRow();

            newRow.innerHTML = `<tr>
                <td>${studentName}</td>
                <td>${course}</td>
                <td>${totalFee}</td>
                <td>${feePaid}</td>
                <td>${paymentDate}</td>
            </tr>`;

            // Clear the form
            document.getElementById('studentFeeForm').reset();
        });

        // Teacher Fee Form Submission
        document.getElementById('teacherFeeForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Get values from teacher salary form
            var teacherName = document.getElementById('teacherName').value;
            var salaryAmount = document.getElementById('salaryAmount').value;
            var salaryPaid = document.getElementById('salaryPaid').value;
            var paymentDateTeacher = document.getElementById('paymentDateTeacher').value;

            // Create a new row for the teacher salary collection table
            var teacherTable = document.getElementById('teacherSalaryList');
            var newRow = teacherTable.insertRow();

            newRow.innerHTML = `<tr>
                <td>${teacherName}</td>
                <td>${salaryAmount}</td>
                <td>${salaryPaid}</td>
                <td>${paymentDateTeacher}</td>
            </tr>`;

            // Clear the form
            document.getElementById('teacherFeeForm').reset();
        });
    </script>
</body>
</html>
