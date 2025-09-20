<?php
session_start();
require_once 'vendor/autoload.php';

// Google Client Setup
$client = new Google_Client();
$client->setAuthConfig('credentials.json');
$client->setRedirectUri('http://localhost/elms/login.php'); // must match Google Console
$client->addScope("email");
$client->addScope("profile");

// Generate login URL
$google_login_url = $client->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ACES LMS - Learning Management System</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    :root {
        --primary-color: #710E0E;
        --primary-light: #8a2b2b;
        --primary-dark: #5a0a0a;
    }
    body { font-family: 'Poppins', serif; }
    .gradient-bg { background: linear-gradient(135deg, #710E0E 0%, #8a2b2b 50%, #5a0a0a 100%); }
    .feature-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(113, 14, 14, 0.15); transition: all 0.3s ease; }
    .stats-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border-left: 4px solid #710E0E; }
</style>
</head>
<body class="bg-gray-50">

<!-- Header -->
<header class="bg-[#710E0E] text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 rounded-full overflow-hidden">
                <img src="pictures/aceslogo.jpg" alt="ACES Logo" class="w-full h-full object-cover">
            </div>
            <h1 class="text-2xl font-bold">ACES LMS</h1>
        </div>
        <nav class="hidden md:flex items-center space-x-8">
            <a href="#home" class="transition-colors hover:text-[#BE8400]">Home</a>
            <a href="#about" class="transition-colors hover:text-[#BE8400]">About</a>
            <a href="#contact" class="transition-colors hover:text-[#BE8400]">Contact</a>
        </nav>
        <div class="flex items-center space-x-4">
            <!-- Changed ID -->
            <button id="open-login" class="px-8 py-3 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-[#710E0E] transition-colors">
                Login
            </button>
            <button class="md:hidden text-white"><i class="fas fa-bars text-2xl"></i></button>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section id="home" class="gradient-bg text-white py-20">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
        <div class="flex-1">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Welcome to ACES LMS</h2>
            <p class="text-lg md:text-xl italic text-gray-200 mb-6">“Setting Standards. Sharing Knowledge.”</p>
            <p class="text-xl mb-8 opacity-90">A learning platform built to support students and teachers with easy-to-use tools and resources that make learning and teaching more effective and engaging.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <button class="px-8 py-3 bg-white text-[#710E0E] rounded-lg font-semibold hover:bg-gray-100 transition-colors">Get Started</button>
                <button onclick="document.getElementById('about').scrollIntoView({ behavior: 'smooth' });" class="px-8 py-3 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-[#710E0E] transition-colors">Learn More</button>
            </div>
        </div>
        <div class="flex-1">
            <img src="pictures/aces.png" alt="E-learning platform interface" class="rounded-xl shadow-2xl w-full" />
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="relative py-16 bg-white">
    <div class="absolute -top-16" id="about-offset"></div>
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h3 class="text-3xl font-bold text-gray-800 mb-4">About ACES LMS</h3>
            <p class="text-gray-600 max-w-2xl mx-auto">ACES LMS is dedicated to providing exceptional educational experiences through innovative technology and user-friendly interfaces.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div><img src="pictures/student1.jpg" alt="Students using technology" class="rounded-xl shadow-lg w-full" /></div>
            <div>
                <h4 class="text-2xl font-bold text-gray-800 mb-6">Our Mission</h4>
                <p class="text-gray-600 mb-6">Our mission is to transform the way people learn by making education more accessible, engaging, and effective. We aim to empower both students and educators through innovative technology, helping them reach their full potential.</p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="feature-card p-6 rounded-lg bg-gray-50 text-center">
                        <div class="w-16 h-16 bg-[#710E0E] rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-universal-access text-white text-2xl"></i></div>
                        <h5 class="font-semibold text-gray-800 mb-2">Accessible</h5>
                        <p class="text-gray-600 text-sm">Learning for everyone, anytime, anywhere</p>
                    </div>
                    <div class="feature-card p-6 rounded-lg bg-gray-50 text-center">
                        <div class="w-16 h-16 bg-[#710E0E] rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-lightbulb text-white text-2xl"></i></div>
                        <h5 class="font-semibold text-gray-800 mb-2">Empowering</h5>
                        <p class="text-gray-600 text-sm">Helping students and teachers reach their full potential</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h3 class="text-3xl font-bold text-gray-800 mb-4">Key Features</h3>
            <p class="text-gray-600">Discover the tools that make learning organized, engaging, and effective</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="feature-card bg-white p-8 rounded-xl text-center hover:shadow-xl transition duration-300">
                <div class="w-20 h-20 bg-[#710E0E] rounded-full flex items-center justify-center mx-auto mb-6"><i class="fas fa-lock text-white text-3xl"></i></div>
                <h4 class="font-semibold text-xl text-gray-800 mb-4">Secure Login</h4>
                <p class="text-gray-600">Safe access for students and teachers using school-provided accounts, ensuring data privacy and security.</p>
            </div>
            <div class="feature-card bg-white p-8 rounded-xl text-center hover:shadow-xl transition duration-300">
                <div class="w-20 h-20 bg-[#710E0E] rounded-full flex items-center justify-center mx-auto mb-6"><i class="fas fa-tasks text-white text-3xl"></i></div>
                <h4 class="font-semibold text-xl text-gray-800 mb-4">Assignments & Submissions</h4>
                <p class="text-gray-600">Teachers can upload lessons, assignments, and quizzes, while students easily submit their work online.</p>
            </div>
            <div class="feature-card bg-white p-8 rounded-xl text-center hover:shadow-xl transition duration-300">
                <div class="w-20 h-20 bg-[#710E0E] rounded-full flex items-center justify-center mx-auto mb-6"><i class="fas fa-calendar-alt text-white text-3xl"></i></div>
                <h4 class="font-semibold text-xl text-gray-800 mb-4">Calendar & Notifications</h4>
                <p class="text-gray-600">Stay on track with an integrated calendar and real-time notifications for deadlines and new activities.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h3 class="text-3xl font-bold text-gray-800 mb-4">Contact Us</h3>
            <p class="text-gray-600">Get in touch with our team for any questions or support needs</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-white p-8 rounded-xl shadow-lg text-center border border-transparent hover:-translate-y-2 hover:shadow-2xl hover:border-[#710E0E] transition transform">
                <i class="fas fa-phone text-[#710E0E] text-3xl mb-4"></i>
                <h4 class="font-semibold text-xl text-gray-800 mb-2">Phone</h4>
                <p class="text-gray-600">(042) 785 0730</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg text-center border border-transparent hover:-translate-y-2 hover:shadow-2xl hover:border-[#710E0E] transition transform">
                <i class="fas fa-envelope text-[#710E0E] text-3xl mb-4"></i>
                <h4 class="font-semibold text-xl text-gray-800 mb-2">Email</h4>
                <p class="text-gray-600">aceslucena.inc@gmail.com</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg text-center border border-transparent hover:-translate-y-2 hover:shadow-2xl hover:border-[#710E0E] transition transform">
                <i class="fas fa-map-marker-alt text-[#710E0E] text-3xl mb-4"></i>
                <h4 class="font-semibold text-xl text-gray-800 mb-2">Location</h4>
                <p class="text-gray-600">K18 Diversion Road, Brgy. Ilayang Dupay, Lucena, Philippines</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg text-center border border-transparent hover:-translate-y-2 hover:shadow-2xl hover:border-[#710E0E] transition transform">
                <i class="fas fa-clock text-[#710E0E] text-3xl mb-4"></i>
                <h4 class="font-semibold text-xl text-gray-800 mb-2">Office Hours</h4>
                <p class="text-gray-600">Mon - Fri, 8:00 AM - 5:00 PM</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-[#710E0E] text-white py-12">
    <div class="container mx-auto px-4 text-center text-gray-300">&copy; 2024 ACES LMS. All rights reserved.</div>
</footer>

<!-- Login Modal -->
<div id="login-modal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl p-8 w-full max-w-md relative transform scale-95 transition-transform duration-300">
    <button id="close-login" class="absolute top-3 right-3 text-gray-500 text-xl">&times;</button>
    <h2 class="text-2xl font-bold text-[#710E0E] mb-4 text-center">Login to ACES LMS</h2>

    <!-- 🔹 Error message -->
    <?php if(isset($_SESSION['login_error'])): ?>
        <p class="text-red-500 text-center mb-4">
            <?php 
                echo $_SESSION['login_error']; 
                unset($_SESSION['login_error']); 
            ?>
        </p>
    <?php endif; ?>

    <!-- ✅ Google Login button -->
    <a href="<?php echo $google_login_url; ?>">
        <button id="google-login" class="w-full py-3 bg-[#710E0E] text-white rounded-lg font-semibold hover:bg-[#8a2b2b]">
            Continue with Google
        </button>
    </a>
  </div>
</div>

<script>
const openLoginBtn = document.getElementById('open-login');
const modal = document.getElementById('login-modal');
const closeBtn = document.getElementById('close-login');

openLoginBtn.addEventListener('click', () => {
    modal.classList.remove('hidden');
    setTimeout(() => modal.querySelector('div').classList.add('scale-100'), 10);
});

closeBtn.addEventListener('click', () => {
    modal.querySelector('div').classList.remove('scale-100');
    setTimeout(() => modal.classList.add('hidden'), 300);
});

modal.addEventListener('click', e => {
    if (e.target === modal) {
        modal.querySelector('div').classList.remove('scale-100');
        setTimeout(() => modal.classList.add('hidden'), 300);
    }
});

<?php if(isset($_SESSION['login_error'])): ?>
// ✅ Auto-open modal if login error exists
modal.classList.remove('hidden');
setTimeout(() => modal.querySelector('div').classList.add('scale-100'), 10);
<?php endif; ?>
</script>
</body>
</html>
