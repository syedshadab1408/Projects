// Utility Function to Toggle Sections
function showSection(sectionId) {
    document.querySelectorAll('.section').forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(sectionId).classList.add('active');

    document.querySelectorAll('.sidebar ul li').forEach(item => {
        item.classList.remove('active');
    });
    document.querySelector(`.sidebar ul li[onclick="showSection('${sectionId}')"]`).classList.add('active');
}

// Fetch Timetable from Backend
function loadTimetable() {
    fetch('backend/timetable.php')
        .then(response => response.json())
        .then(data => {
            const timetableContainer = document.getElementById('timetable-container');
            timetableContainer.innerHTML = '';
            data.forEach(item => {
                timetableContainer.innerHTML += `
                    <div class="card">
                        <h3>${item.day}</h3>
                        <p>${item.time_slot} - ${item.subject}</p>
                    </div>
                `;
            });
        })
        .catch(error => console.error('Error fetching timetable:', error));
}

// Load Attendance Function
function loadAttendance() {
    const classSelect = document.getElementById('classSelect').value;
    const date = document.getElementById('attendanceDate').value;

    if (!classSelect || !date) {
        alert('Please select both class and date.');
        return;
    }

    // Mock data for demonstration (replace with AJAX request to backend)
    const students = [
        { name: 'Alice', usn: 'USN001' },
        { name: 'Bob', usn: 'USN002' }
    ];

    // Generate the table rows dynamically
    const tbody = document.getElementById('attendanceTableBody');
    tbody.innerHTML = ''; // Clear previous data

    students.forEach((student, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${student.name}</td>
            <td>${student.usn}</td>
            <td>
                <input type="radio" name="status_${index}" value="present" checked>
            </td>
            <td>
                <input type="radio" name="status_${index}" value="absent">
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Submit Attendance Function
function submitAttendance() {
    const rows = document.querySelectorAll('#attendanceTableBody tr');
    const classSelect = document.getElementById('classSelect').value;
    const date = document.getElementById('attendanceDate').value;

    if (!classSelect || !date) {
        alert('Please select both class and date before submitting.');
        return;
    }

    const attendanceData = [];
    rows.forEach((row, index) => {
        const name = row.cells[0].innerText;
        const usn = row.cells[1].innerText;
        const status = document.querySelector(`input[name="status_${index}"]:checked`).value;

        attendanceData.push({ name, usn, status });
    });

    // Send attendance data to the backend
    fetch('submit_attendance.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            class_id: classSelect,
            date: date,
            attendance: attendanceData
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message || 'Attendance submitted successfully!');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to submit attendance.');
    });
}


// Fetch Teacher Profile
function loadProfile() {
    fetch('backend/profile.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('profile-name').textContent = data.name;
            document.getElementById('profile-email').textContent = data.email;
            document.getElementById('profile-subject').textContent = data.subject;
        })
        .catch(error => console.error('Error fetching profile:', error));
}

// Initial Load
document.addEventListener('DOMContentLoaded', () => {
    loadTimetable();
    loadProfile();
});
// Utility Functions for Modals
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Add Student
// Function to add student
function addStudent() {
    const studentName = document.getElementById('studentName').value;
    const studentUSN = document.getElementById('studentUSN').value;

    // Validate inputs
    if (!studentName || !studentUSN) {
        alert("Please fill in all fields.");
        return;
    }

    const data = {
        name: studentName,
        usn: studentUSN
    };

    fetch('backend/add_student.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Log the response for debugging
        alert(data.message);
        if (data.status === 'success') {
            // Close modal if successful
            document.getElementById('addStudentModal').style.display = 'none';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while adding the student.');
    });
}

// Function to view all students
function viewStudents() {
    fetch('backend/fetch_student.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                let studentsHTML = '<table><thead><tr><th>Name</th><th>USN</th></tr></thead><tbody>';
                data.students.forEach(student => {
                    studentsHTML += `<tr><td>${student.name}</td><td>${student.usn}</td></tr>`;
                });
                studentsHTML += '</tbody></table>';
                document.getElementById('studentListContainer').innerHTML = studentsHTML;
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
function  viewStudents() {
    // Redirect to the 'fetch_timetable.php' page
    window.location.href = 'backend/fetch_student.php';
}


// Add Timetable Entry
function addTimetable() {
    const day = document.getElementById('day').value;
    const timeSlot = document.getElementById('timeSlot').value;
    const subject = document.getElementById('subject').value;

    fetch('backend/add_timetable.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ day, time_slot: timeSlot, subject })
    })
        .then(response => response.text())
        .then(data => {
            alert(data);
            closeModal('addTimetableModal');
            loadTimetable(); // Refresh timetable
        })
        .catch(error => console.error('Error adding timetable entry:', error));
}

// Add Class
function addClass() {
    const className = document.getElementById('className').value;

    fetch('backend/add_class.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ class_name: className })
    })
        .then(response => response.text())
        .then(data => {
            alert(data);
            closeModal('addClassModal');
        })
        .catch(error => console.error('Error adding class:', error));
}
// Fetch timetable data and display it in the frontend
function loadTimetable() {
    fetch('fetch_timetable.php') // Call the PHP backend
        .then(response => response.json()) // Parse the JSON response
        .then(data => {
            const timetableContainer = document.getElementById('timetable-container');
            timetableContainer.innerHTML = ''; // Clear existing content
            
            // Dynamically add timetable entries
            data.forEach(entry => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <h3>${entry.day}</h3>
                    <p><strong>Time:</strong> ${entry.time_slot}</p>
                    <p><strong>Subject:</strong> ${entry.subject}</p>
                `;
                timetableContainer.appendChild(card);
            });
        })
        .catch(error => console.error('Error fetching timetable:', error));
    
}

// Call the function to load data on page load
document.addEventListener('DOMContentLoaded', loadTimetable);

function viewTimetable() {
    // Redirect to the 'fetch_timetable.php' page
    window.location.href = 'backend/fetch_timetable.php';
}
// Function to redirect to fetch_classes.php
function viewClass() {
    window.location.href = "backend/fetch_classes.php"; // Redirect to fetch_classes.php
}
// Function to handle adding an assignment
function addAssignment() {
    const class_id = document.getElementById('class_id').value;
    const title = document.getElementById('assignmentTitle').value;
    const description = document.getElementById('assignmentDescription').value;
    const deadline = document.getElementById('assignmentDeadline').value;

    if (!class_id || !title || !description || !deadline) {
        alert("Please fill in all fields!");
        return;
    }

    fetch('backend/fetch_assignments.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
            action: 'addAssignment',
            class_id: class_id,
            title: title,
            description: description,
            deadline: deadline,
        }),
    })
    .then(response => response.text())
    .then(data => {
        console.log('Response:', data); // Log the server response
        if (data.includes("success")) {
            alert("Assignment added successfully!");
            closeModal('addAssignmentModal'); // Close the modal
            viewAssignments(); // Refresh assignments list
        } else {
            alert("Error: " + data); // Display server error
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Something went wrong. Please try again.");
    });
}
function viewAssignments() {
    fetch('backend/assignments.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ action: 'viewAssignments' }),
    })
    .then(response => response.json())
    .then(data => {
        // Display assignments in the UI
        const assignmentContainer = document.getElementById('assignmentContainer'); // Add this container in your HTML
        assignmentContainer.innerHTML = ''; // Clear existing content

        data.forEach(assignment => {
            const assignmentCard = document.createElement('div');
            assignmentCard.className = 'assignment-card';
            assignmentCard.innerHTML = `
                <h3>${assignment.title}</h3>
                <p><strong>Class:</strong> ${assignment.class_id}</p>
                <p><strong>Description:</strong> ${assignment.description}</p>
                <p><strong>Deadline:</strong> ${assignment.deadline}</p>
            `;
            assignmentContainer.appendChild(assignmentCard);
        });
    })
    .catch(error => console.error('Error:', error));
}
function viewAssignments() {
    window.location.href = "backend/fetch_assignment.php"; // Redirect to fetch_classes.php
}

function searchStudent() {
    const studentName = document.getElementById('studentSearchBar').value;

    if (studentName) {
        // Make an AJAX request to the backend to fetch the student's data
        fetch(`backend/search_student.php?name=${studentName}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Display the student's data and attendance
                    const student = data.student;
                    document.getElementById('searchResult').innerHTML = `
                        <p><strong>Name:</strong> ${student.name}</p>
                        <p><strong>USN:</strong> ${student.usn}</p>
                        <p><strong>Attendance Status:</strong> ${student.attendance_status}</p>
                    `;
                } else {
                    // If no student is found
                    document.getElementById('searchResult').innerHTML = `<p>${data.message}</p>`;
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    } else {
        // Clear the result if the search field is empty
        document.getElementById('searchResult').innerHTML = '';
    }
}