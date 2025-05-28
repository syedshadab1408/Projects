// Show Active Section
function showSection(sectionId) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => section.classList.remove('active'));
    document.getElementById(sectionId).classList.add('active');
}

// Mark Assignments as Done
function markAsDone(button) {
    button.innerText = "Completed!";
    button.disabled = true;
    button.style.backgroundColor = "#555";
}

// Marks Chart Data
const marksData = {
    labels: ['A SAINI', 'A VISHNU PRIYA', 'ABDUL KHADER', 'ANKAR', 'ATIYA FIRDOUS', 'B CHIRANJEEVI REDDY', 'BANDI MANOJ KUMAR', 'D THANUJA', 'DEEKSHITHA V', 'G HARSHITHA', 'G PRASHANTH', 'GAGAN KUMAR', 'GANDLA VYSHNAVI', 'GOUTHAM B M', 'H MALIKARJUNA', 'HARIPRASAD G', 'HARSHITHA S', 'HEMANTH NAIK K B', 'INDU PRIYA', 'JAYASHREE', 'K MEDHASHEE', 'K MONICA', 'SANTHOSH K', 'KEERTHI R', 'KUSUMA J', 'MADHU REKHA', 'M MAHIMA RANI', 'M MALIKARJUN', 'M PRATHIBA', 'MALI PATIL MEGHANA'],
    datasets: [{ 
        label: 'Marks', 
        data: [46, 46, 46, 46, 49, 46, 42, 50, 50, 49, 49, 50, 50, 49, 49, 42, 42, 42, 35, 50, 42, 42, 42, 49, 42, 42, 42, 42, 42, 49], 
        backgroundColor: ['#6a11cb', '#2575fc', '#34e89e', '#ff6a88', '#fbb03b'], 
        borderColor: '#333', 
        borderWidth: 1 
    }]
};


// Render Marks Chart
const ctx = document.getElementById('marksChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: marksData,
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
        },
    },
});
