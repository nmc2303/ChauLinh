<?php  

		$user_id=$_GET['user_id'];
		include_once'../../ketnoi.php';
		$sql = "DELETE FROM user WHERE user_id='$user_id'";
		$query=mysqli_query($conn,$sql);
		header('location: ../../quantri.php?page_layout=quanlytv');

?>