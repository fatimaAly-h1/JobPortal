<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "Email already registered.";
        exit;
    }

    // Resume file handling
    $resume_name = $_FILES['resume']['name'];
    $resume_tmp  = $_FILES['resume']['tmp_name'];
    $resume_ext  = strtolower(pathinfo($resume_name, PATHINFO_EXTENSION));

    if ($resume_ext != "pdf") {
        echo "Resume must be a PDF file.";
        exit;
    }

    $new_resume = time() . "_" . $resume_name;
    $target_dir = "../uploads/resumes/";
    $target_path = $target_dir . $new_resume;

    // Create upload folder if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (!move_uploaded_file($resume_tmp, $target_path)) {
        echo "Failed to upload resume.";
        exit;
    }

    $query = "INSERT INTO users (name, email, password, resume) 
              VALUES ('$name', '$email', '$password', '$new_resume')";

    if (mysqli_query($conn, $query)) {
        echo "Registration successful! <a href='php/login_user.php'>Login here</a>";
    } else {
        echo "Database error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}
?>