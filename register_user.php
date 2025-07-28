<!DOCTYPE html>
<html>
<head>
  <title>Job Seeker Registration</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
    }
    .card {
      margin-top: 60px;
      border-radius: 15px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-4">
          <h3 class="text-center mb-4">Job Seeker Registration</h3>
          <form action="php/register_user.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Choose a password" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Upload Resume (PDF only)</label>
              <input type="file" name="resume" class="form-control" accept=".pdf" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>

            <div class="mt-3 text-center">
              Already registered? <a href="login_user.php">Login here</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>