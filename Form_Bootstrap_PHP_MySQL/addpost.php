<?php
	require('config/config.php');
	require('config/db.php');
	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
		$mail_id = mysqli_real_escape_string($conn,$_POST['mail_id']);

		$query = "INSERT INTO posts(name, mail_id,roll_no) VALUES('$name', '$mail_id', '$roll_no')";
		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>
<?php include('inc/header.php'); ?>
	<div class="container">
		<h1>Add Post</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>mail_id</label>
				<input type="text" name="mail_id" class="form-control">
			</div>
			<div class="form-group">
				<label>roll_no</label>
				<textarea name="roll_no" class="form-control"></textarea>
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>