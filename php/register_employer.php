<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company  = mysqli_real_escape_string($conn, $_POST['company']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM employers WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "Email already registered.";
        exit;
    }

    $query = "INSERT INTO employers (company, email, password)
              VALUES ('$company', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        echo "Registration successful! <a href='../login_employer.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>