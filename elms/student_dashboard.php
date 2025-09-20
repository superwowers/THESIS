<?php
// Sample enrolled courses and lessons for demonstration
$enrolledCourses = [
    [
        'name' => 'Mathematics',
        'lessons' => ['Algebra', 'Geometry', 'Calculus']
    ],
    [
        'name' => 'Physics',
        'lessons' => ['Mechanics', 'Thermodynamics', 'Optics']
    ],
    [
        'name' => 'English Literature',
        'lessons' => ['Poetry', 'Novels', 'Drama']
    ],
];

// Sample announcements/news
$announcements = [
    ['title' => 'School reopens on Sept 1', 'date' => '2024-08-20'],
    ['title' => 'New library books available', 'date' => '2024-08-18'],
    ['title' => 'Midterm exams schedule released', 'date' => '2024-08-15'],
];

// Sample to-do list
$todoList = [
    'Submit Math assignment 3',
    'Prepare for Physics quiz',
    'Read English novel chapter 5',
];

// Sample subject courses for the new grid
$subjectCourses = [
    ['title' => 'Mathematics in the Modern World', 'image' => 'https://images.unsplash.com/photo-1534723447668-b789965b3c53?auto=format&fit=crop&w=400&q=80'],
    ['title' => 'Introduction to Programming', 'image' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=400&q=80'],
    ['title' => 'General Chemistry I', 'image' => 'https://images.unsplash.com/photo-1596706059904-802523293e50?auto=format&fit=crop&w=400&q=80'],
    ['title' => 'World History: Ancient Civilizations', 'image' => 'https://images.unsplash.com/photo-1550993510-1e82e2f3d6b3?auto=format&fit=crop&w=400&q=80'],
    ['title' => 'Fundamentals of Biology', 'image' => 'https://images.unsplash.com/photo-1552504936-a602ed059c1c?auto=format&fit=crop&w=400&q=80'],
    ['title' => 'English Composition', 'image' => 'https://images.unsplash.com/photo-1521740924773-f14f179b0086?auto=format&fit=crop&w=400&q=80'],
    ['title' => 'Art Appreciation', 'image' => 'https://images.unsplash.com/photo-1517865611140-5e3e2c3e1e90?auto=format&fit=crop&w=400&q=80'],
    ['title' => 'Basic Economics', 'image' => 'https://images.unsplash.com/photo-1610499648937-2d4e7d4c7b8e?auto=format&fit=crop&w=400&q=80'],
];
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #710E0E;
            --primary-light: #8a2b2b;
            --primary-dark: #5a0a0a;
        }
        /* Custom scrollbar for sidebar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: var(--primary-light);
            border-radius: 3px;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#710E0E',
                            light: '#8a2b2b',
                            dark: '#5a0a0a',
                        }
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-poppins bg-gradient-to-br from-primary to-primary-dark min-h-screen text-gray-800 flex flex-col md:flex-row">

    <!-- Sidebar -->
    <nav class="bg-primary-dark text-white w-full md:w-64 min-h-[60px] md:min-h-screen p-4 md:p-6 flex md:flex-col items-center md:items-start sticky top-0 z-30">
        <h1 class="text-2xl md:text-3xl font-bold mb-0 md:mb-10">ELMS</h1>
        <ul class="flex md:flex-col gap-6 md:gap-4 flex-grow justify-center md:justify-start w-full">
            <li>
                <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"/></svg>
                    <span class="hidden md:inline">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"/></svg>
                    <span class="hidden md:inline">Courses</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6a2 2 0 012-2h6"/></svg>
                    <span class="hidden md:inline">Assignments</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="7" r="4" /><path stroke-linecap="round" stroke-linejoin="round" d="M5.5 21a6.5 6.5 0 0113 0"/></svg>
                    <span class="hidden md:inline">Users</span>
                </a>
            </li>
        </ul>
        <div class="mt-0 md:mt-auto pt-2 md:pt-6 border-t border-primary-light w-full flex justify-center md:justify-start">
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 8v6a6 6 0 11-12 0V8"/></svg>
                <span class="hidden md:inline">Help</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow p-4 md:p-6 flex flex-col gap-8 max-w-7xl mx-auto w-full">

        <!-- Top Right Header: Welcome, Notifications, Messages, User Info -->
        <header class="flex justify-between items-center bg-white rounded-xl shadow-lg p-4 md:p-6">
            <div class="text-xl md:text-2xl font-semibold text-primary-dark">
                Welcome, <span class="text-primary">John Doe!</span>
            </div>
            <div class="flex items-center gap-4">
                <button class="relative text-gray-600 hover:text-primary transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">3</span>
                </button>
                <button class="text-gray-600 hover:text-primary transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                </button>
                <button class="flex items-center gap-2 text-gray-600 hover:text-primary transition">
                    <img src="https://via.placeholder.com/32" alt="User Avatar" class="w-8 h-8 rounded-full border-2 border-primary-light">
                    <span class="hidden md:inline font-medium">John Doe</span>
                </button>
            </div>
        </header>

        <!-- Main content area divided into center and right sections -->
        <section class="flex flex-col md:flex-row gap-8 w-full">

            <!-- Center Content: Announcement Banner + Enrolled Courses Grid -->
            <div class="md:w-2/3 flex flex-col gap-8">

                <!-- Announcement Banner with click dropdown -->
                <section id="announcement-card" class="relative rounded-lg shadow-lg overflow-hidden cursor-pointer group w-full" onclick="toggleCoursesDropdown()">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80" alt="School Announcement" class="w-full h-48 md:h-64 object-cover brightness-90 group-hover:brightness-75 transition" />
                    <div class="absolute inset-0 bg-gradient-to-t from-primary-dark/80 to-transparent"></div>
                    <div class="absolute bottom-4 left-6 text-white z-10">
                        <h2 class="text-2xl md:text-3xl font-bold">School Announcement</h2>
                        <p class="mt-1 max-w-xl text-sm md:text-base">Welcome back! Check out your courses and upcoming lessons.</p>
                    </div>

                    <!-- Dropdown with courses and lessons -->
                    <div id="courses-dropdown" class="absolute top-full left-0 w-full bg-white shadow-lg rounded-b-lg opacity-0 invisible transform translate-y-2 transition-all duration-300 z-20 max-h-72 overflow-y-auto border border-primary-light">
                        <div class="p-4">
                            <h3 class="text-primary font-semibold text-xl mb-3">Your Enrolled Courses</h3>
                            <?php foreach ($enrolledCourses as $course): ?>
                                <div class="mb-4">
                                    <h4 class="font-semibold text-primary-dark mb-1"><?= htmlspecialchars($course['name']) ?></h4>
                                    <ul class="list-disc list-inside text-gray-700">
                                        <?php foreach ($course['lessons'] as $lesson): ?>
                                            <li><?= htmlspecialchars($lesson) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>

                <!-- Enrolled Courses Grid -->
                <section class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                    <h2 class="text-primary font-semibold text-2xl mb-6">Enrolled Courses</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($subjectCourses as $course): ?>
                            <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden flex flex-col">
                                <img src="<?= htmlspecialchars($course['image']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="w-full h-36 object-cover" />
                                <div class="p-4 flex flex-col flex-grow">
                                    <h3 class="font-bold text-lg text-primary-dark mb-2 flex-grow"><?= htmlspecialchars($course['title']) ?></h3>
                                    <button class="mt-auto bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition w-full">
                                        View Course
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

            </div>

            <!-- Right Sidebar: Calendar, To-Do List, Announcements -->
            <aside class="w-full md:w-1/3 flex flex-col gap-8">

                <!-- Calendar Card (Moved to top) -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                    <h2 class="text-primary font-semibold text-2xl mb-4 text-center">Calendar</h2>
                    <div id="calendar" class="w-full"></div>
                </div>

                <!-- To-Do List Card (Moved after Calendar) -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                    <h2 class="text-primary font-semibold text-xl mb-4">To-Do List</h2>
                    <ul class="space-y-3">
                        <?php foreach ($todoList as $index => $todo): ?>
                            <li class="flex items-center gap-3">
                                <input type="checkbox" id="todo-<?= $index ?>" class="w-5 h-5 text-primary focus:ring-primary border-gray-300 rounded" />
                                <label for="todo-<?= $index ?>" class="text-gray-800 select-none"><?= htmlspecialchars($todo) ?></label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Announcements / News Card (Moved to the bottom of the right sidebar) -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                    <h2 class="text-primary font-semibold text-xl mb-4">Latest Announcements</h2>
                    <ul class="divide-y divide-gray-200">
                        <?php foreach ($announcements as $news): ?>
                            <li class="py-3 flex justify-between items-center">
                                <p class="font-semibold text-gray-800"><?= htmlspecialchars($news['title']) ?></p>
                                <span class="text-sm text-white bg-primary rounded-full px-3 py-1 select-none"><?= date('M j', strtotime($news['date'])) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </aside>
        </section>

    </main>

    <script>
        // Simple calendar script
        const calendarEl = document.getElementById('calendar');

        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        function createCalendar(year, month) {
            calendarEl.innerHTML = '';

            // Header with month and year + navigation
            const header = document.createElement('div');
            header.className = 'flex justify-between items-center mb-4';

            const prevBtn = document.createElement('button');
            prevBtn.textContent = '<';
            prevBtn.className = 'text-primary font-bold px-3 py-1 rounded hover:bg-primary-light hover:text-white transition';
            prevBtn.onclick = () => {
                if (month === 0) {
                    month = 11;
                    year--;
                } else {
                    month--;
                }
                createCalendar(year, month);
            };

            const nextBtn = document.createElement('button');
            nextBtn.textContent = '>';
            nextBtn.className = 'text-primary font-bold px-3 py-1 rounded hover:bg-primary-light hover:text-white transition';
            nextBtn.onclick = () => {
                if (month === 11) {
                    month = 0;
                    year++;
                } else {
                    month++;
                }
                createCalendar(year, month);
            };

            const monthYear = document.createElement('div');
            monthYear.className = 'text-xl font-semibold text-primary';
            monthYear.textContent = new Date(year, month).toLocaleString('default', { month: 'long', year: 'numeric' });

            header.appendChild(prevBtn);
            header.appendChild(monthYear);
            header.appendChild(nextBtn);

            calendarEl.appendChild(header);

            // Days of week row
            const daysRow = document.createElement('div');
            daysRow.className = 'grid grid-cols-7 text-center font-semibold text-primary mb-2';
            daysOfWeek.forEach(day => {
                const dayEl = document.createElement('div');
                dayEl.textContent = day;
                daysRow.appendChild(dayEl);
            });
            calendarEl.appendChild(daysRow);

            // Dates grid
            const datesGrid = document.createElement('div');
            datesGrid.className = 'grid grid-cols-7 gap-1 text-center';

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            // Blank days before first day
            for (let i = 0; i < firstDay; i++) {
                const blank = document.createElement('div');
                blank.className = 'p-2';
                datesGrid.appendChild(blank);
            }

            // Dates
            for (let date = 1; date <= daysInMonth; date++) {
                const dateEl = document.createElement('div');
                dateEl.textContent = date;
                dateEl.className = 'p-2 rounded cursor-pointer hover:bg-primary-light hover:text-white transition';

                // Highlight today
                const today = new Date();
                if (date === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                    dateEl.classList.add('bg-primary', 'text-white', 'font-bold');
                }

                datesGrid.appendChild(dateEl);
            }

            calendarEl.appendChild(datesGrid);
        }

        const now = new Date();
        createCalendar(now.getFullYear(), now.getMonth());

        // Function to toggle the courses dropdown
        function toggleCoursesDropdown() {
            const dropdown = document.getElementById('courses-dropdown');
            if (dropdown.classList.contains('opacity-0')) {
                dropdown.classList.remove('opacity-0', 'invisible', 'translate-y-2');
                dropdown.classList.add('opacity-100', 'visible', 'translate-y-0');
            } else {
                dropdown.classList.remove('opacity-100', 'visible', 'translate-y-0');
                dropdown.classList.add('opacity-0', 'invisible', 'translate-y-2');
            }
        }
    </script>

</body>
</html>