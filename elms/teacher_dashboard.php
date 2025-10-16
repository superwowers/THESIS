<?php

$enrolledCourses = [
    ['name' => 'Mathematics', 'lessons' => ['Algebra', 'Geometry', 'Calculus']],
    ['name' => 'Physics', 'lessons' => ['Mechanics', 'Thermodynamics', 'Optics']],
    ['name' => 'English Literature', 'lessons' => ['Poetry', 'Novels', 'Drama']],
];

$announcements = [
    ['title' => 'School reopens on Sept 1', 'date' => '2024-08-20'],
    ['title' => 'New library books available', 'date' => '2024-08-18'],
    ['title' => 'Midterm exams schedule released', 'date' => '2024-08-15'],
];

$todoList = [
    'Assignments to grade',
    'Pending activities',
];

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


$page = $_GET['page'] ?? 'teacher';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ELMS - Teacher Panel</title>

   
    <script src="https://cdn.tailwindcss.com"></script>

    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #710E0E;
            --primary-light: #8a2b2b;
            --primary-dark: #5a0a0a;
        }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background-color: var(--primary-light); border-radius: 3px; }

        
        .font-poppins { font-family: 'Poppins', sans-serif; }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { DEFAULT: '#710E0E', light: '#8a2b2b', dark: '#5a0a0a' }
                    },
                    fontFamily: { poppins: ['Poppins', 'serif'] }
                }
            }
        }
    </script>
</head>
<body class="font-poppins bg-gradient-to-br from-primary to-primary-dark min-h-screen text-gray-800 flex flex-col md:flex-row">

   
    <nav class="bg-primary-dark text-white w-full md:w-64 min-h-[60px] md:min-h-screen p-4 md:p-6 flex md:flex-col items-center md:items-start sticky top-0 z-30 overflow-y-auto">
        <h1 class="text-2xl md:text-3xl font-bold mb-0 md:mb-10">ELMS</h1>

        <ul class="flex md:flex-col gap-6 md:gap-4 flex-grow justify-center md:justify-start w-full">
            <li>
                <a href="?page=teacher" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                  
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"/></svg>
                    <span class="hidden md:inline">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="?page=courseslist" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"/></svg>
                    <span class="hidden md:inline">Courses</span>
                </a>
            </li>

            <li>
                <a href="?page=assignments" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6a2 2 0 012-2h6"/></svg>
                    <span class="hidden md:inline">Assignments</span>
                </a>
            </li>

            <li>
                <a href="?page=gradebook" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    <span class="hidden md:inline">Gradebook</span>
                </a>
            </li>

            <li>
                <a href="?page=resources" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    <span class="hidden md:inline">Resources</span>
                </a>
            </li>

            <li>
                <a href="?page=profile" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="7" r="4" /><path stroke-linecap="round" stroke-linejoin="round" d="M5.5 21a6.5 6.5 0 0113 0"/></svg>
                    <span class="hidden md:inline">Profile</span>
                </a>
            </li>
        </ul>

        <div class="mt-0 md:mt-auto pt-2 md:pt-6 border-t border-primary-light w-full flex justify-center md:justify-start">
            <a href="#" onclick="alert('Logged out!')" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                <span class="hidden md:inline">Logout</span>
            </a>
        </div>
    </nav>

    
    <main class="flex-grow p-4 md:p-6 flex flex-col gap-8 max-w-7xl mx-auto w-full">

    <?php if ($page === 'teacher'): ?>
        
        <header class="flex justify-between items-center bg-white rounded-xl shadow-lg p-4 md:p-6">
            <div class="text-xl md:text-2xl font-semibold text-primary-dark">
                Welcome, <span class="text-primary">Professor Smith!</span>
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
                    <span class="hidden md:inline font-medium">Professor Smith</span>
                </button>
                 
            </div>
        </header>

        <section class="flex flex-col md:flex-row gap-8 w-full">
            <div class="md:w-2/3 flex flex-col gap-8">
                
                <section id="announcement-card" class="relative rounded-lg shadow-lg overflow-hidden cursor-pointer group w-full" onclick="toggleCoursesDropdown()" aria-label="School Announcement">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80" alt="School Announcement" class="w-full h-48 md:h-64 object-cover brightness-90 group-hover:brightness-75 transition" />
                    <div class="absolute inset-0 bg-gradient-to-t from-primary-dark/80 to-transparent"></div>
                    <div class="absolute bottom-4 left-6 text-white z-10">
                        <h2 class="text-2xl md:text-3xl font-bold">School Announcement</h2>
                        <p class="mt-1 max-w-xl text-sm md:text-base">Important updates for the new academic year!</p>
                    </div>

                    
                    <div id="courses-dropdown" class="absolute top-full left-0 w-full bg-white shadow-lg rounded-b-lg opacity-0 invisible transform translate-y-2 transition-all duration-300 z-20 max-h-72 overflow-y-auto border border-primary-light">
                        <div class="p-4">
                            <h3 class="text-primary font-semibold text-xl mb-3">Your Taught Courses</h3>
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

               
                <section class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-primary font-semibold text-2xl mb-6">Your Taught Courses</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($subjectCourses as $course): ?>
                            <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden flex flex-col">
                                <img src="<?= htmlspecialchars($course['image']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="w-full h-36 object-cover" />
                                <div class="p-4 flex flex-col flex-grow">
                                    <h3 class="font-bold text-lg text-primary-dark mb-2 flex-grow"><?= htmlspecialchars($course['title']) ?></h3>
                                    <a href="?page=course&course_id=<?= urlencode($course['title']) ?>_id&course_title=<?= urlencode($course['title']) ?>"
                                       class="mt-auto bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition w-full text-center block">
                                        Manage Course
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>

           
            <aside class="w-full md:w-1/3 flex flex-col gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                    <h2 class="text-primary font-semibold text-2xl mb-4 text-center">Calendar</h2>
                    <div id="calendar" class="w-full"></div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                    <h2 class="text-primary font-semibold text-xl mb-4">Upcoming Tasks</h2>
                    <ul class="space-y-3">
                        <?php foreach ($todoList as $index => $todo): ?>
                            <li class="flex items-center gap-3">
                                <input type="checkbox" id="todo-<?= $index ?>" class="w-5 h-5 text-primary focus:ring-primary border-gray-300 rounded" />
                                <label for="todo-<?= $index ?>" class="text-gray-800 select-none"><?= htmlspecialchars($todo) ?></label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

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

    <?php elseif ($page === 'courseslist'): ?>
     
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8">
            <h1 class="text-3xl md:text-4xl font-bold text-primary-dark mb-6">Your Courses</h1>
            <p class="text-gray-700 mb-8">Click on a course to manage its documents, quizzes, and other settings.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($subjectCourses as $course): ?>
                    <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden flex flex-col">
                        <img src="<?= htmlspecialchars($course['image']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="w-full h-36 object-cover" />
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="font-bold text-lg text-primary-dark mb-2 flex-grow"><?= htmlspecialchars($course['title']) ?></h3>
                            <a href="?page=course&course_id=<?= urlencode($course['title']) ?>_id&course_title=<?= urlencode($course['title']) ?>"
                               class="mt-auto bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-light transition w-full text-center block">
                                Manage Course
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php elseif ($page === 'course'): ?>
        
        <?php
            
            $courseId = htmlspecialchars($_GET['course_id'] ?? 'N/A');
            $courseTitle = htmlspecialchars($_GET['course_title'] ?? 'No Course Selected');
        ?>

        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                <h1 class="text-3xl md:text-4xl font-bold text-primary-dark">
                    Manage Course: <span class="text-primary"><?= $courseTitle ?></span>
                </h1>
                <a href="?page=courseslist" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Back to Courses
                </a>
            </div>

            
            <div class="flex border-b border-gray-300 mb-6">
                <button class="tablinks px-6 py-3 text-lg font-medium rounded-t-lg transition mr-2 focus:outline-none text-gray-700 hover:text-primary" onclick="openTab(event, 'Documents')">Documents</button>
                <button class="tablinks px-6 py-3 text-lg font-medium rounded-t-lg transition mr-2 focus:outline-none text-gray-700 hover:text-primary" onclick="openTab(event, 'Quiz')">Interactive Quiz</button>
            </div>

            
            <div id="Documents" class="tabcontent">
                <h2 class="text-2xl font-semibold text-primary-dark mb-6">Course Documents</h2>

                <div class="bg-gray-50 p-6 rounded-lg shadow mb-8">
                    <h3 class="text-xl font-bold text-primary mb-4">Uploaded Files</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between p-3 bg-white rounded-md shadow-sm border border-gray-200">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0013.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                                <span class="font-medium text-gray-800">Introduction to Algebra.pdf</span>
                            </div>
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm">Edit</button>
                                <button class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                            </div>
                        </li>
                        
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border border-primary-light">
                    <h3 class="text-xl font-bold text-primary mb-4">Upload New Document</h3>
                    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-4">
                        <div>
                            <label for="document_title" class="block text-sm font-medium text-gray-700">Document Title</label>
                            <input type="text" id="document_title" name="document_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary" required>
                        </div>
                        <div>
                            <label for="document_file" class="block text-sm font-medium text-gray-700">Select File (PDF, DOCX, PPT)</label>
                            <input type="file" id="document_file" name="document_file" accept=".pdf,.docx,.pptx" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-light" required>
                        </div>
                        <div>
                            <button type="submit" class="bg-primary text-white px-5 py-2 rounded-md hover:bg-primary-light transition">
                                Upload Document
                            </button>
                        </div>
                    </form>
                </div>
            </div>

          
            <div id="Quiz" class="tabcontent" style="display:none;">
                <h2 class="text-2xl font-semibold text-primary-dark mb-6">Create Interactive Quiz</h2>

                <div class="bg-white p-6 rounded-lg shadow-md border border-primary-light">
                    <h3 class="text-xl font-bold text-primary mb-4">Quiz Builder</h3>
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="quiz_title" class="block text-sm font-medium text-gray-700">Quiz Title</label>
                            <input type="text" id="quiz_title" name="quiz_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary" required>
                        </div>
                        <div>
                            <label for="quiz_description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="quiz_description" name="quiz_description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary"></textarea>
                        </div>

                        <div id="quiz-questions-container" class="space-y-4 mt-6">
                            
                        </div>

                        <button type="button" onclick="addQuizQuestion()" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                            Add Question
                        </button>

                        <div class="pt-6 border-t border-gray-200 mt-8">
                            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-md hover:bg-primary-light transition">
                                Save Quiz
                            </button>
                        </div>
                    </form>
                </div>

                
                <div class="bg-gray-50 p-6 rounded-lg shadow mt-8">
                    <h3 class="text-xl font-bold text-primary mb-4">Existing Quizzes</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between p-3 bg-white rounded-md shadow-sm border border-gray-200">
                            <span class="font-medium text-gray-800">Algebra Fundamentals Quiz</span>
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm">Edit Quiz</button>
                                <button class="text-red-600 hover:text-red-800 text-sm">Delete Quiz</button>
                            </div>
                        </li>
                        <li class="flex items-center justify-between p-3 bg-white rounded-md shadow-sm border border-gray-200">
                            <span class="font-medium text-gray-800">Thermodynamics Midterm Practice</span>
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:text-blue-800 text-sm">Edit Quiz</button>
                                <button class="text-red-600 hover:text-red-800 text-sm">Delete Quiz</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    <?php elseif ($page === 'assignments'): ?>
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8">
            <h1 class="text-3xl md:text-4xl font-bold text-primary mb-4">Assignments Management</h1>
            <p class="text-gray-700 mb-6">Here you can create, view, and grade assignments for your courses.</p>

            <button onclick="alert('Functionality to create a new assignment would go here!')" class="bg-primary text-white px-5 py-2 rounded-md hover:bg-primary-light transition">
                Create New Assignment
            </button>

            <div class="mt-8 bg-gray-50 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-primary-dark mb-4">Existing Assignments</h2>
                <ul class="space-y-3">
                    <li class="flex justify-between items-center p-3 bg-white rounded-md shadow-sm border border-gray-200">
                        <span>Algebra Homework #1 - Due 2024-09-01</span>
                        <div class="flex gap-2">
                            <button onclick="alert('Editing Algebra Homework #1')" class="text-blue-600 hover:text-blue-800 text-sm">Edit</button>
                            <button onclick="alert('Viewing submissions for Algebra Homework #1')" class="text-green-600 hover:text-green-800 text-sm">View Submissions</button>
                        </div>
                    </li>
                    <li class="flex justify-between items-center p-3 bg-white rounded-md shadow-sm border border-gray-200">
                        <span>Physics Lab Report - Due 2024-09-15</span>
                        <div class="flex gap-2">
                            <button onclick="alert('Editing Physics Lab Report')" class="text-blue-600 hover:text-blue-800 text-sm">Edit</button>
                            <button onclick="alert('Viewing submissions for Physics Lab Report')" class="text-green-600 hover:text-green-800 text-sm">View Submissions</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    <?php elseif ($page === 'gradebook'): ?>
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8">
            <h1 class="text-3xl md:text-4xl font-bold text-primary mb-4">Gradebook Management</h1>
            <p class="text-gray-700 mb-6">Manage student grades and generate reports for all your courses.</p>

            <div class="flex gap-4 mb-8">
                <button onclick="alert('Functionality to view grades by student would go here!')" class="bg-primary text-white px-5 py-2 rounded-md hover:bg-primary-light transition">
                    View Grades by Student
                </button>
                <button onclick="alert('Functionality to view grades by assignment would go here!')" class="bg-primary text-white px-5 py-2 rounded-md hover:bg-primary-light transition">
                    View Grades by Assignment
                </button>
            </div>

            <div class="mt-8 bg-gray-50 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-primary-dark mb-4">Grade Summary (Mock Data)</h2>
                <table class="min-w-full bg-white rounded-md shadow-sm border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200 text-left">
                            <th class="py-3 px-4 font-semibold text-gray-700">Student Name</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Course</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Average Grade</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100">
                            <td class="py-3 px-4">Alice Johnson</td>
                            <td class="py-3 px-4">Mathematics</td>
                            <td class="py-3 px-4">A-</td>
                            <td class="py-3 px-4">
                                <button onclick="alert('Viewing Alice Johnson\'s full grade report')" class="text-blue-600 hover:text-blue-800 text-sm">View Report</button>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-3 px-4">Bob Williams</td>
                            <td class="py-3 px-4">Physics</td>
                            <td class="py-3 px-4">B+</td>
                            <td class="py-3 px-4">
                                <button onclick="alert('Viewing Bob Williams\'s full grade report')" class="text-blue-600 hover:text-blue-800 text-sm">View Report</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Charlie Brown</td>
                            <td class="py-3 px-4">English Literature</td>
                            <td class="py-3 px-4">B</td>
                            <td class="py-3 px-4">
                                <button onclick="alert('Viewing Charlie Brown\'s full grade report')" class="text-blue-600 hover:text-blue-800 text-sm">View Report</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <?php elseif ($page === 'resources'): ?>
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8">
            <h1 class="text-3xl md:text-4xl font-bold text-primary mb-4">Course Resources</h1>
            <p class="text-gray-700 mb-6">Upload, organize, and share supplementary materials for your courses.</p>

            <button onclick="alert('Functionality to upload a new resource would go here!')" class="bg-primary text-white px-5 py-2 rounded-md hover:bg-primary-light transition">
                Upload New Resource
            </button>

            <div class="mt-8 bg-gray-50 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-primary-dark mb-4">Available Resources (Mock Data)</h2>
                <ul class="space-y-3">
                    <li class="flex justify-between items-center p-3 bg-white rounded-md shadow-sm border border-gray-200">
                        <span>Mathematics - Practice Problems Set 1.pdf</span>
                        <div class="flex gap-2">
                            <button onclick="alert('Editing Practice Problems Set 1')" class="text-blue-600 hover:text-blue-800 text-sm">Edit</button>
                            <button onclick="alert('Downloading Practice Problems Set 1')" class="text-green-600 hover:text-green-800 text-sm">Download</button>
                        </div>
                    </li>
                    <li class="flex justify-between items-center p-3 bg-white rounded-md shadow-sm border border-gray-200">
                        <span>Physics - Lecture Notes Chapter 3.pptx</span>
                        <div class="flex gap-2">
                            <button onclick="alert('Editing Lecture Notes Chapter 3')" class="text-blue-600 hover:text-blue-800 text-sm">Edit</button>
                            <button onclick="alert('Downloading Lecture Notes Chapter 3')" class="text-green-600 hover:text-green-800 text-sm">Download</button>
                        </div>
                    </li>
                    <li class="flex justify-between items-center p-3 bg-white rounded-md shadow-sm border border-gray-200">
                        <span>English Literature - Essay Writing Guide.docx</span>
                        <div class="flex gap-2">
                            <button onclick="alert('Editing Essay Writing Guide')" class="text-blue-600 hover:text-blue-800 text-sm">Edit</button>
                            <button onclick="alert('Downloading Essay Writing Guide')" class="text-green-600 hover:text-green-800 text-sm">Download</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    <?php elseif ($page === 'profile'): ?>
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8">
            <h1 class="text-3xl md:text-4xl font-bold text-primary mb-4">My Profile</h1>
            <p class="text-gray-700 mb-6">Update your personal information and account settings.</p>

            <form action="#" method="POST" class="space-y-6">
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="full_name" name="full_name" value="Professor Smith" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" value="p.smith@example.edu" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary" required>
                </div>
                <div>
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    <input type="text" id="department" name="department" value="Computer Science" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
                </div>
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                    <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">Professor Smith specializes in artificial intelligence and machine learning.</textarea>
                </div>
                <div>
                    <button type="submit" onclick="alert('Profile updated successfully!')" class="bg-primary text-white px-5 py-2 rounded-md hover:bg-primary-light transition">
                        Save Profile
                    </button>
                    <button type="button" onclick="alert('Change password functionality here!')" class="ml-4 bg-gray-200 text-gray-700 px-5 py-2 rounded-md hover:bg-gray-300 transition">
                        Change Password
                    </button>
                </div>
            </form>
        </div>

    <?php else: ?>
        <h1 class="text-xl text-red-600">Page not found</h1>
    <?php endif; ?>

    </main>

    
    <script>
    
    const calendarEl = document.getElementById('calendar');
    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    function createCalendar(year, month) {
        if (!calendarEl) return;
        calendarEl.innerHTML = '';

        const header = document.createElement('div');
        header.className = 'flex justify-between items-center mb-4';

        const prevBtn = document.createElement('button');
        prevBtn.textContent = '<';
        prevBtn.className = 'text-primary font-bold px-3 py-1 rounded hover:bg-primary-light hover:text-white transition';
        prevBtn.setAttribute('aria-label', 'Previous month');
        prevBtn.onclick = () => {
            if (month === 0) { month = 11; year--; } else { month--; }
            createCalendar(year, month);
        };

        const nextBtn = document.createElement('button');
        nextBtn.textContent = '>';
        nextBtn.className = 'text-primary font-bold px-3 py-1 rounded hover:bg-primary-light hover:text-white transition';
        nextBtn.setAttribute('aria-label', 'Next month');
        nextBtn.onclick = () => {
            if (month === 11) { month = 0; year++; } else { month++; }
            createCalendar(year, month);
        };

        const monthYear = document.createElement('div');
        monthYear.className = 'text-xl font-semibold text-primary';
        monthYear.textContent = new Date(year, month).toLocaleString('default', { month: 'long', year: 'numeric' });

        header.appendChild(prevBtn);
        header.appendChild(monthYear);
        header.appendChild(nextBtn);
        calendarEl.appendChild(header);

        const daysRow = document.createElement('div');
        daysRow.className = 'grid grid-cols-7 text-center font-semibold text-primary mb-2';
        daysOfWeek.forEach(day => {
            const dayEl = document.createElement('div');
            dayEl.textContent = day;
            daysRow.appendChild(dayEl);
        });
        calendarEl.appendChild(daysRow);

        const datesGrid = document.createElement('div');
        datesGrid.className = 'grid grid-cols-7 gap-1 text-center';

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            const blank = document.createElement('div');
            blank.className = 'p-2';
            datesGrid.appendChild(blank);
        }

        for (let date = 1; date <= daysInMonth; date++) {
            const dateEl = document.createElement('div');
            dateEl.textContent = date;
            dateEl.className = 'p-2 rounded cursor-pointer hover:bg-primary-light hover:text-white transition';

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

   
    function toggleCoursesDropdown() {
        const dropdown = document.getElementById('courses-dropdown');
        if (!dropdown) return;
        if (dropdown.classList.contains('opacity-0')) {
            dropdown.classList.remove('opacity-0', 'invisible', 'translate-y-2');
            dropdown.classList.add('opacity-100', 'visible', 'translate-y-0');
        } else {
            dropdown.classList.remove('opacity-100', 'visible', 'translate-y-0');
            dropdown.classList.add('opacity-0', 'invisible', 'translate-y-2');
        }
    }

    
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) { tabcontent[i].style.display = "none"; }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" bg-primary text-white", " text-gray-700 hover:text-primary");
        }
        var el = document.getElementById(tabName);
        if (el) el.style.display = "block";
        if (evt && evt.currentTarget) {
            evt.currentTarget.className = evt.currentTarget.className.replace(" text-gray-700 hover:text-primary", " bg-primary text-white");
        }
    }

    
    let questionCount = 0;
    function addQuizQuestion() {
        questionCount++;
        const quizQuestionsContainer = document.getElementById('quiz-questions-container');
        if (!quizQuestionsContainer) return;
        const questionDiv = document.createElement('div');
        questionDiv.className = 'bg-gray-50 p-4 rounded-lg shadow mb-4';
        questionDiv.innerHTML = `
            <h4 class="text-lg font-semibold text-primary mb-3">Question ${questionCount}</h4>
            <div class="mb-3">
                <label for="question_text_${questionCount}" class="block text-sm font-medium text-gray-700">Question Text:</label>
                <input type="text" id="question_text_${questionCount}" name="quiz_questions[${questionCount}][text]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700">Options:</label>
                <input type="text" name="quiz_questions[${questionCount}][options][]" placeholder="Option A" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary mb-2" required>
                <input type="text" name="quiz_questions[${questionCount}][options][]" placeholder="Option B" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary mb-2" required>
                <input type="text" name="quiz_questions[${questionCount}][options][]" placeholder="Option C" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary mb-2">
                <input type="text" name="quiz_questions[${questionCount}][options][]" placeholder="Option D" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
            </div>
            <div class="mb-3">
                <label for="correct_answer_${questionCount}" class="block text-sm font-medium text-gray-700">Correct Option (e.g., A, B, C, D):</label>
                <input type="text" id="correct_answer_${questionCount}" name="quiz_questions[${questionCount}][correct]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary" required>
            </div>
            <button type="button" onclick="this.parentNode.remove()" class="text-red-600 hover:text-red-800 text-sm">Remove Question</button>
        `;
        quizQuestionsContainer.appendChild(questionDiv);
    }

    
    document.addEventListener("DOMContentLoaded", function() {
        const firstTabButton = document.querySelector(".tablinks");
        if (firstTabButton) {
            firstTabButton.click();
        }
    });
    </script>
</body>
</html>
