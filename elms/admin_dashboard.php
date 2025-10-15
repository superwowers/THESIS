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
      <li><button onclick="showSection('dashboard')" class="flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M3 12l2-2m0 0l7-7 7 7M13 5v6h6'/></svg> Dashboard</button></li>
      <li><button onclick="showSection('courses')" class="flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M12 20h9'/></svg> Courses</button></li>
      <li><button onclick="showSection('teachers')" class="flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M9 17v-6a2 2 0 012-2h6'/></svg> Teachers</button></li>
      <li><button onclick="showSection('students')" class="flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><circle cx='12' cy='7' r='4'/><path stroke-linecap='round' stroke-linejoin='round' d='M5.5 21a6.5 6.5 0 0113 0'/></svg> Students</button></li>
      <li><button onclick="showSection('reports')" class="flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M3 3h18v18H3z'/></svg> Reports</button></li>
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
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <?php foreach ($courses as $course): ?>
                                <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden flex flex-col">
                                    <img src="<?= $course['image'] ?>" class="w-full h-36 object-cover">
                                    <div class="p-4 flex flex-col flex-grow">
                                        <h3 class="font-bold text-lg text-primary-dark mb-2"><?= $course['title'] ?></h3>
                                        <button class="mt-auto bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition">Manage</button>
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

                    <!-- Announcements -->
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
            <h2 class="text-3xl font-bold text-primary mb-4">All Courses</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($courses as $course): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                        <img src="<?= $course['image'] ?>" class="w-full h-36 object-cover">
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="font-bold text-lg text-primary-dark mb-2"><?= $course['title'] ?></h3>
                            <button class="mt-auto bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition">manage</button>
                        </div>
                    </div>
                <?php endforeach; ?>
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

        // Sidebar button switching
        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(sec => sec.classList.add('hidden-section'));
            document.getElementById(sectionId).classList.remove('hidden-section');

            document.querySelectorAll('.nav-link').forEach(btn => btn.classList.remove('active-link'));
            event.currentTarget.classList.add('active-link');
        }
    </script>
</body>
</html>
