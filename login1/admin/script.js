// script.js

// Handle adding a student
async function addStudent(event) {
    event.preventDefault();

    const name = document.getElementById("student-name").value;
    const age = document.getElementById("student-age").value;
    const studentClass = document.getElementById("student-class").value;

    const response = await fetch("student.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            name: name,
            age: age,
            class: studentClass,
        }),
    });

    const result = await response.text();
    alert(result); // Show success message
    document.getElementById("student-form").reset(); // Clear form
}

// Handle adding a teacher
async function addTeacher(event) {
    event.preventDefault();

    const name = document.getElementById("teacher-name").value;
    const subject = document.getElementById("teacher-subject").value;

    const response = await fetch("teacher.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            name: name,
            subject: subject,
        }),
    });

    const result = await response.text();
    alert(result);
    document.getElementById("teacher-form").reset();
}

// Handle fee collection
async function collectFee(event) {
    event.preventDefault();

    const studentId = document.getElementById("fee-student-id").value;
    const amount = document.getElementById("fee-amount").value;
    const paidDate = document.getElementById("fee-paid-date").value;

    const response = await fetch("fee.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            student_id: studentId,
            amount: amount,
            paid_date: paidDate,
        }),
    });

    const result = await response.text();
    alert(result);
    document.getElementById("fee-form").reset();
}

// Handle settings update
async function updateSetting(event) {
    event.preventDefault();

    const settingName = document.getElementById("setting-name").value;
    const settingValue = document.getElementById("setting-value").value;

    const response = await fetch("setting.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            setting_name: settingName,
            setting_value: settingValue,
        }),
    });

    const result = await response.text();
    alert(result);
    document.getElementById("settings-form").reset();
}
function addTeacher() {
    const id = document.getElementById('teacherId').value;
    const name = document.getElementById('teacherName').value;
    const subject = document.getElementById('teacherSubject').value;
    const created_at = document.getElementById('teacherCreatedAt').value;

    // Check if all fields are filled
    if (!id || !name || !subject || !created_at) {
        alert("Please fill in all fields!");
        return;
    }

    // Send data to the backend
    fetch('backend/fetch_teachers.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
            action: 'addTeacher',
            id: id,
            name: name,
            subject: subject,
            created_at: created_at,
        }),
    })
    .then(response => response.text())
    .then(data => {
        console.log('Response:', data); // Log the server response
        if (data.includes("success")) {
            alert("Teacher added successfully!");
            closeModal('addTeacherModal'); // Close the modal (if applicable)
            viewTeachers(); // Refresh teachers list
        } else {
            alert("Error: " + data); // Display server error
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Something went wrong. Please try again.");
    });
}
