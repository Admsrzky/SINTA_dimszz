function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
  }

function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
  }

  // Mock data for charts
  var mahasiswaData = {
    labels: ['2018', '2019', '2020', '2021', '2022', '2023'],
    datasets: [{
      label: 'Years mahasiswa',
      data: [60, 80, 100, 150, 100, 95],
      backgroundColor: 'rgb(106, 90, 205, 0.2)',
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 1
    }]
  };

  var mahasiswaChart = new Chart(document.getElementById('mahasiswaChart'), {
    type: 'bar',
    data: mahasiswaData,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });