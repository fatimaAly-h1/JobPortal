<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['employer_id'])) {
    header("Location: php/login_employer.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Employer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h3>Welcome, <?php echo $_SESSION['company']; ?> 🎉</h3>
  <p>You are successfully logged in as an employer.</p>
  <a href="../logout.php" class="btn btn-outline-danger">Logout</a>
    <a href="post_job.php" class="btn btn-outline-primary mt-3">Post New Job</a>
    <a href="view_jobs.php" class="btn btn-outline-primary mt-3">View My Jobs</a>
    <a href ="view_applicants.php" class = "btn btn-outline-success mt-2"> View Applicants</a>


</div>

</body>
</html>