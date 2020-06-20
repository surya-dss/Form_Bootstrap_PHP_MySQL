<?php
	require('config/config.php');
	require('config/db.php');

	if(isset($_POST['submit'])){
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
		$mail_id = mysqli_real_escape_string($conn,$_POST['mail_id']);

		$query = "UPDATE posts SET 
					name='$name',
					mail_id='$mail_id',
					roll_no='$roll_no' 
						WHERE id = {$update_id}";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM posts WHERE id = '.$id;

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$post = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<h1>Add Post</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $post['name']; ?>">
			</div>
			<div class="form-group">
				<label>mail_id</label>
				<input type="text" name="mail_id" class="form-control" value="<?php echo $post['mail_id']; ?>">
			</div>
			<div class="form-group">
				<label>roll_no</label>
				<textarea name="roll_no" class="form-control"><?php echo $post['roll_no']; ?></textarea>
			</div>
			<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>