<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_user.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Seeker Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h3>Welcome, <?php echo $_SESSION['user_name']; ?> 🎉</h3>
  <p>You are successfully logged in as a job seeker.</p>
  <a href="view_jobs.php" class="btn btn-outline-primary mt-3">View Available Jobs</a>
  <a href="../logout.php" class="btn btn-danger">Logout</a>
</div>

</body>
</html>