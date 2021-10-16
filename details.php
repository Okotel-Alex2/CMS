<?php
	// connect to database
    $db = mysqli_connect("localhost", "root", "", "ckeditor-images");

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$result = mysqli_query($db, "SELECT * FROM posts WHERE id=$id");

		$post = mysqli_fetch_assoc($result);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uploading images in CKEditor using PHP</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Bootstra -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

	<!-- Custom styling -->
	<link rel="stylesheet" href="main.css">

</head>
<body>


  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">ADTERISK INTERNATIONAL GROUP</a>

    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">About</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
          Services
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Business Intelligence</a>
          <a class="dropdown-item" href="#">Due Delligence</a>
          <a class="dropdown-item" href="#">Web Development</a>
        </div>
      </li>
    </ul>
  </nav>
  <br>

  <div class="container text-primary">
    <h3>Welcome to Asterisk International Group Ltd</h3>
    <p>We offer Great Services</p>
  </div>


	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 post-div">
				<div class="post-details">
					<h2><?php echo $post['title'] ?></h2>
					<p><?php echo html_entity_decode($post['body']); ?></p>
				</div>
			</div>
		</div>
	</div>

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- JQuery scripts -->
<script>

</script>

</body>
</html>
