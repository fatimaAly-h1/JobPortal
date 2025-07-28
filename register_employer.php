<!DOCTYPE html>
<html>
<head>
  <title>Employer Registration</title>
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
        <h3 class="text-center mb-4">Employer Registration</h3>
        <form action="php/register_employer.php" method="POST">

          <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" name="company" class="form-control" placeholder="Enter company name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter company email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Choose a password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100">Register</button>

          <div class="mt-3 text-center">
            Already have an account? <a href="login_employer.php">Login here</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>