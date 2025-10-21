  <?php
  $myCourses = [
      ['title' => 'Mathematics in the Modern World', 'progress' => 75, 'image' => 'https://images.unsplash.com/photo-1534723447668-b789965b3c53?auto=format&fit=crop&w=400&q=80'],
      ['title' => 'Introduction to Programming', 'progress' => 40, 'image' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=400&q=80'],
      ['title' => 'World History: Ancient Civilizations', 'progress' => 20, 'image' => 'https://images.unsplash.com/photo-1550993510-1e82e2f3d6b3?auto=format&fit=crop&w=400&q=80'],
  ];

$assignments = [
  ['title' => 'Essay on Climate Change', 'due' => '2025-10-15', 'status' => 'Pending', 'grade' => null],
  ['title' => 'Midterm Project', 'due' => '2025-10-10', 'status' => 'Submitted', 'grade' => 90],
  ['title' => 'Research Paper', 'due' => '2025-10-05', 'status' => 'Overdue', 'grade' => null],
  ['title' => 'Group Presentation', 'due' => '2025-10-03', 'status' => 'Submitted', 'grade' => 85],
];


  $announcements = [
      ['title' => 'Welcome to the semester!', 'date' => '2024-08-25'],
      ['title' => 'Campus Wi-Fi Upgrade Completed', 'date' => '2024-08-22'],
      ['title' => 'Clubs Fair on Sept 5', 'date' => '2024-08-20'],
  ];

  $todoList = [
      'Review notes for Mathematics',
      'Finish Programming Exercise',
      'Read Chapter 2 of World History',
  ];
  $page = $_GET['page'] ?? 'student';
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ELMS - Student Panel</title>
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
            primary: {
              DEFAULT: '#710E0E',
              light: '#8a2b2b',
              dark: '#5a0a0a'
            }
          },
          fontFamily: {
            poppins: ['Poppins', 'sans-serif']
          }
        }
      }
    }


    
  </script>
  </head>

  <body class="font-poppins bg-gradient-to-br from-primary to-primary-dark min-h-screen text-gray-900 flex flex-col md:flex-row">



      <!-- Menu -->
      <nav class="bg-primary-dark text-white w-full md:w-64 min-h-[60px] md:min-h-screen p-4 md:p-6 flex md:flex-col items-center md:items-start sticky top-0 z-30 overflow-y-auto">
  <h1 class="text-2xl md:text-3xl font-bold mb-0 md:mb-10">ELMS</h1>

  <ul class="flex md:flex-col gap-6 md:gap-4 flex-grow justify-center md:justify-start w-full">
    <li>
      <a href="?page=student" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
        </svg>
        <span class="hidden md:inline">Dashboard</span>
      </a>
    </li>

    <li>
      <a href="?page=mycourses" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9" />
        </svg>
        <span class="hidden md:inline">My Courses</span>
      </a>
    </li>



  
    <li>
      <a href="?page=profile" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="7" r="4" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.5 21a6.5 6.5 0 0113 0" />
        </svg>
        <span class="hidden md:inline">Profile</span>
      </a>
    </li>
  </ul>

  <div class="mt-0 md:mt-auto pt-2 md:pt-6 border-t border-primary-light w-full flex justify-center md:justify-start">
    <a href="?page=logout" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-primary-light transition text-sm md:text-base">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" />
      </svg>
      <span class="hidden md:inline">Logout</span>
    </a>
  </div>
</nav>


   <!-- Main Content -->
<main class="flex-grow p-4 md:p-6 flex flex-col gap-8 max-w-7xl mx-auto w-full">
  <?php if ($page === 'student'): ?>
    <header class="flex justify-between items-center bg-white rounded-xl shadow-lg p-4 md:p-6">
      <div class="text-xl md:text-2xl font-semibold text-primary-dark">
        Welcome, <span class="text-primary">Student!</span>
      </div>

      <div class="flex items-center gap-4">
        <!-- 🔔 Notifications -->
        <button class="relative text-gray-600 hover:text-primary transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
          </svg>
          <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">3</span>
        </button>

        <!-- 💬 Messages -->
        <button class="text-gray-600 hover:text-primary transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
          </svg>
        </button>

        <!-- 🧑 User -->
        <button class="flex items-center gap-2 text-gray-600 hover:text-primary transition">
          <img src="https://via.placeholder.com/32" alt="User Avatar" class="w-8 h-8 rounded-full border-2 border-primary-light">
          <span class="hidden md:inline font-medium">Student</span>
        </button>

     
      
      </div>
    </header>
 

        <!-- Two-column layout -->
      <section class="flex flex-col lg:flex-row gap-6">
          <!-- LEFT: Courses + Assignments -->
    <div class="flex-1 space-y-6">
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-2xl font-bold text-primary mb-4">My Courses</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <?php foreach ($myCourses as $c): ?>
            <div class="bg-gray-50 rounded-lg shadow overflow-hidden flex flex-col">
              <img src="<?= htmlspecialchars($c['image']) ?>" class="h-32 w-full object-cover" />
              <div class="p-4 flex flex-col flex-grow">
                <h4 class="font-semibold text-lg mb-2 text-primary-dark"><?= htmlspecialchars($c['title']) ?></h4>
                <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                  <div class="bg-primary h-2 rounded-full" style="width:<?= $c['progress'] ?>%"></div>
                </div>
                <a href="?page=course&title=<?= urlencode($c['title']) ?>" 
                  class="mt-auto bg-primary text-white text-center py-2 rounded hover:bg-primary-light">
                  View Course
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    


          </tbody>
        </table>
      </div>
    </div>

    <!-- RIGHT SIDEBAR -->
    <aside class="w-full lg:w-1/3 flex flex-col gap-6">
      <!-- (Sidebar content remains the same) -->
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
              <span class="text-sm text-white bg-primary rounded-full px-3 py-1 select-none">
                <?= date('M j', strtotime($news['date'])) ?>
              </span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

    

    <?php elseif ($page === 'mycourses'): ?>
    <header class="flex justify-between items-center bg-white rounded-xl shadow-lg p-4 md:p-6">
      <div class="text-xl md:text-2xl font-semibold text-primary-dark">
        <span class="text-primary">My Courses</span>
      </div>
      <div class="flex items-center gap-4">
        <!-- 🔔 Notifications -->
        <button class="relative text-gray-600 hover:text-primary transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
          </svg>
          <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">2</span>
        </button>
      </div>
    </header>

    <section class="bg-white rounded-xl shadow p-6 mt-6">
      <h3 class="text-2xl font-bold text-primary mb-4">My Courses</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($myCourses as $c): ?>
          <div class="bg-gray-50 rounded-lg shadow overflow-hidden flex flex-col">
            <img src="<?= htmlspecialchars($c['image']) ?>" class="h-32 w-full object-cover" />
            <div class="p-4 flex flex-col flex-grow">
              <h4 class="font-semibold text-lg mb-2 text-primary-dark"><?= htmlspecialchars($c['title']) ?></h4>
              <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                <div class="bg-primary h-2 rounded-full" style="width:<?= $c['progress'] ?>%"></div>
              </div>
              <a href="?page=course&title=<?= urlencode($c['title']) ?>" 
                class="mt-auto bg-primary text-white text-center py-2 rounded hover:bg-primary-light">
                View Course
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <?php elseif ($page === 'assignments'): ?>
<header class="flex justify-between items-center bg-white rounded-xl shadow-lg p-4 md:p-6">
  <div class="text-xl md:text-2xl font-semibold text-primary-dark">
    <span class="text-primary">Assignments</span>
  </div>
</header>

<section class="bg-white rounded-xl shadow p-6 mt-6">
  <h3 class="text-2xl font-bold text-primary mb-4">Assignments</h3>
  <table class="w-full text-left">
    <thead class="text-primary border-b">
      <tr>
        <th class="p-2">Title</th>
        <th class="p-2">Due Date</th>
        <th class="p-2">Status</th>
        <th class="p-2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($assignments as $as): ?>
      <tr class="border-b <?= $as['status']==='Overdue' ? 'bg-gray-100 text-gray-500' : '' ?>">
        <td class="p-2"><?= htmlspecialchars($as['title']) ?></td>
        <td class="p-2"><?= htmlspecialchars($as['due']) ?></td>
        <td class="p-2">
          <span class="px-2 py-1 rounded text-white 
            <?= $as['status']==='Pending'?'bg-yellow-500':
               ($as['status']==='Submitted'?'bg-green-600':'bg-red-600') ?>">
            <?= $as['status'] ?>
          </span>
        </td>
        <td class="p-2">
          <?php if ($as['status'] === 'Pending'): ?>
            <a href="?page=submit&assignment=<?= urlencode($as['title']) ?>" class="text-primary hover:underline">Submit</a>
          <?php elseif ($as['status'] === 'Submitted'): ?>
            <a href="?page=view_submission&assignment=<?= urlencode($as['title']) ?>" class="text-primary hover:underline">Check</a>
          <?php elseif ($as['status'] === 'Overdue'): ?>
            <span class="text-red-600 font-semibold">Not Available</span>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>

<?php elseif ($page === 'view_submission'): ?>
  <?php 
    // Example data: normally, you'd fetch this from a database
    $assignmentTitle = $_GET['assignment'] ?? 'Unknown Assignment';
    $submissionText = "This is your submitted work for '{$assignmentTitle}'.";
    $grade = 92; // example grade (you can replace with dynamic data)
  ?>
  
  <section class="bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold text-primary mb-4"><?= htmlspecialchars($assignmentTitle) ?></h2>
    <p class="text-gray-700 mb-4"><?= htmlspecialchars($submissionText) ?></p>

    <div class="mt-6 p-4 bg-green-100 border border-green-400 rounded-lg">
      <h3 class="text-lg font-semibold text-green-700">Your Grade:</h3>
      <p class="text-3xl font-bold text-green-600"><?= $grade ?>/100</p>
    </div>

    <a href="?page=assignments" class="inline-block mt-6 px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark transition">
      ← Back to Assignments
    </a>
  </section>  



      
       <?php elseif ($page === 'profile'): ?>
  <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8">
    <h1 class="text-3xl md:text-4xl font-bold text-primary mb-4">My Profile</h1>
    <p class="text-gray-700 mb-6">Manage your personal details and student information.</p>

    <form action="#" method="POST" class="space-y-6">
      <div>
        <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="John Doe" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary" required>
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" id="email" name="email" value="john.doe@student.edu" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary" required>
      </div>

      <div>
        <label for="student_id" class="block text-sm font-medium text-gray-700">Student ID</label>
        <input type="text" id="student_id" name="student_id" value="2025-12345" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary" readonly>
      </div>

      <div>
        <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
        <input type="text" id="course" name="course" value="Bachelor of Science in Information Technology" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
      </div>

      <div>
        <label for="bio" class="block text-sm font-medium text-gray-700">About Me</label>
        <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">I am a motivated student eager to learn web development and system design.</textarea>
      </div>

      <div class="flex gap-4">
        <button type="submit" onclick="alert('Profile updated successfully!')" class="bg-primary text-white px-5 py-2 rounded-md hover:bg-primary-light transition">
          Save Profile
        </button>
        <button type="button" onclick="alert('Change password functionality coming soon!')" class="bg-gray-200 text-gray-700 px-5 py-2 rounded-md hover:bg-gray-300 transition">
          Change Password
        </button>
      </div>
    </form>
  </div>


 <?php elseif ($page === 'course'): ?>
  <?php 
    // Course title and subpages
    $courseTitle = $_GET['title'] ?? 'Unknown Course'; 
    $subPage = $_GET['sub'] ?? 'modules'; 
    $moduleStep = $_GET['step'] ?? 1; 

    // Example module structure
    $modules = [
      'Prelim' => [
        'syllabus' => 'This is the syllabus for Introduction to Computing (Prelim).',
        'pdf' => 'modules/prelim_module.pdf',
        'video' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        'assignment' => 'Prelim Activity: Computer Components Identification',
        'status' => 'Pending'
      ],
      'Midterm' => [
        'syllabus' => 'This is the syllabus for Introduction to Computing (Midterm).',
        'pdf' => 'modules/midterm_module.pdf',
        'video' => 'https://www.youtube.com/embed/v64KOxKVLVg',
        'assignment' => 'Midterm Performance Task: Create a Simple Program',
        'status' => 'Submitted'
      ],
      'Finals' => [
        'syllabus' => 'This is the syllabus for Introduction to Computing (Finals).',
        'pdf' => 'modules/finals_module.pdf',
        'video' => 'https://www.youtube.com/embed/ZtM4nFWQ6_s',
        'assignment' => 'Finals Activity: Research Paper on Emerging Technologies',
        'status' => 'Pending'
      ],
    ];
  ?>

  <div class="flex flex-col md:flex-row gap-6">
    <!-- 📂 Second Sidebar -->
    <aside class="w-full md:w-64 bg-primary-dark text-white rounded-xl shadow-lg p-4">
      <h3 class="text-lg font-semibold mb-4">Course Menu</h3>
      <ul class="space-y-3">
        <li>
          <a href="?page=course&title=<?= urlencode($courseTitle) ?>&sub=modules" 
             class="block px-3 py-2 rounded <?= $subPage==='modules'?'bg-primary-light':'' ?>">📘 Modules</a>
        </li>
        <li>
          <a href="?page=course&title=<?= urlencode($courseTitle) ?>&sub=assignments" 
             class="block px-3 py-2 rounded <?= $subPage==='assignments'?'bg-primary-light':'' ?>">📝 Assignments</a>
        </li>
      </ul>
      <div class="mt-6 border-t border-primary-light pt-4">
        <a href="?page=mycourses" class="text-sm text-white hover:underline">← Back to My Courses</a>
      </div>
    </aside>

    <!-- 📄 Main Content -->
<main class="flex-1 bg-white rounded-xl shadow p-6">
  <h2 class="text-2xl font-bold text-primary mb-4"><?= htmlspecialchars($courseTitle) ?></h2>

  <?php if ($subPage === 'modules' && isset($_GET['term'])): ?>
    <?php 
      $term = $_GET['term'];
      $mod = $modules[$term];
      $moduleStep = isset($_GET['step']) ? (int)$_GET['step'] : 1; 
    ?>

    <div class="space-y-6">
      <h3 class="text-xl font-semibold text-primary-dark"><?= htmlspecialchars($term) ?> Module</h3>

      <?php if ($moduleStep == 1): ?>
        <div>
          <h4 class="font-semibold text-lg mb-2">📘 Syllabus</h4>
          <p><?= htmlspecialchars($mod['syllabus']) ?></p>
          <a href="?page=course&title=<?= urlencode($courseTitle) ?>&sub=modules&term=<?= urlencode($term) ?>&step=2" 
             class="mt-4 inline-block bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Next →</a>
        </div>

      <?php elseif ($moduleStep == 2): ?>
        <div>
          <h4 class="font-semibold text-lg mb-2">📄 Module PDF</h4>
          <embed src="<?= htmlspecialchars($mod['pdf']) ?>" type="application/pdf" class="w-full h-[500px] border rounded"/>
          <a href="?page=course&title=<?= urlencode($courseTitle) ?>&sub=modules&term=<?= urlencode($term) ?>&step=3" 
             class="mt-4 inline-block bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Next →</a>
        </div>

      <?php elseif ($moduleStep == 3): ?>
        <div>
          <h4 class="font-semibold text-lg mb-2">🎥 Video Lesson</h4>
          <div class="aspect-video">
            <iframe class="w-full h-full rounded-xl" src="<?= htmlspecialchars($mod['video']) ?>" frameborder="0" allowfullscreen></iframe>
          </div>
          <a href="?page=course&title=<?= urlencode($courseTitle) ?>&sub=modules&term=<?= urlencode($term) ?>&step=4" 
             class="mt-4 inline-block bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Next →</a>
        </div>

      <?php elseif ($moduleStep == 4): ?>
        <div>
          <h4 class="font-semibold text-lg mb-2">📝 Assignment / Activity</h4>
          <p><?= htmlspecialchars($mod['assignment']) ?></p>
          <a href="?page=course&title=<?= urlencode($courseTitle) ?>&sub=assignments" 
             class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Go to Assignments</a>
        </div>
      <?php endif; ?>
    </div>

  <?php elseif ($subPage === 'modules'): ?>
    <!-- Modules List -->
    <h3 class="text-xl font-semibold text-primary-dark mb-4">Modules</h3>
    <div class="grid gap-4">
      <?php foreach ($modules as $term => $content): ?>
        <div class="border rounded-xl p-4 shadow hover:shadow-md transition">
          <h4 class="text-lg font-semibold"><?= htmlspecialchars($term) ?> Module</h4>
          <p class="text-sm text-gray-600 mb-2">Status: 
            <span class="font-semibold <?= $content['status']==='Submitted'?'text-green-600':'text-yellow-600' ?>">
              <?= htmlspecialchars($content['status']) ?>
            </span>
          </p>
          <a href="?page=course&title=<?= urlencode($courseTitle) ?>&sub=modules&term=<?= urlencode($term) ?>&step=1" 
             class="inline-block mt-2 bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Start</a>
        </div>
      <?php endforeach; ?>
    </div>

</main>


      <?php elseif ($subPage === 'assignments'): ?>
        <h3 class="text-xl font-semibold text-primary-dark mb-4">Assignments</h3>
        <table class="w-full text-left border">
          <thead class="text-primary border-b bg-gray-50">
            <tr>
              <th class="p-3">Title</th>
              <th class="p-3">Term</th>
              <th class="p-3">Status</th>
              <th class="p-3 text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($modules as $term => $mod): ?>
              <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?= htmlspecialchars($mod['assignment']) ?></td>
                <td class="p-3"><?= htmlspecialchars($term) ?></td>
                <td class="p-3">
                  <span class="font-semibold <?= $mod['status']==='Submitted'?'text-green-600':'text-yellow-600' ?>">
                    <?= htmlspecialchars($mod['status']) ?>
                  </span>
                </td>
                <td class="p-3 text-center">
                  <?php if ($mod['status'] === 'Pending'): ?>
                    <a href="?page=submit&assignment=<?= urlencode($mod['assignment']) ?>" 
                       class="bg-primary text-white px-3 py-1 rounded hover:bg-primary-dark">Submit</a>
                  <?php else: ?>
                    <a href="?page=view_submission&assignment=<?= urlencode($mod['assignment']) ?>" 
                       class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">View</a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </main>
  </div>





    <?php elseif ($page === 'submit'): ?>
    <?php $assignment = $_GET['assignment'] ?? 'Unknown'; ?>
    <header class="flex justify-between items-center bg-white rounded-xl shadow-lg p-4 md:p-6">
      <div class="text-xl md:text-2xl font-semibold text-primary-dark">
        Submit Assignment: <span class="text-primary"><?= htmlspecialchars($assignment) ?></span>
      </div>
      <a href="?page=assignments" class="text-primary hover:underline font-medium">← Back to Assignments</a>
    </header>

    <section class="bg-white rounded-xl shadow p-6 mt-6 space-y-4">
      <form action="submit_assignment.php" method="post" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="assignment_title" value="<?= htmlspecialchars($assignment) ?>">

        <div>
          <label for="answer" class="block text-gray-700 font-semibold mb-2">Your Answer:</label>
          <textarea name="answer" id="answer" rows="6"
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring focus:ring-primary-light"></textarea>
        </div>

        <div>
          <label for="file_upload" class="block text-gray-700 font-semibold mb-2">Attach File (Optional):</label>
          <input type="file" name="file_upload" id="file_upload" accept=".pdf,.doc,.docx,.jpg,.png,.zip"
            class="block w-full text-sm text-gray-600 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring focus:ring-primary-light">
          <p class="text-xs text-gray-500 mt-1">Allowed: PDF, DOC, DOCX, JPG, PNG, ZIP (max 10MB)</p>
        </div>

        <button type="submit" 
          class="bg-primary hover:bg-primary-light text-white py-2 px-4 rounded-lg shadow-md transition">
          Submit Assignment
        </button>
      </form>
    </section>
  <?php endif; ?> 

  <!-- Calendar script remains the same -->

  </body>
  </html>