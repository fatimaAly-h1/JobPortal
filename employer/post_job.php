<?php
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location: ../login_employer.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Post a Job</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card {
      margin-top: 50px;
      border-radius: 15px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow p-4">
        <h3 class="mb-4 text-center">Post a New Job</h3>
        <form action="../php/post_job.php" method="POST">
          
          <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Job Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Salary (PKR)</label>
            <input type="number" name="salary" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Job Category</label>
            <select name="category" class="form-select" required>
              <option value="">Select</option>
              <option value="IT">IT</option>
              <option value="Marketing">Marketing</option>
              <option value="Finance">Finance</option>
              <option value="HR">Human Resources</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary w-100">Post Job</button>
            <a href="dashboard.php" class=" text-center btn btn-secondary mt-3">Back to Dashboard</a>

        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>