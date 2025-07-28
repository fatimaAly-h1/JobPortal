<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Find user by email
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Check if password matches
        if (password_verify($password, $user['password'])) {
            // Login successful – set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            header("Location: ../seeker/dashboard.php");
            exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Email not found.";
    }
} else {
    echo "Invalid request.";
}
?>