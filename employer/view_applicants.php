<?php
session_start();
include '../php/dbconfig.php';

if (!isset($_SESSION['employer_id'])) {
    header("Location: php/login_employer.php");
    exit;
}

$employer_id = $_SESSION['employer_id'];

$query = "
    SELECT 
        applications.*, 
        users.name AS applicant_name, 
        users.email AS applicant_email, 
        jobs.title AS job_title 
    FROM applications 
    JOIN users ON applications.user_id = users.id 
    JOIN jobs ON applications.job_id = jobs.id 
    WHERE jobs.employer_id = '$employer_id' 
    ORDER BY applications.applied_at DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Applicants</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h3>Applicants for Your Jobs</h3>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <table class="table table-bordered mt-4">
      <thead class="table-dark">
        <tr>
          <th>Job Title</th>
          <th>Applicant Name</th>
          <th>Email</th>
          <th>Resume</th>
          <th>Applied At</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['job_title']; ?></td>
          <td><?php echo $row['applicant_name']; ?></td>
          <td><?php echo $row['applicant_email']; ?></td>
          <td>
            <a href="/uploads/<?php echo $row['resume']; ?>" target="_blank" class="btn btn-sm btn-outline-primary">
              View PDF
            </a>
          </td>
          <td><?php echo $row['applied_at']; ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No one has applied to your jobs yet.</p>
  <?php endif; ?>

  <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>

</body>
</html>