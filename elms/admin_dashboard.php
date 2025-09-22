<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ELMS Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="flex bg-gray-100">

  <!-- Sidebar -->
  <aside class="w-64 bg-red-900 text-white h-screen p-5 fixed shadow-lg transition-all duration-500">
    <div class="text-center mb-8 animate-fadeIn">
      <h3 class="text-2xl font-bold tracking-wide">ELMS Admin</h3>
    </div>
    <ul class="space-y-3">
      <li><a href="#" class="flex items-center gap-3 p-3 rounded-md bg-red-700 transition hover:translate-x-1" onclick="showSection('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      <li><a href="#" class="flex items-center gap-3 p-3 rounded-md hover:bg-red-700 transition hover:translate-x-1" onclick="showSection('students')"><i class="fas fa-users"></i> Students</a></li>
      <li><a href="#" class="flex items-center gap-3 p-3 rounded-md hover:bg-red-700 transition hover:translate-x-1" onclick="showSection('teachers')"><i class="fas fa-chalkboard-teacher"></i> Teachers</a></li>
      <li><a href="#" class="flex items-center gap-3 p-3 rounded-md hover:bg-red-700 transition hover:translate-x-1" onclick="showSection('courses')"><i class="fas fa-book"></i> Courses</a></li>
      <li><a href="#" class="flex items-center gap-3 p-3 rounded-md hover:bg-red-700 transition hover:translate-x-1" onclick="showSection('settings')"><i class="fas fa-cog"></i> Settings</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="ml-64 flex-1 p-6">

    <!-- Header -->
    <header class="bg-white shadow-md rounded-xl p-4 flex justify-between items-center mb-6 animate-slideDown">
      <h1 class="text-2xl font-semibold text-red-900" id="page-title">Dashboard</h1>
      <div class="flex items-center gap-3">
        <img src="https://via.placeholder.com/40" alt="User" class="rounded-full">
        <span class="font-medium"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin User'; ?></span>
      </div>
    </header>

    <!-- Dashboard -->
    <section id="dashboard" class="section active animate-fadeIn">
      <!-- Quick Actions -->
      <div class="flex gap-4 mb-6">
        <button class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2 transition hover:scale-105"><i class="fas fa-user-plus"></i> Add Student</button>
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2 transition hover:scale-105"><i class="fas fa-chalkboard-teacher"></i> Add Teacher</button>
        <button class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg shadow flex items-center gap-2 transition hover:scale-105"><i class="fas fa-book-medical"></i> Add Course</button>
      </div>

      <!-- Widgets -->
      <div class="grid grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-5 rounded-xl shadow flex items-center gap-4 hover:shadow-lg transition transform hover:-translate-y-1">
          <i class="fas fa-user-graduate text-red-900 text-3xl"></i>
          <div><span class="text-xl font-bold">320</span><p>Students</p></div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow flex items-center gap-4 hover:shadow-lg transition transform hover:-translate-y-1">
          <i class="fas fa-chalkboard-teacher text-red-900 text-3xl"></i>
          <div><span class="text-xl font-bold">28</span><p>Teachers</p></div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow flex items-center gap-4 hover:shadow-lg transition transform hover:-translate-y-1">
          <i class="fas fa-book text-red-900 text-3xl"></i>
          <div><span class="text-xl font-bold">56</span><p>Courses</p></div>
        </div>
      </div>

      <!-- Chart -->
      <div class="bg-white p-6 rounded-xl shadow mb-6 flex justify-center">
        <canvas id="enrollmentChart" class="max-w-[220px] max-h-[220px]"></canvas>
      </div>

      <!-- Notifications -->
      <div class="bg-white p-6 rounded-xl shadow animate-slideUp">
        <h4 class="text-lg font-semibold text-red-900 mb-3">Notifications</h4>
        <ul class="space-y-2 text-sm">
          <li class="flex items-center gap-2"><i class="fas fa-exclamation-circle text-red-900"></i> Michael Brown pending approval</li>
          <li class="flex items-center gap-2"><i class="fas fa-check-circle text-green-600"></i> New course added: AI Basics</li>
          <li class="flex items-center gap-2"><i class="fas fa-envelope text-blue-600"></i> Admin message received</li>
        </ul>
      </div>
    </section>

    <!-- Students -->
    <section id="students" class="section hidden animate-fadeIn">
      <div class="bg-white p-6 rounded-xl shadow mb-6">
        <h2 class="text-xl font-semibold text-red-900 mb-4">Students</h2>
        <button class="mb-4 bg-cyan-600 text-white px-4 py-2 rounded-lg hover:bg-cyan-700 transition hover:scale-105"><i class="fas fa-user-plus"></i> Add Student</button>
        <table class="w-full text-sm border border-gray-200 rounded-lg">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-2 border">ID</th>
              <th class="px-4 py-2 border">Name</th>
              <th class="px-4 py-2 border">Email</th>
              <th class="px-4 py-2 border">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-2 border">1</td>
              <td class="px-4 py-2 border">Lauren Mae Espinar</td>
              <td class="px-4 py-2 border">lrnmspnr@gmail.com</td>
              <td class="px-4 py-2 border"><button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Delete</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Teachers -->
    <section id="teachers" class="section hidden animate-fadeIn">
      <div class="bg-white p-6 rounded-xl shadow mb-6">
        <h2 class="text-xl font-semibold text-red-900 mb-4">Teachers</h2>
        <button class="mb-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition hover:scale-105"><i class="fas fa-plus"></i> Add Teacher</button>
        <table class="w-full text-sm border border-gray-200 rounded-lg">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-2 border">ID</th>
              <th class="px-4 py-2 border">Name</th>
              <th class="px-4 py-2 border">Email</th>
              <th class="px-4 py-2 border">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-2 border">1</td>
              <td class="px-4 py-2 border">Mr. John Doe</td>
              <td class="px-4 py-2 border">johndoe@gmail.com</td>
              <td class="px-4 py-2 border"><button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Delete</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Courses -->
    <section id="courses" class="section hidden animate-fadeIn">
      <div class="bg-white p-6 rounded-xl shadow mb-6">
        <h2 class="text-xl font-semibold text-red-900 mb-4">Courses</h2>
        <button class="mb-4 bg-yellow-500 text-black px-4 py-2 rounded-lg hover:bg-yellow-600 transition hover:scale-105"><i class="fas fa-book-medical"></i> Add Course</button>
        <ul class="space-y-2">
          <li class="p-3 border rounded-lg hover:bg-gray-50 transition">AI Basics</li>
          <li class="p-3 border rounded-lg hover:bg-gray-50 transition">Web Development</li>
          <li class="p-3 border rounded-lg hover:bg-gray-50 transition">Database Systems</li>
        </ul>
      </div>
    </section>

    <!-- Settings -->
    <section id="settings" class="section hidden animate-fadeIn">
      <div class="bg-white p-6 rounded-xl shadow mb-6">
        <h2 class="text-xl font-semibold text-red-900 mb-4">Settings</h2>
        <form class="space-y-4">
          <div>
            <label class="block mb-1 font-medium">Admin Name</label>
            <input type="text" class="w-full border px-3 py-2 rounded-lg focus:ring focus:ring-red-200" value="Admin User">
          </div>
          <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" class="w-full border px-3 py-2 rounded-lg focus:ring focus:ring-red-200" value="admin@email.com">
          </div>
          <div>
            <label class="block mb-1 font-medium">Password</label>
            <input type="password" class="w-full border px-3 py-2 rounded-lg focus:ring focus:ring-red-200">
          </div>
          <button class="bg-red-900 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition">Save Changes</button>
        </form>
      </div>
    </section>

  </main>

  <script>
    function showSection(sectionId) {
      document.querySelectorAll('.section').forEach(sec => sec.classList.add('hidden'));
      document.getElementById(sectionId).classList.remove('hidden');
      document.getElementById("page-title").innerText = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
    }

    // Chart.js Doughnut
    const ctx = document.getElementById('enrollmentChart').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Students', 'Teachers', 'Courses'],
        datasets: [{
          data: [320, 28, 56],
          backgroundColor: ['#16a34a', '#eab308', '#2563eb']
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } },
        animation: { animateScale: true },
        cutout: '70%'
      }
    });
  </script>

  <!-- Tailwind Animations -->
  <style>
    @keyframes fadeIn { from { opacity: 0 } to { opacity: 1 } }
    @keyframes slideDown { from { transform: translateY(-10px); opacity:0 } to { transform: translateY(0); opacity:1 } }
    @keyframes slideUp { from { transform: translateY(20px); opacity:0 } to { transform: translateY(0); opacity:1 } }
    .animate-fadeIn { animation: fadeIn .6s ease-in-out }
    .animate-slideDown { animation: slideDown .6s ease-in-out }
    .animate-slideUp { animation: slideUp .6s ease-in-out }
  </style>
</body>
</html>
