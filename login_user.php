<!DOCTYPE html>
<html>
<head>
  <title>Job Seeker Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f5f5;
    }
    .card {
      margin-top: 80px;
      border-radius: 15px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow p-4">
          <h3 class="text-center mb-4">Job Seeker Login</h3>
          <form action="php/login_user.php" method="POST" >

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Login</button>

            <div class="mt-3 text-center">
              New user? <a href="register_user.php">Register here</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>