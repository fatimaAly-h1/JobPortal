<?php
session_start();
include '../php/dbconfig.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_user.php");
    exit;
}

$query = "SELECT jobs.*, employers.company 
          FROM jobs 
          JOIN employers ON jobs.employer_id = employers.id 
          ORDER BY posted_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Available Jobs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h3 class="mb-4">Available Job Listings</h3>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Company</th>
          <th>Title</th>
          <th>Location</th>
          <th>Salary</th>
          <th>Category</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($job = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $job['company']; ?></td>
          <td><?php echo $job['title']; ?></td>
          <td><?php echo $job['location']; ?></td>
          <td><?php echo $job['salary']; ?></td>
          <td><?php echo $job['category']; ?></td>
          <td>
            <form action="../php/apply_job.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
              <input type="file" name="resume" required accept=".pdf">
              <button type="submit" class="btn btn-success btn-sm mt-1">Apply</button>
            </form>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No jobs found.</p>
  <?php endif; ?>

  <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>

</body>
</html>