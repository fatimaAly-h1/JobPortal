<?php
session_start();
include '../php/dbconfig.php';

if (!isset($_SESSION['employer_id'])) {
    header("Location: ../login_employer.php");
    exit;
}

$employer_id = $_SESSION['employer_id'];
$query = "SELECT * FROM jobs WHERE employer_id = $employer_id ORDER BY posted_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Posted Jobs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h3 class="mb-4">Jobs Posted by <?php echo $_SESSION['company']; ?></h3>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Title</th>
          <th>Location</th>
          <th>Salary</th>
          <th>Category</th>
          <th>Posted At</th>
        </tr>
      </thead>
      <tbody>
        <?php while($job = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $job['title']; ?></td>
          <td><?php echo $job['location']; ?></td>
          <td><?php echo $job['salary']; ?></td>
          <td><?php echo $job['category']; ?></td>
          <td><?php echo $job['posted_at']; ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No jobs posted yet.</p>
  <?php endif; ?>

  <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>

</body>
</html>