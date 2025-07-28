<!DOCTYPE html>
<html>
<head>
  <title>Job Portal - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #cccdceff;
    }
    .hero {
      background: purple;
      color: white;
      padding: 60px 30px;
      text-align: center;
      border-radius: 0 0 40px 40px;
    }
    .btn-group a {
      margin: 10px;
      min-width: 180px;
    }
    .section {
      padding: 40px 20px;
    }
  </style>
</head>
<body>

  <div class="hero">
    <h1 class="mb-3">Welcome to JobPortal</h1>
    <p class="lead">Connecting Employers & Job Seekers Easily</p>
    <div class="btn-group mt-4">
      <a href="login_user.php" class="btn btn-light">Job Seeker Login</a>
      <a href="register_user.php" class="btn btn-outline-light">Job Seeker Register</a>
      <a href="login_employer.php" class="btn btn-warning">Employer Login</a>
      <a href="register_employer.php" class="btn btn-outline-warning text-white border-white">Employer Register</a>
    </div>
  </div>

  <div class="container section text-center">
    <h2>Why Choose Us?</h2>
    <p class="mt-3">We help job seekers find opportunities and employers find great talent — all in one platform.</p>
  </div>

</body>
</html>