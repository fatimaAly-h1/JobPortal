<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION['user_id'])) {
    header("location:php/login_user.php");
    echo "Unauthorized access.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $job_id = $_POST['job_id'];

    // Handle resume file
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === 0) {
        $file = $_FILES['resume'];
        $filename = $file['name'];
        $tmpname = $file['tmp_name'];
        $filesize = $file['size'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        // Only allow PDFs
        if (strtolower($filetype) != 'pdf') {
            echo "Resume must be a PDF file.";
            exit;
        }

        // Rename and move file
        $newname = uniqid() . "_" . $filename;
        $destination = "../uploads/" . $newname;

        if (move_uploaded_file($tmpname, $destination)) {
            // Save to applications table
            $query = "INSERT INTO applications (user_id, job_id, resume)
                      VALUES ('$user_id', '$job_id', '$newname')";

            if (mysqli_query($conn, $query)) {
                echo "Application submitted successfully! <a href='../seeker/view_jobs.php'>Apply to more</a>";
            } else {
                echo "Database error: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to upload resume.";
        }
    } else {
        echo "No file uploaded.";
    }
} else {
    echo "Invalid request.";
}
?>