<?php
// admin_dashboard.php

// Sample data for Admin Dashboard
$teachers = [
    ['id' => 1, 'name' => 'Mr. Smith', 'email' => 'smith@school.edu', 'password' => 'teacher123', 'students_handle' => 42, 'courses_handle' => ['Mathematics in the Modern World', 'Statistics']],
    ['id' => 2, 'name' => 'Ms. Johnson', 'email' => 'johnson@school.edu', 'password' => 'teacher456', 'students_handle' => 38, 'courses_handle' => ['Computer Programming', 'Software Engineering']],
    ['id' => 3, 'name' => 'Mr. Brown', 'email' => 'brown@school.edu', 'password' => 'teacher789', 'students_handle' => 35, 'courses_handle' => ['Art Appreciation']],
];

$students = [
    ['id' => 1, 'name' => 'Lauren Mae Espinar', 'email' => 'lrnmspnr@gmail.com', 'password' => 'student123', 'section' => 'Grade 11 - STEM A', 'courses_taken' => ['Mathematics in the Modern World', 'Computer Programming'], 'courses_not_taken' => ['Art Appreciation', 'Software Engineering']],
    ['id' => 2, 'name' => 'Michael Brown', 'email' => 'michaelbrown@gmail.com', 'password' => 'student456', 'section' => 'Grade 11 - STEM B', 'courses_taken' => ['Computer Programming'], 'courses_not_taken' => ['Mathematics in the Modern World', 'Art Appreciation', 'Software Engineering']],
    ['id' => 3, 'name' => 'Sarah Parker', 'email' => 'sarahparker@gmail.com', 'password' => 'student789', 'section' => 'Grade 12 - HUMSS A', 'courses_taken' => ['Art Appreciation', 'Mathematics in the Modern World'], 'courses_not_taken' => ['Computer Programming', 'Software Engineering']],
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

// Sections data with advisory assignments
$sections = [
    ['name' => 'Grade 11 - STEM A', 'students' => 42, 'adviser' => 'Mr. Smith', 'adviser_id' => 1, 'room' => 'Room 301'],
    ['name' => 'Grade 11 - STEM B', 'students' => 38, 'adviser' => 'Ms. Johnson', 'adviser_id' => 2, 'room' => 'Room 302'],
    ['name' => 'Grade 12 - HUMSS A', 'students' => 35, 'adviser' => 'Mr. Brown', 'adviser_id' => 3, 'room' => 'Room 201'],
    ['name' => 'Grade 12 - ABM A', 'students' => 40, 'adviser' => 'Unassigned', 'adviser_id' => null, 'room' => 'Room 202'],
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
                <button class="nav-link flex items-center gap-3 w-full px-3 py-2 rounded hover:bg-primary-light transition" onclick="showSection(event,'sections')">
                    <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><rect x='3' y='3' width='7' height='7'/><rect x='14' y='3' width='7' height='7'/><rect x='14' y='14' width='7' height='7'/><rect x='3' y='14' width='7' height='7'/></svg>
                    Sections
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
            <button class="flex items-center gap-3 px-3 py-2 rounded hover:bg-primary-light transition w-full">
                <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M18 8v6a6 6 0 11-12 0V8'/></svg>
                Logout
            </button>
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
                            <p class="text-sm md:text-base">Manage users, sections, and monitor system activities.</p>
                        </div>
                    </section>

                    <section class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-primary font-semibold text-2xl mb-6">Active Sections</h2>
                        <div id="activeSectionsGrid" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <?php foreach (array_slice($sections, 0, 4) as $section): ?>
                                <div class="bg-gray-50 rounded-lg shadow-md p-5 border-l-4 border-primary">
                                    <div class="flex justify-between items-start mb-3">
                                        <h3 class="font-bold text-lg text-primary-dark"><?= $section['name'] ?></h3>
                                        <span class="bg-primary text-white text-xs px-2 py-1 rounded-full"><?= $section['students'] ?> students</span>
                                    </div>
                                    <div class="text-sm text-gray-600 space-y-1">
                                        <p><span class="font-medium">Adviser:</span> <?= $section['adviser'] ?></p>
                                        <p><span class="font-medium">Room:</span> <?= $section['room'] ?></p>
                                    </div>
                                    <button class="mt-4 w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition text-sm manage-section-btn" 
                                            data-section='<?= json_encode($section) ?>'>
                                        Manage Section
                                    </button>
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

        <!-- SECTIONS SECTION -->
        <section id="sections" class="content-section hidden-section">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                    <h2 class="text-primary font-semibold text-2xl">Section Management</h2>
                    <div class="flex gap-3 w-full md:w-auto">
                        <input type="text" id="sectionSearchInput" placeholder="Search sections..." 
                            class="border border-gray-300 rounded-md p-2 w-full md:w-64">
                        <button id="addSectionBtn" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-light transition whitespace-nowrap">
                            + Add Section
                        </button>
                    </div>
                </div>

                <div id="sectionsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($sections as $section): ?>
                        <div class="bg-gray-50 rounded-lg shadow-md p-5 border-l-4 border-primary section-card">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="font-bold text-lg text-primary-dark section-name"><?= $section['name'] ?></h3>
                                <button 
    class="bg-primary text-white text-xs px-2 py-1 rounded-full section-students-btn hover:bg-primary-light transition"
    data-section="<?= htmlspecialchars($section['name']) ?>"
>
    <?= $section['students'] ?> students
</button>
                            </div>
                            <div class="text-sm text-gray-600 space-y-2 mb-4">
                                <div class="flex items-center gap-2">
                                    <svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'/></svg>
                                    <span class="section-adviser"><?= $section['adviser'] ?></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'/></svg>
                                    <span class="section-room"><?= $section['room'] ?></span>
                                </div>
                            </div>
                            <button class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition manage-section-btn" 
                                    data-section='<?= json_encode($section) ?>'>
                                Manage Section
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- TEACHERS SECTION -->
        <section id="teachers" class="content-section hidden-section">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <h2 class="text-3xl font-bold text-primary">Teachers</h2>
    <div class="flex gap-3 w-full md:w-auto">
        <input type="text" id="teacherSearchInput" placeholder="Search teachers..."
            class="border border-gray-300 rounded-md p-2 w-full md:w-64">
        <button id="addTeacherBtn" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-light transition whitespace-nowrap">
            + Add Teacher
        </button>
    </div>
</div>
                <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="w-full text-left border-collapse bg-white">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th class="p-3">Name</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Students Handle</th>
                                <th class="p-3">Advisory</th>
                                <th class="p-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="teachersTableBody">
                            <?php foreach ($teachers as $t): ?>
                                <tr class="border-b hover:bg-gray-50 teacher-row" data-teacher='<?= json_encode($t) ?>'>
                                    <td class="p-3 cursor-pointer text-primary hover:underline teacher-name"><?= $t['name'] ?></td>
                                    <td class="p-3 cursor-pointer text-primary hover:underline teacher-email"><?= $t['email'] ?></td>
                                    <td class="p-3"><?= $t['students_handle'] ?></td>
                                    <td class="p-3 text-gray-600">
                                        <?php
                                        $advisory = array_filter($sections, fn($s) => $s['adviser_id'] === $t['id']);
                                        echo $advisory ? reset($advisory)['name'] : 'Not assigned';
                                        ?>
                                    </td>
                                    <td class="p-3">
                                        <div class="flex gap-2">
                                            <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm view-teacher-btn">View</button>
                                            <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm archive-teacher-btn">Archive</button>
                                            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm delete-teacher-btn">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- STUDENTS SECTION -->
        <section id="students" class="content-section hidden-section">
           <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <h2 class="text-3xl font-bold text-primary">Students</h2>
    <div class="flex gap-3 w-full md:w-auto">
        <input type="text" id="studentSearchInput" placeholder="Search students..."
            class="border border-gray-300 rounded-md p-2 w-full md:w-64">
        <button id="addStudentBtn" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-light transition whitespace-nowrap">
            + Add Student
        </button>
    </div>
</div> 
               <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="w-full text-left border-collapse bg-white">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th class="p-3">Name</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Section</th>
                                <th class="p-3">Courses Taken</th>
                                <th class="p-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="studentsTableBody">
                            <?php foreach ($students as $s): ?>
                                <tr class="border-b hover:bg-gray-50 student-row" data-student='<?= json_encode($s) ?>'>
                                    <td class="p-3 cursor-pointer text-primary hover:underline student-name"><?= $s['name'] ?></td>
                                    <td class="p-3 cursor-pointer text-primary hover:underline student-email"><?= $s['email'] ?></td>
                                    <td class="p-3"><?= $s['section'] ?></td>
                                    <td class="p-3"><?= count($s['courses_taken']) ?></td>
                                    <td class="p-3">
                                        <div class="flex gap-2">
                                            <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm view-student-btn">View</button>
                                            <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm archive-student-btn">Archive</button>
                                            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm delete-student-btn">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- ANNOUNCEMENTS SECTION -->
        <section id="announcements" class="content-section hidden-section">
            <h2 class="text-3xl font-bold text-primary mb-4">Announcements</h2>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-gray-600">Manage system announcements</p>
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

    <!-- Add Section Modal -->
    <div id="addSectionModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-40">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 mx-4">
            <h2 class="text-2xl font-semibold text-primary mb-4">Add New Section</h2>
            <form id="addSectionForm">
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Section Name</label>
                    <input type="text" id="addSectionName" class="w-full border border-gray-300 rounded-md p-2" placeholder="e.g., Grade 11 - STEM A" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Number of Students</label>
                    <input type="number" id="addSectionStudents" class="w-full border border-gray-300 rounded-md p-2" placeholder="0" min="0" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Room</label>
                    <input type="text" id="addSectionRoom" class="w-full border border-gray-300 rounded-md p-2" placeholder="e.g., Room 301" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Assign Adviser</label>
                    <select id="addSectionAdviser" class="w-full border border-gray-300 rounded-md p-2">
                        <option value="">No adviser</option>
                        <?php foreach ($teachers as $t): ?>
                            <option value='<?= json_encode(['id' => $t['id'], 'name' => $t['name']]) ?>'><?= $t['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" id="cancelAddSection" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">Add Section</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Manage Section Modal -->
    <div id="manageSectionModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 mx-4">
            <h2 class="text-2xl font-semibold text-primary mb-4">Manage Section</h2>
            <form id="manageSectionForm">
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Section Name</label>
                    <input type="text" id="manageSectionName" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Number of Students</label>
                    <input type="number" id="manageSectionStudents" class="w-full border border-gray-300 rounded-md p-2" min="0" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Room</label>
                    <input type="text" id="manageSectionRoom" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Assign Adviser</label>
                    <select id="manageSectionAdviser" class="w-full border border-gray-300 rounded-md p-2">
                        <option value="">No adviser</option>
                        <?php foreach ($teachers as $t): ?>
                            <option value='<?= json_encode(['id' => $t['id'], 'name' => $t['name']]) ?>'><?= $t['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex justify-between items-center">
                    <button type="button" id="deleteSectionBtn" class="px-4 py-2 rounded-md bg-red-600 text-white hover:bg-red-700">Delete</button>
                    <div class="flex gap-2">
                        <button type="button" id="cancelManageSection" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancel</button>
                        <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Teacher Details Modal -->
    <div id="teacherDetailsModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl p-6 mx-4 max-h-[90vh] overflow-y-auto">
            <h2 class="text-2xl font-semibold text-primary mb-6">Teacher Details</h2>
            <form id="teacherDetailsForm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Name</label>
                        <input type="text" id="teacherName" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Email</label>
                        <input type="email" id="teacherEmail" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Password</label>
                    <input type="text" id="teacherPassword" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Students Handle</label>
                    <input type="number" id="teacherStudentsHandle" class="w-full border border-gray-300 rounded-md p-2" min="0" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Courses Handle</label>
                    <div id="teacherCoursesContainer" class="space-y-2">
                        <!-- Courses will be added dynamically -->
                    </div>
                    <button type="button" id="addTeacherCourse" class="mt-2 text-primary hover:underline text-sm">+ Add Course</button>
                </div>
                <div class="flex justify-end gap-2 pt-4 border-t">
                    <button type="button" id="cancelTeacherDetails" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Student Details Modal -->
    <div id="studentDetailsModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl p-6 mx-4 max-h-[90vh] overflow-y-auto">
            <h2 class="text-2xl font-semibold text-primary mb-6">Student Details</h2>
            <form id="studentDetailsForm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Name</label>
                        <input type="text" id="studentName" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Email</label>
                        <input type="email" id="studentEmail" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Password</label>
                    <input type="text" id="studentPassword" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Section</label>
                    <input type="text" id="studentSection" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Courses Taken</label>
                    <div id="studentCoursesTakenContainer" class="space-y-2">
                        <!-- Courses taken will be added dynamically -->
                    </div>
                    <button type="button" id="addStudentCourseTaken" class="mt-2 text-primary hover:underline text-sm">+ Add Course Taken</button>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Courses Not Taken</label>
                    <div id="studentCoursesNotTakenContainer" class="space-y-2">
                        <!-- Courses not taken will be added dynamically -->
                    </div>
                    <button type="button" id="addStudentCourseNotTaken" class="mt-2 text-primary hover:underline text-sm">+ Add Course Not Taken</button>
                </div>
                <div class="flex justify-end gap-2 pt-4 border-t">
                    <button type="button" id="cancelStudentDetails" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Teacher Modal -->
    <div id="addTeacherModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl p-6 mx-4 max-h-[90vh] overflow-y-auto">
            <h2 class="text-2xl font-semibold text-primary mb-6">Add New Teacher</h2>
            <form id="addTeacherForm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Name</label>
                        <input type="text" id="addTeacherName" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Email</label>
                        <input type="email" id="addTeacherEmail" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Password</label>
                    <input type="text" id="addTeacherPassword" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Students Handle</label>
                    <input type="number" id="addTeacherStudentsHandle" class="w-full border border-gray-300 rounded-md p-2" min="0" value="0" required>
                </div>
                <div class="flex justify-end gap-2 pt-4 border-t">
                    <button type="button" id="cancelAddTeacher" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">Add Teacher</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div id="addStudentModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl p-6 mx-4 max-h-[90vh] overflow-y-auto">
            <h2 class="text-2xl font-semibold text-primary mb-6">Add New Student</h2>
            <form id="addStudentForm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Name</label>
                        <input type="text" id="addStudentName" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Email</label>
                        <input type="email" id="addStudentEmail" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Password</label>
                    <input type="text" id="addStudentPassword" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-gray-700 font-medium">Section</label>
                    <input type="text" id="addStudentSection" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div class="flex justify-end gap-2 pt-4 border-t">
                    <button type="button" id="cancelAddStudent" class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">Add Student</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Announcement Modal -->
<div id="addAnnouncementModal"
     class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 mx-4">
    <h2 class="text-2xl font-semibold text-primary mb-4">Add New Announcement</h2>
    <form id="addAnnouncementForm">
      <div class="mb-4">
        <label class="block mb-2 text-gray-700 font-medium">Announcement Title</label>
        <input type="text" id="announcementTitle"
               class="w-full border border-gray-300 rounded-md p-2"
               placeholder="e.g., System Maintenance on Oct. 25"
               required>
      </div>
      <div class="mb-4">
        <label class="block mb-2 text-gray-700 font-medium">Description</label>
        <textarea id="announcementDescription"
                  class="w-full border border-gray-300 rounded-md p-2 h-24 resize-none"
                  placeholder="Write the details of your announcement..."
                  required></textarea>
      </div>
      <div class="mb-4">
        <label class="block mb-2 text-gray-700 font-medium">Date</label>
        <input type="date" id="announcementDate"
               class="w-full border border-gray-300 rounded-md p-2"
               required>
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" id="cancelAddAnnouncement"
                class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">
          Cancel
        </button>
        <button type="submit"
                class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-light">
          Add Announcement
        </button>
      </div>
    </form>
  </div>
</div>

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

        // Sidebar navigation
        function showSection(evt, sectionId) {
            document.querySelectorAll('.content-section').forEach(sec => sec.classList.add('hidden-section'));
            const target = document.getElementById(sectionId);
            if (target) target.classList.remove('hidden-section');

            document.querySelectorAll('.nav-link').forEach(btn => btn.classList.remove('active-link'));
            if (evt && evt.currentTarget) evt.currentTarget.classList.add('active-link');

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const firstNav = document.querySelector('.nav-link');
            if (firstNav) firstNav.classList.add('active-link');
        });

        // Section Management Logic
        const addSectionBtn = document.getElementById('addSectionBtn');
        const addSectionModal = document.getElementById('addSectionModal');
        const cancelAddSection = document.getElementById('cancelAddSection');
        const addSectionForm = document.getElementById('addSectionForm');

        const manageSectionModal = document.getElementById('manageSectionModal');
        const cancelManageSection = document.getElementById('cancelManageSection');
        const manageSectionForm = document.getElementById('manageSectionForm');
        const deleteSectionBtn = document.getElementById('deleteSectionBtn');

        const sectionsGrid = document.getElementById('sectionsGrid');
        const activeSectionsGrid = document.getElementById('activeSectionsGrid');
        const sectionSearchInput = document.getElementById('sectionSearchInput');

        let currentSectionCard = null;

        // Create section card
        function createSectionCard(sectionData) {
            const card = document.createElement('div');
            card.className = 'bg-gray-50 rounded-lg shadow-md p-5 border-l-4 border-primary section-card';
            card.innerHTML = `
                <div class="flex justify-between items-start mb-3">
                    <h3 class="font-bold text-lg text-primary-dark section-name">${sectionData.name}</h3>
                    <span class="bg-primary text-white text-xs px-2 py-1 rounded-full section-students">${sectionData.students} students</span>
                </div>
                <div class="text-sm text-gray-600 space-y-2 mb-4">
                    <div class="flex items-center gap-2">
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'/></svg>
                        <span class="section-adviser">${sectionData.adviser}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'/></svg>
                        <span class="section-room">${sectionData.room}</span>
                    </div>
                </div>
                <button class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition manage-section-btn" 
                        data-section='${JSON.stringify(sectionData)}'>
                    Manage Section
                </button>
            `;
            attachManageHandler(card);
            return card;
        }

        // Attach manage handler to section card
        function attachManageHandler(card) {
            const btn = card.querySelector('.manage-section-btn');
            if (!btn) return;

            btn.addEventListener('click', () => {
                const sectionData = JSON.parse(btn.dataset.section);
                currentSectionCard = card;
                
                document.getElementById('manageSectionName').value = sectionData.name;
                document.getElementById('manageSectionStudents').value = sectionData.students;
                document.getElementById('manageSectionRoom').value = sectionData.room;
                
                const adviserSelect = document.getElementById('manageSectionAdviser');
                adviserSelect.value = '';
                if (sectionData.adviser_id) {
                    Array.from(adviserSelect.options).forEach(opt => {
                        if (opt.value) {
                            const optData = JSON.parse(opt.value);
                            if (optData.id === sectionData.adviser_id) {
                                adviserSelect.value = opt.value;
                            }
                        }
                    });
                }
                
                manageSectionModal.classList.remove('hidden');
            });
        }

        // Attach handlers to existing cards
        document.querySelectorAll('.manage-section-btn').forEach(btn => {
            const card = btn.closest('.section-card') || btn.closest('div');
            attachManageHandler(card);
        });

        // Open add section modal
        addSectionBtn.addEventListener('click', () => {
            addSectionModal.classList.remove('hidden');
        });

        // Close add section modal
        cancelAddSection.addEventListener('click', () => {
            addSectionModal.classList.add('hidden');
            addSectionForm.reset();
        });

        // Add section form submit
        addSectionForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const name = document.getElementById('addSectionName').value.trim();
            const students = document.getElementById('addSectionStudents').value;
            const room = document.getElementById('addSectionRoom').value.trim();
            const adviserValue = document.getElementById('addSectionAdviser').value;
            
            let adviser = 'Unassigned';
            let adviser_id = null;
            
            if (adviserValue) {
                const adviserData = JSON.parse(adviserValue);
                adviser = adviserData.name;
                adviser_id = adviserData.id;
            }
            
            const sectionData = { name, students, adviser, adviser_id, room };
            
            // Add to sections grid
            const newCard = createSectionCard(sectionData);
            sectionsGrid.appendChild(newCard);
            
            // Add to dashboard active sections (max 4)
            if (activeSectionsGrid.children.length < 4) {
                const dashCard = createSectionCard(sectionData);
                activeSectionsGrid.appendChild(dashCard);
            }
            
            addSectionModal.classList.add('hidden');
            addSectionForm.reset();
        });

        // Close manage section modal
        cancelManageSection.addEventListener('click', () => {
            manageSectionModal.classList.add('hidden');
            currentSectionCard = null;
        });

        // Manage section form submit
        manageSectionForm.addEventListener('submit', (e) => {
            e.preventDefault();
            if (!currentSectionCard) return;
            
            const name = document.getElementById('manageSectionName').value.trim();
            const students = document.getElementById('manageSectionStudents').value;
            const room = document.getElementById('manageSectionRoom').value.trim();
            const adviserValue = document.getElementById('manageSectionAdviser').value;
            
            let adviser = 'Unassigned';
            let adviser_id = null;
            
            if (adviserValue) {
                const adviserData = JSON.parse(adviserValue);
                adviser = adviserData.name;
                adviser_id = adviserData.id;
            }
            
            // Update card display
            currentSectionCard.querySelector('.section-name').textContent = name;
            currentSectionCard.querySelector('.section-students').textContent = students + ' students';
            currentSectionCard.querySelector('.section-adviser').textContent = adviser;
            currentSectionCard.querySelector('.section-room').textContent = room;
            
            // Update button data
            const btn = currentSectionCard.querySelector('.manage-section-btn');
            const sectionData = { name, students, adviser, adviser_id, room };
            btn.dataset.section = JSON.stringify(sectionData);
            
            manageSectionModal.classList.add('hidden');
            currentSectionCard = null;
        });

        // Delete section
        deleteSectionBtn.addEventListener('click', () => {
            if (!currentSectionCard) return;
            if (confirm('Are you sure you want to delete this section?')) {
                const sectionName = currentSectionCard.querySelector('.section-name').textContent;
                
                // Remove from sections grid
                currentSectionCard.remove();
                
                // Remove from dashboard if exists
                document.querySelectorAll('#activeSectionsGrid .section-card').forEach(card => {
                    if (card.querySelector('.section-name').textContent === sectionName) {
                        card.remove();
                    }
                });
                
                manageSectionModal.classList.add('hidden');
                currentSectionCard = null;
            }
        });

        // ===== SHOW STUDENTS BY SECTION =====
document.querySelectorAll('.section-students-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const sectionName = btn.dataset.section;

        // Switch to the Students section
        showSection(null, 'students');

        // Filter students by section
        document.querySelectorAll('#studentsTableBody tr').forEach(row => {
            const studentData = JSON.parse(row.dataset.student);
            if (studentData.section === sectionName) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        // Optionally scroll up
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

        // Search sections

        // ===== SECTION SEARCH =====
        sectionSearchInput.addEventListener('input', () => {
            const query = sectionSearchInput.value.toLowerCase();
            document.querySelectorAll('#sectionsGrid .section-card').forEach(card => {
                const name = card.querySelector('.section-name').textContent.toLowerCase();
                const adviser = card.querySelector('.section-adviser').textContent.toLowerCase();
                const room = card.querySelector('.section-room').textContent.toLowerCase();
                
                if (name.includes(query) || adviser.includes(query) || room.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // ===== TEACHER SEARCH =====
const teacherSearchInput = document.getElementById('teacherSearchInput');
if (teacherSearchInput) {
    teacherSearchInput.addEventListener('input', () => {
        const query = teacherSearchInput.value.toLowerCase();
        document.querySelectorAll('#teachersTableBody tr').forEach(row => {
            const name = row.querySelector('.teacher-name')?.textContent.toLowerCase() || '';
            const email = row.querySelector('.teacher-email')?.textContent.toLowerCase() || '';
            const students = row.children[2]?.textContent.toLowerCase() || '';
            const advisory = row.children[3]?.textContent.toLowerCase() || '';

            if (
                name.includes(query) ||
                email.includes(query) ||
                students.includes(query) ||
                advisory.includes(query)
            ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}

// ===== STUDENT SEARCH =====
const studentSearchInput = document.getElementById('studentSearchInput');
if (studentSearchInput) {
    studentSearchInput.addEventListener('input', () => {
        const query = studentSearchInput.value.toLowerCase();
        document.querySelectorAll('#studentsTableBody tr').forEach(row => {
            const name = row.querySelector('.student-name')?.textContent.toLowerCase() || '';
            const email = row.querySelector('.student-email')?.textContent.toLowerCase() || '';
            const section = row.children[2]?.textContent.toLowerCase() || '';
            const courses = row.children[3]?.textContent.toLowerCase() || '';

            if (
                name.includes(query) ||
                email.includes(query) ||
                section.includes(query) ||
                courses.includes(query)
            ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}

        // Close modals on overlay click
        addSectionModal.addEventListener('click', (e) => {
            if (e.target === addSectionModal) {
                addSectionModal.classList.add('hidden');
                addSectionForm.reset();
            }
        });

        manageSectionModal.addEventListener('click', (e) => {
            if (e.target === manageSectionModal) {
                manageSectionModal.classList.add('hidden');
                currentSectionCard = null;
            }
        });

        // ====== TEACHER MANAGEMENT ======
        const teacherDetailsModal = document.getElementById('teacherDetailsModal');
        const addTeacherModal = document.getElementById('addTeacherModal');
        const addTeacherBtn = document.getElementById('addTeacherBtn');
        const teachersTableBody = document.getElementById('teachersTableBody');
        let currentTeacherRow = null;

        // Open teacher details modal when clicking name or email
        function attachTeacherClickHandlers(row) {
            const nameEl = row.querySelector('.teacher-name');
            const emailEl = row.querySelector('.teacher-email');
            const viewBtn = row.querySelector('.view-teacher-btn');
            
            [nameEl, emailEl, viewBtn].forEach(el => {
                if (el) {
                    el.addEventListener('click', () => {
                        const teacherData = JSON.parse(row.dataset.teacher);
                        openTeacherDetailsModal(teacherData, row);
                    });
                }
            });

            // Archive button
            const archiveBtn = row.querySelector('.archive-teacher-btn');
            if (archiveBtn) {
                archiveBtn.addEventListener('click', () => {
                    if (confirm('Archive this teacher?')) {
                        row.style.opacity = '0.5';
                        row.style.backgroundColor = '#fef3c7';
                        alert('Teacher archived successfully!');
                    }
                });
            }

            // Delete button
            const deleteBtn = row.querySelector('.delete-teacher-btn');
            if (deleteBtn) {
                deleteBtn.addEventListener('click', () => {
                    if (confirm('Are you sure you want to delete this teacher? This action cannot be undone.')) {
                        row.remove();
                        alert('Teacher deleted successfully!');
                    }
                });
            }
        }

        // Attach handlers to existing teacher rows
        document.querySelectorAll('.teacher-row').forEach(row => {
            attachTeacherClickHandlers(row);
        });

        function openTeacherDetailsModal(data, row) {
            currentTeacherRow = row;
            document.getElementById('teacherName').value = data.name;
            document.getElementById('teacherEmail').value = data.email;
            document.getElementById('teacherPassword').value = data.password;
            document.getElementById('teacherStudentsHandle').value = data.students_handle;
            
            // Populate courses
            const coursesContainer = document.getElementById('teacherCoursesContainer');
            coursesContainer.innerHTML = '';
            if (data.courses_handle && data.courses_handle.length > 0) {
                data.courses_handle.forEach(course => {
                    addTeacherCourseField(course);
                });
            }
            
            teacherDetailsModal.classList.remove('hidden');
        }

        function addTeacherCourseField(value = '') {
            const coursesContainer = document.getElementById('teacherCoursesContainer');
            const courseDiv = document.createElement('div');
            courseDiv.className = 'flex gap-2';
            courseDiv.innerHTML = `
                <input type="text" class="flex-1 border border-gray-300 rounded-md p-2 teacher-course-input" value="${value}" placeholder="Course name">
                <button type="button" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 remove-course-btn">Remove</button>
            `;
            courseDiv.querySelector('.remove-course-btn').addEventListener('click', () => courseDiv.remove());
            coursesContainer.appendChild(courseDiv);
        }

        document.getElementById('addTeacherCourse').addEventListener('click', () => {
            addTeacherCourseField();
        });

        // Save teacher details
        document.getElementById('teacherDetailsForm').addEventListener('submit', (e) => {
            e.preventDefault();
            if (!currentTeacherRow) return;

            const name = document.getElementById('teacherName').value.trim();
            const email = document.getElementById('teacherEmail').value.trim();
            const password = document.getElementById('teacherPassword').value.trim();
            const studentsHandle = document.getElementById('teacherStudentsHandle').value;
            
            const courses = [];
            document.querySelectorAll('.teacher-course-input').forEach(input => {
                if (input.value.trim()) courses.push(input.value.trim());
            });

            // Update row data
            const teacherData = {
                id: JSON.parse(currentTeacherRow.dataset.teacher).id,
                name,
                email,
                password,
                students_handle: studentsHandle,
                courses_handle: courses
            };
                        // Update dataset
            currentTeacherRow.dataset.teacher = JSON.stringify(teacherData);

            // Update visible columns
            currentTeacherRow.querySelector('.teacher-name').textContent = name;
            currentTeacherRow.querySelector('.teacher-email').textContent = email;
            currentTeacherRow.querySelector('td:nth-child(3)').textContent = studentsHandle;

            teacherDetailsModal.classList.add('hidden');
            currentTeacherRow = null;
            alert('Teacher details saved successfully!');
        });

        // Close teacher details modal
        document.getElementById('cancelTeacherDetails').addEventListener('click', () => {
            teacherDetailsModal.classList.add('hidden');
            currentTeacherRow = null;
        });

        teacherDetailsModal.addEventListener('click', (e) => {
            if (e.target === teacherDetailsModal) {
                teacherDetailsModal.classList.add('hidden');
                currentTeacherRow = null;
            }
        });

        // Add new teacher
        addTeacherBtn.addEventListener('click', () => {
            addTeacherModal.classList.remove('hidden');
        });

        document.getElementById('cancelAddTeacher').addEventListener('click', () => {
            addTeacherModal.classList.add('hidden');
            document.getElementById('addTeacherForm').reset();
        });

        document.getElementById('addTeacherForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('addTeacherName').value.trim();
            const email = document.getElementById('addTeacherEmail').value.trim();
            const password = document.getElementById('addTeacherPassword').value.trim();
            const studentsHandle = document.getElementById('addTeacherStudentsHandle').value;

            const newTeacher = {
                id: Date.now(),
                name,
                email,
                password,
                students_handle: studentsHandle,
                courses_handle: []
            };

            const row = document.createElement('tr');
            row.className = 'border-b hover:bg-gray-50 teacher-row';
            row.dataset.teacher = JSON.stringify(newTeacher);
            row.innerHTML = `
                <td class="p-3 cursor-pointer text-primary hover:underline teacher-name">${name}</td>
                <td class="p-3 cursor-pointer text-primary hover:underline teacher-email">${email}</td>
                <td class="p-3">${studentsHandle}</td>
                <td class="p-3 text-gray-600">Not assigned</td>
                <td class="p-3">
                    <div class="flex gap-2">
                        <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm view-teacher-btn">View</button>
                        <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm archive-teacher-btn">Archive</button>
                        <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm delete-teacher-btn">Delete</button>
                    </div>
                </td>
            `;
            teachersTableBody.appendChild(row);
            attachTeacherClickHandlers(row);

            addTeacherModal.classList.add('hidden');
            e.target.reset();
            alert('Teacher added successfully!');
        });

        addTeacherModal.addEventListener('click', (e) => {
            if (e.target === addTeacherModal) {
                addTeacherModal.classList.add('hidden');
            }
        });

        // ====== STUDENT MANAGEMENT ======
        const studentDetailsModal = document.getElementById('studentDetailsModal');
        const addStudentModal = document.getElementById('addStudentModal');
        const addStudentBtn = document.getElementById('addStudentBtn');
        const studentsTableBody = document.getElementById('studentsTableBody');
        let currentStudentRow = null;

        // Add new student
        addStudentBtn.addEventListener('click', () => {
            addStudentModal.classList.remove('hidden');
        });

        document.getElementById('cancelAddStudent').addEventListener('click', () => {
            addStudentModal.classList.add('hidden');
            document.getElementById('addStudentForm').reset();
        });

        document.getElementById('addStudentForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('addStudentName').value.trim();
            const email = document.getElementById('addStudentEmail').value.trim();
            const password = document.getElementById('addStudentPassword').value.trim();
            const section = document.getElementById('addStudentSection').value.trim();

            const newStudent = {
                id: Date.now(),
                name,
                email,
                password,
                section,
                courses_taken: [],
                courses_not_taken: []
            };

            const row = document.createElement('tr');
            row.className = 'border-b hover:bg-gray-50 student-row';
            row.dataset.student = JSON.stringify(newStudent);
            row.innerHTML = `
                <td class="p-3 cursor-pointer text-primary hover:underline student-name">${name}</td>
                <td class="p-3 cursor-pointer text-primary hover:underline student-email">${email}</td>
                <td class="p-3">${section}</td>
                <td class="p-3">0</td>
                <td class="p-3">
                    <div class="flex gap-2">
                        <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm view-student-btn">View</button>
                        <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm archive-student-btn">Archive</button>
                        <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm delete-student-btn">Delete</button>
                    </div>
                </td>
            `;
            studentsTableBody.appendChild(row);
            attachStudentClickHandlers(row);

            addStudentModal.classList.add('hidden');
            e.target.reset();
            alert('Student added successfully!');
        });

        addStudentModal.addEventListener('click', (e) => {
            if (e.target === addStudentModal) {
                addStudentModal.classList.add('hidden');
            }
        });

        // Student row click
        function attachStudentClickHandlers(row) {
            const nameEl = row.querySelector('.student-name');
            const emailEl = row.querySelector('.student-email');
            const viewBtn = row.querySelector('.view-student-btn');

            [nameEl, emailEl, viewBtn].forEach(el => {
                if (el) {
                    el.addEventListener('click', () => {
                        const studentData = JSON.parse(row.dataset.student);
                        openStudentDetailsModal(studentData, row);
                    });
                }
            });

            const archiveBtn = row.querySelector('.archive-student-btn');
            if (archiveBtn) {
                archiveBtn.addEventListener('click', () => {
                    if (confirm('Archive this student?')) {
                        row.style.opacity = '0.5';
                        row.style.backgroundColor = '#fef3c7';
                        alert('Student archived successfully!');
                    }
                });
            }

            const deleteBtn = row.querySelector('.delete-student-btn');
            if (deleteBtn) {
                deleteBtn.addEventListener('click', () => {
                    if (confirm('Are you sure you want to delete this student?')) {
                        row.remove();
                        alert('Student deleted successfully!');
                    }
                });
            }
        }

        document.querySelectorAll('.student-row').forEach(row => attachStudentClickHandlers(row));

        function openStudentDetailsModal(data, row) {
            currentStudentRow = row;
            document.getElementById('studentName').value = data.name;
            document.getElementById('studentEmail').value = data.email;
            document.getElementById('studentPassword').value = data.password;
            document.getElementById('studentSection').value = data.section;

            const takenContainer = document.getElementById('studentCoursesTakenContainer');
            const notTakenContainer = document.getElementById('studentCoursesNotTakenContainer');
            takenContainer.innerHTML = '';
            notTakenContainer.innerHTML = '';

            if (data.courses_taken) {
                data.courses_taken.forEach(c => addStudentCourseField(takenContainer, c));
            }
            if (data.courses_not_taken) {
                data.courses_not_taken.forEach(c => addStudentCourseField(notTakenContainer, c));
            }

            studentDetailsModal.classList.remove('hidden');
        }

        function addStudentCourseField(container, value = '') {
            const div = document.createElement('div');
            div.className = 'flex gap-2';
            div.innerHTML = `
                <input type="text" class="flex-1 border border-gray-300 rounded-md p-2 student-course-input" value="${value}">
                <button type="button" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 remove-course-btn">Remove</button>
            `;
            div.querySelector('.remove-course-btn').addEventListener('click', () => div.remove());
            container.appendChild(div);
        }

        document.getElementById('addStudentCourseTaken').addEventListener('click', () => {
            addStudentCourseField(document.getElementById('studentCoursesTakenContainer'));
        });
        document.getElementById('addStudentCourseNotTaken').addEventListener('click', () => {
            addStudentCourseField(document.getElementById('studentCoursesNotTakenContainer'));
        });

        document.getElementById('studentDetailsForm').addEventListener('submit', (e) => {
            e.preventDefault();
            if (!currentStudentRow) return;

            const name = document.getElementById('studentName').value.trim();
            const email = document.getElementById('studentEmail').value.trim();
            const password = document.getElementById('studentPassword').value.trim();
            const section = document.getElementById('studentSection').value.trim();

            const coursesTaken = [];
            document.querySelectorAll('#studentCoursesTakenContainer .student-course-input').forEach(input => {
                if (input.value.trim()) coursesTaken.push(input.value.trim());
            });
            const coursesNotTaken = [];
            document.querySelectorAll('#studentCoursesNotTakenContainer .student-course-input').forEach(input => {
                if (input.value.trim()) coursesNotTaken.push(input.value.trim());
            });

            const updatedData = {
                id: JSON.parse(currentStudentRow.dataset.student).id,
                name,
                email,
                password,
                section,
                courses_taken: coursesTaken,
                courses_not_taken: coursesNotTaken
            };

            currentStudentRow.dataset.student = JSON.stringify(updatedData);
            currentStudentRow.querySelector('.student-name').textContent = name;
            currentStudentRow.querySelector('.student-email').textContent = email;
            currentStudentRow.querySelector('td:nth-child(3)').textContent = section;
            currentStudentRow.querySelector('td:nth-child(4)').textContent = coursesTaken.length;

            studentDetailsModal.classList.add('hidden');
            currentStudentRow = null;
            alert('Student details saved successfully!');
        });

        document.getElementById('cancelStudentDetails').addEventListener('click', () => {
            studentDetailsModal.classList.add('hidden');
            currentStudentRow = null;
        });

        studentDetailsModal.addEventListener('click', (e) => {
            if (e.target === studentDetailsModal) {
                studentDetailsModal.classList.add('hidden');
                currentStudentRow = null;
            }
        });

        // ===== ANNOUNCEMENT MANAGEMENT =====
const addAnnouncementBtn = document.querySelector('#announcements button.bg-primary');
const addAnnouncementModal = document.getElementById('addAnnouncementModal');
const cancelAddAnnouncement = document.getElementById('cancelAddAnnouncement');
const addAnnouncementForm = document.getElementById('addAnnouncementForm');
const announcementsList = document.querySelector('#announcements ul');

// Open modal
addAnnouncementBtn.addEventListener('click', () => {
  addAnnouncementModal.classList.remove('hidden');
});

// Close modal
cancelAddAnnouncement.addEventListener('click', () => {
  addAnnouncementModal.classList.add('hidden');
  addAnnouncementForm.reset();
});

// Close modal when clicking overlay
addAnnouncementModal.addEventListener('click', e => {
  if (e.target === addAnnouncementModal) {
    addAnnouncementModal.classList.add('hidden');
    addAnnouncementForm.reset();
  }
});

// Add new announcement
addAnnouncementForm.addEventListener('submit', e => {
  e.preventDefault();

  const title = document.getElementById('announcementTitle').value.trim();
  const description = document.getElementById('announcementDescription').value.trim();
  const date = document.getElementById('announcementDate').value;

  if (!title || !description || !date) return;

  const li = document.createElement('li');
  li.className = 'py-4 flex flex-col md:flex-row md:justify-between md:items-start';
  li.innerHTML = `
    <div class="max-w-md">
      <h3 class="font-semibold text-gray-800">${title}</h3>
      <p class="text-sm text-gray-600 mt-1">${description}</p>
      <p class="text-xs text-gray-500 mt-1">
        ${new Date(date).toLocaleDateString('en-US', {year:'numeric',month:'long',day:'numeric'})}
      </p>
    </div>
    <div class="mt-3 md:mt-0 flex gap-2">
      <button class="px-3 py-1 rounded border border-gray-200 hover:bg-gray-50 view-announcement">View</button>
      <button class="px-3 py-1 rounded border border-gray-200 hover:bg-gray-50 edit-announcement">Edit</button>
      <button class="px-3 py-1 rounded border border-red-200 text-red-600 hover:bg-red-50 delete-announcement">Delete</button>
    </div>
  `;

  announcementsList.prepend(li);
  addAnnouncementModal.classList.add('hidden');
  addAnnouncementForm.reset();
  alert('Announcement added successfully!');
});

// Handle view / edit / delete
document.addEventListener('click', e => {
  const btn = e.target;
  const li = btn.closest('li');
  if (!li) return;

  const titleEl = li.querySelector('h3');
  const descEl = li.querySelector('p.text-sm');
  const dateEl = li.querySelector('p.text-xs');

  if (btn.classList.contains('delete-announcement')) {
    if (confirm('Delete this announcement?')) li.remove();
  }

  if (btn.classList.contains('edit-announcement')) {
    const newTitle = prompt('Edit title:', titleEl.textContent);
    const newDesc = prompt('Edit description:', descEl.textContent);
    if (newTitle && newDesc) {
      titleEl.textContent = newTitle;
      descEl.textContent = newDesc;
      alert('Announcement updated!');
    }
  }

  if (btn.classList.contains('view-announcement')) {
    alert(`📢 ${titleEl.textContent}\n\n${descEl.textContent}\n\n${dateEl.textContent}`);
  }
});

    </script>
</body>
</html>
