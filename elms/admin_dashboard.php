<?php
session_start();

// Admin sample data
$students = [
    ['id' => 1, 'name' => 'Lauren Mae Espinar', 'email' => 'lrnmspnr@gmail.com'],
    ['id' => 2, 'name' => 'Michael Brown', 'email' => 'michaelbrown@gmail.com'],
];

$teachers = [
    ['id' => 1, 'name' => 'Mr. John Doe', 'email' => 'johndoe@gmail.com'],
    ['id' => 2, 'name' => 'Ms. Jane Smith', 'email' => 'janesmith@gmail.com'],
];

$courses = [
    ['title' => 'AI Basics', 'image' => 'https://images.unsplash.com/photo-1581090700227-4c4ef1a3d6c2?auto=format&fit=crop&w=400&q=80'],
    ['title' => 'Web Development', 'image' => 'https://images.unsplash.com/photo-1529101091764-c3526daf38fe?auto=format&fit=crop&w=400&q=80'],
    ['title' => 'Database Systems', 'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=400&q=80'],
];

$announcements = [
    ['title' => 'System maintenance on Sept 30', 'date' => '2025-09-20'],
    ['title' => 'New teacher orientation', 'date' => '2025-09-18'],
    ['title' => 'Updated course curriculum released', 'date' => '2025-09-15'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ELMS Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-100 flex min-h-screen">

  <!-- Sidebar -->
  <nav class="bg-primary-dark text-white w-64 min-h-screen p-6 flex flex-col shadow-lg">
    <h1 class="text-3xl font-bold mb-10">ELMS Admin</h1>
    <ul class="space-y-4 flex-grow">
      <li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-primary-light transition">Dashboard</a></li>
      <li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-primary-light transition">Students</a></li>
      <li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-primary-light transition">Teachers</a></li>
      <li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-primary-light transition">Courses</a></li>
      <li><a href="#" class="block px-4 py-2 rounded-lg hover:bg-primary-light transition">Settings</a></li>
    </ul>
    <a href="#" class="mt-auto block px-4 py-2 rounded-lg bg-red-600 hover:bg-red-500 transition text-center">Logout</a>
  </nav>

  <!-- Main Content -->
  <main class="flex-grow p-8 flex flex-col gap-8">

    <!-- Header -->
    <header class="bg-gradient-to-r from-primary to-primary-dark text-white rounded-2xl shadow-lg p-6 flex justify-between items-center">
      <h2 class="text-2xl font-semibold">Welcome, <?= $_SESSION['username'] ?? 'Admin User' ?></h2>
      <div class="flex items-center gap-3">
        <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full border-2 border-white" />
        <span><?= $_SESSION['username'] ?? 'Admin User' ?></span>
      </div>
    </header>

    <!-- Stats -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:scale-105 transition">
        <h3 class="text-3xl font-extrabold text-primary"><?= count($students) ?></h3>
        <p class="text-gray-600">Students</p>
      </div>
      <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:scale-105 transition">
        <h3 class="text-3xl font-extrabold text-primary"><?= count($teachers) ?></h3>
        <p class="text-gray-600">Teachers</p>
      </div>
      <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:scale-105 transition">
        <h3 class="text-3xl font-extrabold text-primary"><?= count($courses) ?></h3>
        <p class="text-gray-600">Courses</p>
      </div>
    </section>

    <!-- Students Table -->
    <section class="bg-white rounded-2xl shadow-lg p-6">
      <h2 class="text-xl font-semibold text-primary mb-4">Students</h2>
      <table class="w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Email</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($students as $student): ?>
            <tr class="hover:bg-gray-50 transition">
              <td class="px-4 py-2 border"><?= $student['id'] ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($student['name']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($student['email']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>

    <!-- Teachers Table -->
    <section class="bg-white rounded-2xl shadow-lg p-6">
      <h2 class="text-xl font-semibold text-primary mb-4">Teachers</h2>
      <table class="w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Email</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($teachers as $teacher): ?>
            <tr class="hover:bg-gray-50 transition">
              <td class="px-4 py-2 border"><?= $teacher['id'] ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($teacher['name']) ?></td>
              <td class="px-4 py-2 border"><?= htmlspecialchars($teacher['email']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>

    <!-- Courses -->
    <section class="bg-white rounded-2xl shadow-lg p-6">
      <h2 class="text-xl font-semibold text-primary mb-4">Courses</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($courses as $course): ?>
          <div class="bg-gray-50 rounded-xl shadow hover:shadow-lg transition overflow-hidden group">
            <img src="<?= htmlspecialchars($course['image']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="h-36 object-cover w-full group-hover:scale-105 transition">
            <div class="p-4 flex flex-col">
              <h3 class="font-bold text-lg text-primary-dark mb-2"><?= htmlspecialchars($course['title']) ?></h3>
              <button class="mt-auto bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary-light transition">Manage</button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Announcements -->
    <section class="bg-white rounded-2xl shadow-lg p-6">
      <h2 class="text-xl font-semibold text-primary mb-4">Announcements</h2>
      <ul class="divide-y divide-gray-200">
        <?php foreach ($announcements as $news): ?>
          <li class="py-3 flex justify-between items-center hover:bg-gray-50 transition px-2 rounded-lg">
            <p class="font-semibold text-gray-800"><?= htmlspecialchars($news['title']) ?></p>
            <span class="text-sm text-white bg-primary rounded-full px-3 py-1"><?= date('M j', strtotime($news['date'])) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

  </main>
</body>
</html>
