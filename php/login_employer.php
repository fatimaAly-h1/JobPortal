<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Find employer by email
    $query = "SELECT * FROM employers WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $employer = mysqli_fetch_assoc($result);

        // Check if password matches
        if (password_verify($password, $employer['password'])) {
            // Login successful – set session
            $_SESSION['employer_id'] = $employer['id'];
            $_SESSION['company'] = $employer['company'];

            header("Location: ../employer/dashboard.php");
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