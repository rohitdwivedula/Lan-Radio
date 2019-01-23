<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Login for Podcast Creation</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <style type="text/css">
   *{
    box-sizing:border-box;
  }
  body{
    font-family:Roboto,Arial;
    background: #ff5d5f;
  }
    .content,.header{
      margin:0 auto;
      padding:40px;
      width:800px;
      box-shadow:0px 0px 40px 0px rgba(0,0,0,0.7);
      background: white;
      margin-top:50px;
      margin-bottom: 50px;
      max-width: 95%;
    }
    .header{

    }
    .red{
      color:#ff5d5f;
    }
    .form-group{
      padding:30px;
      margin-bottom:20px;
      background: whitesmoke;
    }
    
  </style>
</head>
<body>

<div class="content container">
	 <h1>User Login for Podcast Creation</h1><hr>
  <form method="post" action="login.php">
  	<div class="form-group">
  		<label>Username</label>
  		<input class="form-control" type="text" name="username" required >
  	</div>
  	<div class="form-group">
  		<label>Password</label>
  		<input class="form-control" type="password" name="password" required>
  	</div>
  	<div class="form-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
  <hr>
  <?php
include 'mysql-values.php';
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);


    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: create-podcast.php');
      echo "FUCK";
    }else {
      echo "<b class='red'>Failed to login</b>";
    }
}

?>
</div>
</body>
</html>

