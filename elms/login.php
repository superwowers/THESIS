<?php
session_start();
require_once 'vendor/autoload.php';

// Database connection
$host = "127.0.0.1";
$port = 3307;
$user = "root";
$pass = "";
$db   = "elms_db";

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Google Client setup
$client = new Google_Client();
$client->setAuthConfig('credentials.json');
$client->setRedirectUri('http://localhost/elms/login.php'); // must match Google Console settings
$client->addScope("email");
$client->addScope("profile");

// If Google returned a code
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    // Check if token has errors
    if (isset($token['error'])) {
        $_SESSION['login_error'] = "Google authentication failed. Please try again.";
        header("Location: index.php");
        exit();
    }

    $client->setAccessToken($token);

    // Get user info from Google
    $oauth2 = new Google_Service_Oauth2($client);
    $googleUser = $oauth2->userinfo->get();
    $email = $googleUser->email;
    $name  = $googleUser->name;

    // Check if email exists in DB
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // ✅ Save session data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role']    = $user['role'];
        $_SESSION['name']    = $user['name'];

        // Redirect based on role
        switch ($user['role']) {
            case 'student': header("Location: student_dashboard.php"); break;
            case 'teacher': header("Location: teacher_dashboard.php"); break;
            case 'admin':   header("Location: admin_dashboard.php"); break;
            default:        header("Location: index.php"); break;
        }
        exit();

    } else {
        // ❌ Not found in DB
        $_SESSION['login_error'] = "Your email is not registered!";
        header("Location: index.php");
        exit();
    }
}

// If no code, go back to homepage
header("Location: index.php");
exit();
