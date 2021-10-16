<?php
session_start();
include 'database.php';
include 'posts.php';
$adh = new Post();

?>

<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>admin</title>
	<style>
 .h3 {
	text-align:center;
	font-size:18;
	font-color:white;
	}
	.h1 {
	text-align:center;
	font-size:18;
	font-color:white;
	}
	.topnav{
		overflow: hidden;
		 background-color: #0484f8;
		 text-decoration-color: white;
	}
	.topnav a {
		float: right;
		color:white;
		text-align: right;
		padding:14px 16px;
		font-size: 17px;
		text-decoration: none;
		 }
	.admin {
 float: right;
 max-width: 2;
	}
	 .user {
	width:250px;
	margin: 0 auto;
	padding-top: 20px;
	float: left;

	}
	.lorem{
	 text-align:center;
	 padding-left:30px
	 padding-right:30px;
	 margin-left: 120px;
	 padding-top: 10px;
	 float:left;

	}
	.button {
	background-color: #4286f4;
	color: white;
	padding: 14px 0;
	margin: 10px 0;
	border: none;
	cursor: grab;
	width: 20%;
	}
	 .buttonu {
	background-color: #4286f4;
	color: white;
	padding: 14px 0;
	margin: 10px 0;
	border: none;
	cursor: grab;
	width: 30%;
	}
	.sidenav{
		height: 100%;
		width: 120px;
		position: fixed;
		z-index: 1;
		top: 22%;
		left: 0;
		background-color: #0484f8;
		overflow-x: hidden;
		padding-top: 3px;
	}
	.sidenav a{
		padding: 6px 6px 6px 6px;
		text-decoration: none;
		font-size: 20px;
		display: block;
	}
	.sidenav a:hover{
		color: #f1f1f1;
	}
	.formcontainer {
	text-align: center;
	margin: 24px 50px 12px;
	margin-left: 120px;

	}
	.container {
	padding: 50px 40px 40px 20px;
	text-align:left;

	}
	form {
	border: 5px solid #f1f1f1;


	}

	input[type=text]  {
	width: 100%;
	padding: 16px 8px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #0484f8;;
	box-sizing: border-box;
	}
	input[type=content] {
	width: 100%;
	padding: 40px 8px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #0484f8;;
	box-sizing: border-box;
	}
	input[type=comments]  {
	width: 100%;
	padding: 16px 8px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #0484f8;
	box-sizing: border-box;
	}

	 button {
	background-color: #4286f4;
	color: white;
	padding: 7px ;
	margin: 10px ;
	border: none;
	cursor: grab;
	width: 12%;
	float: right;
	}
	.poster{
		margin-left: 120px;
	}

</style>

	<!-- Bootstra CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

	<!-- Custom styling -->
	<link rel="stylesheet" href="main.css">
</head>
<body>

	<!-- IF THE USERTYPE IS ADMIN, BELOW IS THE PAGE APPEARANCE AND FUNCTIONALITIES -->
	<?php if($_SESSION['usertype']=="admin"){?>

	<!-- TOPNAV -->
	<div class="topnav">
	      <p style="color:white;"><font size="+1" color="white" face="sans serif"> ASTERISK INTERNATIONAL GROUP</font></p>
	      <img src="includes/logo2.jpg" alt="asterisk logo" align="left" width="180" height="100" padding-top="-6px"/>
	    	<div class="admin">
	      <font size="+1" color="white" face="verdana"><?php echo   "You are the Admin" ; ?>  </font><img src="includes/admim.jpg" alt="admin image">
	      <a href="logout.php" style="color:white;">Logout</a>
	</div>

	<!-- SIDENAV -->
	<div class="sidenav">
		<font  color="white" face=>
		<ul text-align:left>
			<a href="">Dashboard</a>
			<a href="">Home</a>
			<br>
					<br>
			<br>
			<br>
		<a href="">Plugins</a>
		<a href="">Posts</a>
		<a href="">Media</a>
		<a href="">Library</a>
		<a href="">Pages</a>
				<br>
				<br>
				<br>
				<br>
		<a href="">Settings</a>
		<a href="users.php">Users</a>
		<a href="">Appearance</a>
		<a href="">Comments</a>
		<a href="">Tools</a>
		</ul>
	</font>
	</div>
	</div>


	<!-- FORM CONTAINER -->
	<div class="formcontainer">
	<div class="container">
	   <section id="postform">
	   	<font face="sans">


			<!-- Display a list of posts from database -->
      <?php if (isset($posts)): ?>
	<?php foreach ($posts as $post): ?>
		<div class="post">
			<h3>
				<a href="details.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a>
			</h3>
		<!--	<p><?php echo $post['body']; ?></p> -->
		</div>
	<?php endforeach ?>
<?php else: ?>
	<h2>No posts available</h2>
<?php endif ?>

				<!-- Form to create posts -->
				<form action="adminuser.php" method="post" enctype="multipart/form-data" class="post-form">
					<h1 class="text-center">Add New Post</h1>
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" >
					</div>

					<div class="form-group" style="position: relative;">
						<label for="post">Body</label>

						<!-- Upload image button -->
						<a href="#" class="btn btn-xs btn-default pull-right upload-img-btn" data-toggle="modal" data-target="#myModal">upload image</a>

						<!-- Input to browse your machine and select image to upload -->
						<input type="file" id="image-input" style="display: none;">

						<textarea name="body" id="body" class="form-control" cols="30" rows="5"></textarea>

						</div>
						<div class="form-group">
							<button type="submit" name="save-post" class="btn btn-primary pull-right">Save Post</button>
						</div>
				</form>

				<!-- Pop-up Modal to display image URL -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Click below to copy image url</h4>
				</div>
				<div class="modal-body">
			<!-- returned image url will be displayed here -->
			<input
				type="text"
				id="post_image_url"
				onclick="return copyUrl()"
				class="form-control"
				>
			<p id="feedback_msg" style="color: green; display: none;"><b>Image url copied to clipboard</b></p>
				</div>
			</div>
		</div>
	</div>
	<br>

	<!-- START OF PHP CODE FOR ADMIN - POSTING -->
	<!-- UPLOADING AND IMAGE -->
	<div class="poster">
	<?php

	  // If upload button is clicked ...
	  if (isset($_POST['upload'])) {

	    $content=   $_POST['content'];




		 $hmk = $adh->registerposts($content);


	  }

	?>


	</div> <!-- END OF PHP CODE FOR ADMIN - POSTING -->

	<style type="text/css">

	</style>

	   </section

	      </font>
	     </div>
	 </div>

	</header>
	</head>


	<body>
	<!-- ELSE IF THE USERTYPE IS USER, BELOW IS THE PAGE APPEARANCE AND FUNCTIONALITIES -->
	<?php } //END OF ADMIN SESSION

	elseif($_SESSION['usertype']=="user") { ?>

<div class="topnav">
         <p style="color:white;"><font size="+1" color="white" face="sans serif">ASTERISK INTERNATIONAL GROUP</font></p>
    <img src="includes/logo2.jpg" alt="asterisk logo" align="left" width="180" height="100" padding-top="-6px"/>
    	<div class="admin">
   <font size="+1" color="white" face="verdana"><?php echo   "Welcome to our page!" ;?> </font><img src="includes/admim.jpg" alt="admin image">
	 <a href="logout.php" style="color:white;">Logout</a>
</div>
</div>

<!-- START OF PHP CODE FOR USER -->
<?php

$hlt = $adh->selectposts();

    if ($hlt->num_rows > 0) {

    while ($arr= mysqli_fetch_assoc($hlt)) {
//The stripslashes() function removes backslashes added by the addslashes() function.
//Tip: This function can be used to clean up data retrieved from a database or from an HTML form.

//stripslashes() can be used if you aren't inserting this data into a place (such as a database) that requires escaping.
//For example, if you're simply outputting data straight from an HTML form.

       $content       = stripslashes($arr['content']);


            ?>

<!-- BOOTSTRAP LINK -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <br>
     <br>
		 <style type="text/css">

   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	/*width: 80%;*/
   	padding: 10px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 150px;
   }
</style>
<!-- CARD FOR DISPLAYING THE POSTS -->
  <div class="col d-flex justify-content-center">
  <div class="card" style="width: 80rem; border: 1px solid #0484f8;">
  <div class="card-body mt-4">

    <br>
    <p class="card-text"> <?php echo $content; ?> </p>
    <br>

 </div>
</body>

</div>
</div>


<?php } ?> <!-- END OF THE WHILE STATEMENT -->
<?php } ?> <!--END OF THE IF STATEMENT -->


<?php } //END OF USER SESSION

 else { ?>
 <p class="card-text"> <?php echo "<p> No Entry has been made </p>"; ?> </p>
<?php } ?>

</body>

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- CKEditor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>

<!-- custom scripts -->
<script src="scripts.js"></script>

</body>
</html>
