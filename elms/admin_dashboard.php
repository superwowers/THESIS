<?php
// Start session if you plan to use user sessions
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ELMS Admin Dashboard</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="sidebar-header">
      <h3>ELMS Admin</h3>
    </div>
    <div class="sidebar-menu">
      <ul>
        <li><a href="#" class="active" onclick="showSection('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="#" onclick="showSection('students')"><i class="fas fa-users"></i> Students</a></li>
        <li><a href="#" onclick="showSection('teachers')"><i class="fas fa-chalkboard-teacher"></i> Teachers</a></li>
        <li><a href="#" onclick="showSection('courses')"><i class="fas fa-book"></i> Courses</a></li>
        <li><a href="#" onclick="showSection('settings')"><i class="fas fa-cog"></i> Settings</a></li>
      </ul>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="header">
      <h1 id="page-title">Dashboard</h1>
      <div class="user-info">
        <img src="https://via.placeholder.com/40" alt="User">
        <span><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin User'; ?></span>
      </div>
    </div>

    <div class="content">

      <!-- Dashboard Section -->
      <div id="dashboard" class="section active-section">

        <!-- Quick Actions -->
        <div class="quick-actions">
          <button class="quick-btn"><i class="fas fa-user-plus"></i> Add Student</button>
          <button class="quick-btn"><i class="fas fa-chalkboard-teacher"></i> Add Teacher</button>
          <button class="quick-btn"><i class="fas fa-book-medical"></i> Add Course</button>
        </div>

        <!-- Mini Widgets -->
        <div class="mini-widgets">
          <div class="widget"><i class="fas fa-user-graduate"></i> <div><span>320</span> Students</div></div>
          <div class="widget"><i class="fas fa-chalkboard-teacher"></i> <div><span>28</span> Teachers</div></div>
          <div class="widget"><i class="fas fa-book"></i> <div><span>56</span> Courses</div></div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-cards">
          <div class="stat-card">
            <div class="stat-card-header">
              <span class="stat-card-title">Students</span>
              <div class="stat-card-icon students-icon"><i class="fas fa-users"></i></div>
            </div>
            <div class="stat-card-value">320</div>
            <div class="stat-card-footer">Total enrolled</div>
          </div>
          <div class="stat-card">
            <div class="stat-card-header">
              <span class="stat-card-title">Teachers</span>
              <div class="stat-card-icon teachers-icon"><i class="fas fa-chalkboard-teacher"></i></div>
            </div>
            <div class="stat-card-value">28</div>
            <div class="stat-card-footer">Active instructors</div>
          </div>
          <div class="stat-card">
            <div class="stat-card-header">
              <span class="stat-card-title">Courses</span>
              <div class="stat-card-icon courses-icon"><i class="fas fa-book"></i></div>
            </div>
            <div class="stat-card-value">56</div>
            <div class="stat-card-footer">Available courses</div>
          </div>
          <div class="stat-card">
            <div class="stat-card-header">
              <span class="stat-card-title">Pending Approvals</span>
              <div class="stat-card-icon enrollments-icon"><i class="fas fa-clock"></i></div>
            </div>
            <div class="stat-card-value">12</div>
            <div class="stat-card-footer">Pending requests</div>
          </div>
        </div>

        <!-- Chart -->
        <div class="chart-container">
          <canvas id="enrollmentChart"></canvas>
        </div>

        <!-- Notifications -->
        <div class="notifications">
          <h4>Notifications</h4>
          <ul>
            <li><i class="fas fa-exclamation-circle"></i> Michael Brown pending approval</li>
            <li><i class="fas fa-check-circle"></i> New course added: AI Basics</li>
            <li><i class="fas fa-envelope"></i> Admin message received</li>
          </ul>
        </div>

      </div>

      <!-- Other sections (students, teachers, courses, settings) remain the same as HTML code -->

    </div>
  </div>

  <script>
    function showSection(sectionId) {
      document.querySelectorAll('.section').forEach(sec => sec.classList.remove('active-section'));
      document.getElementById(sectionId).classList.add('active-section');
      document.getElementById("page-title").innerText = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
      document.querySelectorAll('.sidebar-menu a').forEach(link => link.classList.remove('active'));
      event.target.closest("a").classList.add("active");
    }

    function filterTable(inputId, tableId) {
      let input = document.getElementById(inputId).value.toUpperCase();
      let table = document.getElementById(tableId);
      let tr = table.getElementsByTagName("tr");
      for (let i = 1; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td");
        let show = false;
        for (let j = 0; j < td.length; j++) {
          if (td[j].innerText.toUpperCase().includes(input)) show = true;
        }
        tr[i].style.display = show ? "" : "none";
      }
    }

    // Chart.js Doughnut
    const ctx = document.getElementById('enrollmentChart').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Students', 'Teachers', 'Courses'],
        datasets: [{
          data: [320, 28, 56],
          backgroundColor: ['#28a745', '#ffc107', '#007bff'] // Green, Yellow, Blue
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } },
        cutout: '60%' // smaller doughnut
      }
    });
  </script>
</body>
</html>
