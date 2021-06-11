<?php  
	
		$id_hd = $_GET['id_hd'];
		include_once '../../ketnoi.php';
		$sql= "DELETE FROM hoadon WHERE id_hd='$id_hd'";
		$query= mysqli_query($conn,$sql);
		header('location: ../../quantri.php?page_layout=danhsachhd');

?>