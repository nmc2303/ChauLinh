<?php
	
		$product_id=$_GET['product_id'];
		include_once'../../ketnoi.php';
		$sql="DELETE FROM product WHERE product_id='$product_id'";
		$query=mysqli_query($conn ,$sql);
		header('location: ../../quantri.php?page_layout=danhsachsp');

?>