<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION['employer_id'])) {
    echo "Unauthorized access.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employer_id = $_SESSION['employer_id'];
    $title       = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location    = mysqli_real_escape_string($conn, $_POST['location']);
    $salary      = $_POST['salary'];
    $category    = mysqli_real_escape_string($conn, $_POST['category']);

    $query = "INSERT INTO jobs (employer_id, title, description, location, salary, category)
              VALUES ('$employer_id', '$title', '$description', '$location', '$salary', '$category')";

    if (mysqli_query($conn, $query)) {
        echo "Job posted successfully! <a href='../employer/dashboard.php'>Back to Dashboard</a>";
    } else {
        echo "Error posting job: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>