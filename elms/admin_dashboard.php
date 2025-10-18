<?php
// admin_dashboard.php

// Sample data for Admin Dashboard
$teachers = [
    ['name' => 'Mr. Smith', 'email' => 'smith@school.edu'],
    ['name' => 'Ms. Johnson', 'email' => 'johnson@school.edu'],
    ['name' => 'Mr. Brown', 'email' => 'brown@school.edu'],
];

$students = [
    ['name' => 'Lauren Mae Espinar', 'email' => 'lrnmspnr@gmail.com'],
    ['name' => 'Michael Brown', 'email' => 'michaelbrown@gmail.com'],
    ['name' => 'Sarah Parker', 'email' => 'sarahparker@gmail.com'],
];

$announcements = [
    ['title' => 'System Maintenance Scheduled', 'date' => '2024-08-22'],
    ['title' => 'New Teacher Accounts Created', 'date' => '2024-08-19'],
    ['title' => 'Semester Reports Released', 'date' => '2024-08-17'],
];

$adminTasks = [
    'Approve new teacher accounts',
    'Check pending student enrollments',
    'Review submitted reports',
];

$courses = [
    ['title' => 'Mathematics in the Modern World', 'image' => 'https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?auto=format&fit=crop&w=774&q=80'],
    ['title' => 'Computer Programming', 'image' => 'https://images.unsplash.com/photo-1542831371-29b0f74f9713?auto=format&fit=crop&w=870&q=80'],
    ['title' => 'Software Engineering', 'image' => 'https://images.unsplash.com/photo-1610563166150-b34df4f3bcd6?auto=format&fit=crop&w=1376&q=80'],
    ['title' => 'Art Appreciation', 'image' => 'https://images.unsplash.com/photo-1547891654-e66ed7ebb968?auto=format&fit=crop&w=1470&q=80'],
];

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #710E0E;
            --primary-light: #8a2b2b;
            --primary-dark: #5a0a0a;
        }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background-color: var(--primary-light); border-radius: 3px; }
        .hidden-section { display: none; }
        .active-link { background-color: var(--primary-light); }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { primary: { DEFAULT: '#710E0E', light: '#8a2b2b', dark: '#5a0a0a' } },
                    fontFamily: { poppins: ['Poppins', 'serif'] }
                }
            }
        }
    </script>
</head>
<body class="font-poppins bg-gradient-to-br from-primary to-primary-dark min-h-screen flex flex-col md:flex-row">

    <!-- Sidebar -->
  <nav class="bg-gradient-to-b from-primary to-primary-dark text-white w-64 flex flex-col p-6 sticky top-0 h-screen shadow-lg">
    <h1 class="text-3xl font-bold mb-10">ELMS</h1>
    <ul class="flex flex-col gap-3 flex-grow">
      <li>
        <button class="nav-link flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition" onclick="showSection(event,'dashboard')">
          <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M3 12l2-2m0 0l7-7 7 7M13 5v6h6'/></svg>
          Dashboard
        </button>
      </li>
      <li>
        <button class="nav-link flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition" onclick="showSection(event,'courses')">
          <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M12 20h9'/></svg>
          Courses
        </button>
      </li>
      <li>
        <button class="nav-link flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition" onclick="showSection(event,'teachers')">
          <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M9 17v-6a2 2 0 012-2h6'/></svg>
          Teachers
        </button>
      </li>
      <li>
        <button class="nav-link flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition" onclick="showSection(event,'students')">
          <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><circle cx='12' cy='7' r='4'/><path stroke-linecap='round' stroke-linejoin='round' d='M5.5 21a6.5 6.5 0 0113 0'/></svg>
          Students
        </button>
      </li>

      <!-- NEW: Announcements button placed after Students and before Reports -->
      <li>
        <button class="nav-link flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition" onclick="showSection(event,'announcements')">
          <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'/></svg>
          Announcements
        </button>
      </li>

      <li>
        <button class="nav-link flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition" onclick="showSection(event,'reports')">
          <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M3 3h18v18H3z'/></svg>
          Reports
        </button>
      </li>
    </ul>
    <div class="border-t border-primary-light pt-4">
      <button class="flex items-center gap-3 px-3 py-2 rounded hover:bg-primary-light transition w-full"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M18 8v6a6 6 0 11-12 0V8'/></svg> Logout</button>
    </div>
  </nav>

    <!-- Main Content -->
    <main class="flex-grow p-4 md:p-6 flex flex-col gap-8 max-w-7xl mx-auto w-full">

        <!-- DASHBOARD SECTION -->
        <section id="dashboard" class="content-section">
            <header class="flex justify-between items-center bg-white rounded-xl shadow-lg p-4 md:p-6">
                <div class="text-2xl font-semibold text-primary-dark">
                    Welcome back, <span class="text-primary">Admin!</span>
                </div>
            </header>

            <section class="flex flex-col md:flex-row gap-8 w-full mt-6">
                <div class="md:w-2/3 flex flex-col gap-8">
                    <section class="relative rounded-lg shadow-lg overflow-hidden w-full">
                        <img src="https://images.unsplash.com/photo-1603791440384-56cd371ee9a7?auto=format&fit=crop&w=1200&q=80" class="w-full h-48 md:h-64 object-cover brightness-90" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-dark/80 to-transparent"></div>
                        <div class="absolute bottom-4 left-6 text-white">
                            <h2 class="text-3xl font-bold">Admin Overview</h2>
                            <p class="text-sm md:text-base">Manage users, monitor courses, and update announcements here.</p>
                        </div>
                    </section>

                    <section class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-primary font-semibold text-2xl mb-6">Active Courses</h2>
                        <div id="activeCoursesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <?php foreach ($courses as $course): ?>
                                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden flex flex-col">
                                    <img src="<?= $course['image'] ?>" class="w-full h-36 object-cover">
                                    <div class="p-4 flex flex-col flex-grow">
                                        <h3 class="font-bold text-lg text-primary-dark mb-2"><?= $course['title'] ?></h3>
                                        <button class="mt-auto bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition manage-course-btn" data-title="<?= htmlspecialchars($course['title']) ?>">Manage</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                </div>

                <aside class="w-full md:w-1/3 flex flex-col gap-8">
                    <!-- Calendar -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-primary font-semibold text-2xl mb-4 text-center">Calendar</h2>
                        <div id="calendar"></div>
                    </div>

                    <!-- Tasks -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-primary font-semibold text-xl mb-4">Admin Tasks</h2>
                        <ul class="space-y-3">
                            <?php foreach ($adminTasks as $index => $task): ?>
                                <li class="flex items-center gap-3">
                                    <input type="checkbox" id="task-<?= $index ?>" class="w-5 h-5 text-primary border-gray-300 rounded">
                                    <label for="task-<?= $index ?>" class="text-gray-800"><?= $task ?></label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Announcements (also appears as its own page via sidebar) -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-primary font-semibold text-xl mb-4">Announcements</h2>
                        <ul class="divide-y divide-gray-200">
                            <?php foreach ($announcements as $a): ?>
                                <li class="py-3 flex justify-between items-center">
                                    <p class="font-semibold text-gray-800"><?= $a['title'] ?></p>
                                    <span class="text-sm text-white bg-primary rounded-full px-3 py-1"><?= date('M j', strtotime($a['date'])) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </aside>
            </section>
        </section>

        <!-- COURSES SECTION -->
<section id="courses" class="content-section hidden-section">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-4">
            <h2 class="text-primary font-semibold text-2xl mb-0">Section Masterlist</h2>

            <!-- Search bar -->
            <input type="text" id="courseSearchInput" placeholder="Search courses..." 
                class="border border-gray-300 rounded-md p-2 w-full md:w-64">

            <!-- Add Course button -->
            <button id="addCourseTopBtn" class="bg-primary text-white px-3 py-1 rounded hover:bg-primary-light transition">+ Add Course</button>
        </div>

        <div id="coursesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($courses as $course): ?>
                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden flex flex-col course-card">
                    <img src="<?= $course['image'] ?>" class="w-full h-36 object-cover">
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="font-bold text-lg text-primary-dark mb-2"><?= $course['title'] ?></h3>
                        <button class="mt-auto bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition manage-course-btn" data-title="<?= htmlspecialchars($course['title']) ?>">Manage</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


        <!-- TEACHERS SECTION -->
        <section id="teachers" class="content-section hidden-section">
            <h2 class="text-3xl font-bold text-primary mb-4">Teachers</h2>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th class="p-3">Name</th>
                            <th class="p-3">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teachers as $t): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3"><?= $t['name'] ?></td>
                                <td class="p-3"><?= $t['email'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- STUDENTS SECTION -->
        <section id="students" class="content-section hidden-section">
            <h2 class="text-3xl font-bold text-primary mb-4">Students</h2>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th class="p-3">Name</th>
                            <th class="p-3">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $s): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3"><?= $s['name'] ?></td>
                                <td class="p-3"><?= $s['email'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ANNOUNCEMENTS SECTION (full page) -->
        <section id="announcements" class="content-section hidden-section">
            <h2 class="text-3xl font-bold text-primary mb-4">Announcements</h2>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-gray-600">Below are current announcements. (Data is from sample PHP array.)</p>
                    <!-- Small non-functional 'Add' button placeholder - expand later if you want CRUD -->
                    <button class="bg-primary text-white px-3 py-1 rounded hover:bg-primary-light transition">Add Announcement</button>
                </div>

                <ul class="divide-y divide-gray-200">
                    <?php foreach ($announcements as $a): ?>
                        <li class="py-4 flex flex-col md:flex-row md:justify-between md:items-center">
                            <div>
                                <h3 class="font-semibold text-gray-800"><?= $a['title'] ?></h3>
                                <p class="text-sm text-gray-500 mt-1"><?= date('F j, Y', strtotime($a['date'])) ?></p>
                            </div>
                            <div class="mt-3 md:mt-0 flex gap-2">
                                <button class="px-3 py-1 rounded border border-gray-200 hover:bg-gray-50">View</button>
                                <button class="px-3 py-1 rounded border border-gray-200 hover:bg-gray-50">Edit</button>
                                <button class="px-3 py-1 rounded border border-red-200 text-red-600 hover:bg-red-50">Delete</button>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <!-- REPORTS SECTION -->
        <section id="reports" class="content-section hidden-section">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <h2 class="text-3xl font-bold text-primary mb-2">Reports</h2>
                <p class="text-gray-700">Report generation and analytics will be available soon.</p>
            </div>
        </section>
    </main>

    <script>
        // Calendar logic
        const calendarEl = document.getElementById('calendar');
        const daysOfWeek = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];

        function createCalendar(year, month){
            calendarEl.innerHTML = '';
            const header = document.createElement('div');
            header.className = 'flex justify-between items-center mb-4';

            const prev = document.createElement('button');
            prev.textContent = '<';
            prev.className = 'text-primary font-bold px-3 py-1 rounded hover:bg-primary-light hover:text-white transition';
            prev.onclick = () => { if(month===0){month=11;year--;}else{month--;} createCalendar(year,month); };

            const next = document.createElement('button');
            next.textContent = '>';
            next.className = 'text-primary font-bold px-3 py-1 rounded hover:bg-primary-light hover:text-white transition';
            next.onclick = () => { if(month===11){month=0;year++;}else{month++;} createCalendar(year,month); };

            const title = document.createElement('div');
            title.className = 'text-xl font-semibold text-primary';
            title.textContent = new Date(year,month).toLocaleString('default',{month:'long',year:'numeric'});

            header.append(prev,title,next);
            calendarEl.append(header);

            const daysRow=document.createElement('div');
            daysRow.className='grid grid-cols-7 text-center font-semibold text-primary mb-2';
            daysOfWeek.forEach(d=>{const el=document.createElement('div');el.textContent=d;daysRow.append(el);});
            calendarEl.append(daysRow);

            const grid=document.createElement('div');
            grid.className='grid grid-cols-7 gap-1 text-center';
            const firstDay=new Date(year,month,1).getDay();
            const daysInMonth=new Date(year,month+1,0).getDate();

            for(let i=0;i<firstDay;i++){grid.append(document.createElement('div'));}

            for(let d=1;d<=daysInMonth;d++){
                const dateEl=document.createElement('div');
                dateEl.textContent=d;
                dateEl.className='p-2 rounded cursor-pointer hover:bg-primary-light hover:text-white transition';
                const today=new Date();
                if(d===today.getDate() && month===today.getMonth() && year===today.getFullYear()){
                    dateEl.classList.add('bg-primary','text-white','font-bold');
                }
                grid.append(dateEl);
            }
            calendarEl.append(grid);
        }

        const now=new Date();
        createCalendar(now.getFullYear(),now.getMonth());

        // Sidebar button switching (fixed to receive event)
        function showSection(evt, sectionId) {
            // hide all sections
            document.querySelectorAll('.content-section').forEach(sec => sec.classList.add('hidden-section'));
            // show target
            const target = document.getElementById(sectionId);
            if (target) target.classList.remove('hidden-section');

            // active link handling
            document.querySelectorAll('.nav-link').forEach(btn => btn.classList.remove('active-link'));
            if (evt && evt.currentTarget) evt.currentTarget.classList.add('active-link');

            // scroll to top of main content when switching sections
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Optional: set initial active nav link (Dashboard)
        document.addEventListener('DOMContentLoaded', () => {
            const firstNav = document.querySelector('.nav-link');
            if (firstNav) firstNav.classList.add('active-link');
        });
    </script>

    <!-- ===================== -->
    <!-- Add Course Modal (frontend-only) -->
    <!-- ===================== -->
    <div id="addCourseModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-40">
      <div class="bg-white rounded-xl shadow-xl w-96 p-6">
        <h2 class="text-2xl font-semibold text-primary mb-4">Add Course</h2>
        <form id="addCourseForm">
          <label class="block mb-2 text-gray-700 font-medium">Course Title</label>
          <input type="text" id="addCourseTitle" class="w-full border border-gray-300 rounded-md p-2 mb-4" placeholder="Course title" required>

          <label class="block mb-2 text-gray-700 font-medium">Image URL</label>
          <input type="url" id="addCourseImage" class="w-full border border-gray-300 rounded-md p-2 mb-4" placeholder="https://example.com/image.jpg" required>

          <div class="flex justify-end gap-2">
            <button type="button" id="cancelAddCourse" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancel</button>
            <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">Add</button>
          </div>
        </form>
      </div>
    </div>

    <!-- ===================== -->
    <!-- Manage Course Modal (frontend-only) -->
    <!-- ===================== -->
    <div id="manageCourseModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
      <div class="bg-white rounded-xl shadow-xl w-96 p-6">
        <h2 class="text-2xl font-semibold text-primary mb-4">Manage Course</h2>

        <div id="managePreview" class="mb-4">
          <img id="manageCourseImg" src="" class="w-full h-36 object-cover rounded mb-3" alt="Course image">
          <h3 id="manageCourseTitleDisplay" class="font-bold text-lg text-primary-dark mb-2"></h3>
        </div>

        <form id="manageCourseForm">
          <label class="block mb-2 text-gray-700 font-medium">Course Title</label>
          <input type="text" id="manageCourseTitle" class="w-full border border-gray-300 rounded-md p-2 mb-3">

          <label class="block mb-2 text-gray-700 font-medium">Image URL</label>
          <input type="url" id="manageCourseImageUrl" class="w-full border border-gray-300 rounded-md p-2 mb-4" placeholder="https://example.com/image.jpg">

          <div class="flex justify-between items-center">
            <button type="button" id="deleteCourseBtn" class="px-4 py-2 rounded-md bg-red-600 text-white hover:bg-red-700">Delete</button>
            <div class="flex gap-2">
              <button type="button" id="cancelManage" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancel</button>
              <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- ===================== -->
    <!-- Edit Course Modal (existing in your file) -->
    <!-- ===================== -->
    <div id="editCourseModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
      <div class="bg-white rounded-xl shadow-xl w-96 p-6">
        <h2 class="text-2xl font-semibold text-primary mb-4">Edit Course</h2>
        <form id="editCourseForm">
          <label class="block mb-2 text-gray-700 font-medium">Course Title</label>
          <input type="text" id="courseTitleInput" class="w-full border border-gray-300 rounded-md p-2 mb-4" required>
          <div class="flex justify-end gap-2">
            <button type="button" id="cancelEdit" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancel</button>
            <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">Save</button>
          </div>
        </form>
      </div>
    </div>

    <script>
      // ====== Course Add / Manage Frontend Logic ======

      // Grids (we added IDs above)
      const activeCoursesGrid = document.getElementById('activeCoursesGrid');
      const coursesGrid = document.getElementById('coursesGrid');

      // Add Course modal elements
      const addCourseTopBtn = document.getElementById('addCourseTopBtn');
      const addCourseModal = document.getElementById('addCourseModal');
      const cancelAddCourse = document.getElementById('cancelAddCourse');
      const addCourseForm = document.getElementById('addCourseForm');
      const addCourseTitle = document.getElementById('addCourseTitle');
      const addCourseImage = document.getElementById('addCourseImage');

      // Manage Course modal elements
      const manageCourseModal = document.getElementById('manageCourseModal');
      const manageCourseImg = document.getElementById('manageCourseImg');
      const manageCourseTitleDisplay = document.getElementById('manageCourseTitleDisplay');
      const manageCourseTitle = document.getElementById('manageCourseTitle');
      const manageCourseImageUrl = document.getElementById('manageCourseImageUrl');
      const deleteCourseBtn = document.getElementById('deleteCourseBtn');
      const cancelManage = document.getElementById('cancelManage');
      const manageCourseForm = document.getElementById('manageCourseForm');

      let manageTargetCard = null; // the DOM card being managed

      // Helper: attach manage handlers to a card's manage button
      function attachManageHandlerToCard(card) {
        const btn = card.querySelector('.manage-course-btn') || card.querySelector('.manage-course-btn') || card.querySelector('button.manage-course-btn') || card.querySelector('button.manageBtn') || card.querySelector('button.manage');
        // find any button with class 'manage-course-btn' or 'manageBtn' or text 'Manage'
        const possibleBtns = card.querySelectorAll('button');
        let manageBtn = null;
        possibleBtns.forEach(b => {
          if (b.classList.contains('manage-course-btn') || b.textContent.trim().toLowerCase() === 'manage') manageBtn = b;
        });
        if (!manageBtn) {
          // fallback: first button in card
          manageBtn = card.querySelector('button');
        }
        if (!manageBtn) return;

        manageBtn.addEventListener('click', () => {
          // open manage modal populated with this card's info
          manageTargetCard = card;
          const img = card.querySelector('img');
          const h3 = card.querySelector('h3');
          manageCourseImg.src = img ? img.src : '';
          manageCourseTitleDisplay.textContent = h3 ? h3.textContent : '';
          manageCourseTitle.value = h3 ? h3.textContent : '';
          manageCourseImageUrl.value = '';
          manageCourseModal.classList.remove('hidden');
        });
      }

      // Attach to existing cards in Dashboard and Courses
      document.querySelectorAll('#activeCoursesGrid > div, #coursesGrid > div').forEach(card => {
        attachManageHandlerToCard(card);
      });

      // Add Course button open/close
      addCourseTopBtn.addEventListener('click', () => addCourseModal.classList.remove('hidden'));
      cancelAddCourse.addEventListener('click', () => {
        addCourseModal.classList.add('hidden');
        addCourseForm.reset();
      });

      // Add Course submit (frontend only) - append to both grids so it appears in Dashboard active and All Courses
      addCourseForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const title = addCourseTitle.value.trim();
        const image = addCourseImage.value.trim() || 'https://via.placeholder.com/400x200?text=Course+Image';
        if (!title) return alert('Please enter a course title.');

        // Create card HTML matches your existing card markup (for both places)
        const createCard = () => {
          const container = document.createElement('div');
          container.className = 'bg-white rounded-lg shadow-md overflow-hidden flex flex-col';
          const imgEl = document.createElement('img');
          imgEl.src = image;
          imgEl.className = 'w-full h-36 object-cover';
          const inner = document.createElement('div');
          inner.className = 'p-4 flex flex-col flex-grow';
          const h3 = document.createElement('h3');
          h3.className = 'font-bold text-lg text-primary-dark mb-2';
          h3.textContent = title;
          const btn = document.createElement('button');
          btn.className = 'mt-auto bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition manage-course-btn';
          btn.textContent = 'manage';
          inner.appendChild(h3);
          inner.appendChild(btn);
          container.appendChild(imgEl);
          container.appendChild(inner);
          return container;
        };

        // append to coursesGrid
        const newCourseCard = createCard();
        coursesGrid.appendChild(newCourseCard);
        attachManageHandlerToCard(newCourseCard);

        // append a similar card to activeCoursesGrid (Dashboard)
        const activeCard = createCard();
        // dashboard cards have bg-gray-50 in original, so mirror that small difference
        activeCard.className = 'bg-gray-50 rounded-lg shadow-md overflow-hidden flex flex-col';
        // adjust the button class if needed
        const actBtn = activeCard.querySelector('button');
        if (actBtn) actBtn.className = 'mt-auto bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition manage-course-btn';
        activeCoursesGrid.appendChild(activeCard);
        attachManageHandlerToCard(activeCard);

        // close and reset
        addCourseModal.classList.add('hidden');
        addCourseForm.reset();
      });

      // Manage modal handlers
      cancelManage.addEventListener('click', () => {
        manageCourseModal.classList.add('hidden');
        manageTargetCard = null;
      });

      // Save changes in manage modal (frontend only)
      manageCourseForm.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!manageTargetCard) return;
        const newTitle = manageCourseTitle.value.trim();
        const newImage = manageCourseImageUrl.value.trim();
        if (newTitle) {
          const h3 = manageTargetCard.querySelector('h3');
          if (h3) h3.textContent = newTitle;
        }
        if (newImage) {
          const img = manageTargetCard.querySelector('img');
          if (img) img.src = newImage;
        }
        manageCourseModal.classList.add('hidden');
        manageTargetCard = null;
      });

      // Delete course from page (frontend only)
      deleteCourseBtn.addEventListener('click', () => {
        if (!manageTargetCard) return;
        if (confirm('Are you sure you want to delete this course?')) {
          // remove corresponding card in both grids if matching title+img
          const targetTitle = manageTargetCard.querySelector('h3') ? manageTargetCard.querySelector('h3').textContent : null;
          const targetImg = manageTargetCard.querySelector('img') ? manageTargetCard.querySelector('img').src : null;

          // remove the manageTargetCard itself
          manageTargetCard.remove();

          // also attempt to remove any duplicate from the other grid (title+img match)
          document.querySelectorAll('#coursesGrid > div, #activeCoursesGrid > div').forEach(card => {
            const h3 = card.querySelector('h3');
            const img = card.querySelector('img');
            if (h3 && img && h3.textContent === targetTitle && img.src === targetImg) {
              card.remove();
            }
          });

          manageCourseModal.classList.add('hidden');
          manageTargetCard = null;
        }
      });

      // Close manage modal when clicking overlay
      manageCourseModal.addEventListener('click', (e) => {
        if (e.target === manageCourseModal) {
          manageCourseModal.classList.add('hidden');
          manageTargetCard = null;
        }
      });

      // Close add modal when clicking overlay
      addCourseModal.addEventListener('click', (e) => {
        if (e.target === addCourseModal) {
          addCourseModal.classList.add('hidden');
          addCourseForm.reset();
        }
      });

      // Re-hook your existing Edit Course modal logic to only work if opened directly
      // (Kept for backward compatibility — it will not conflict with the Manage modal above)
      const editModal = document.getElementById('editCourseModal');
      const courseTitleInput = document.getElementById('courseTitleInput');
      const cancelEditBtn = document.getElementById('cancelEdit');
      let currentCourseCard = null;

      // NOTE: We DO NOT attach the old manage-course-btn to this modal now.
      // But if you still have external code opening editCourseModal, the save logic remains functional:

      cancelEditBtn.addEventListener('click', () => {
        editModal.classList.add('hidden');
        currentCourseCard = null;
      });

      document.getElementById('editCourseForm').addEventListener('submit', e => {
        e.preventDefault();
        if (currentCourseCard) {
          const newTitle = courseTitleInput.value.trim();
          if (newTitle) {
            const h3 = currentCourseCard.querySelector('h3');
            if (h3) h3.textContent = newTitle;
            const manageBtn = currentCourseCard.querySelector('.manage-course-btn');
            if (manageBtn) manageBtn.dataset.title = newTitle;
          }
        }
        editModal.classList.add('hidden');
        currentCourseCard = null;
      });

      // Course Search Filter
const courseSearchInput = document.getElementById('courseSearchInput');
courseSearchInput.addEventListener('input', () => {
    const query = courseSearchInput.value.toLowerCase();
    document.querySelectorAll('#coursesGrid .course-card').forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        card.style.display = title.includes(query) ? '' : 'none';
    });
});

      // If any code still tries to open editCourseModal by setting currentCourseCard,
      // you can call:
      // currentCourseCard = someCard; courseTitleInput.value = someCard.querySelector('h3').textContent; editModal.classList.remove('hidden');

      // End of Course Add/Manage logic
    </script>
</body>
</html>
