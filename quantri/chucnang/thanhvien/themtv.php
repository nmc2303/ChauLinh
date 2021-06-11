<?php  
	if (isset($_POST['submit'])) {
		$user_name=$_POST['user_name'];
        $user_address=$_POST['user_address'];
        $user_number=$_POST['user_number'];
		$user_email=$_POST['user_email'];
		$user_password=$_POST['user_password'];
		$user_type=$_POST['user_type'];
		if (isset($user_name)&&isset($user_password)&&isset($user_type)) {
			$sql="INSERT INTO user(user_name,user_address,user_number,user_email,user_password,user_type) VALUES('$user_name','$user_address','$user_number','$user_email','$user_password','$user_type')";
			$query=mysqli_query($conn,$sql);
			header('location: quantri.php?page_layout=quanlytv');
		}
	}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thêm thành viên</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm bình luận</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <table data-toggle="table">
                            <thead>
                                <tr>                                
		                            <th data-sortable="true">Username</th>
                                    <th data-sortable="true">Địa chỉ</th>
                                    <th data-sortable="true">Số điện thoại</th>
                                    <th data-sortable="true">Email</th>
		                            <th data-sortable="true">Mật khẩu</th>
                                    <th data-sortable="true">Nhập lại mật khẩu</th>
		                            <th data-sortable="true">Quyền truy cập</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="user_name" value="<?php if(isset($_POST['user_name']))echo $_POST['user_name'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="user_address" value="<?php if(isset($_POST['user_address']))echo $_POST['user_address'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="tel" name="user_number" value="<?php if(isset($_POST['user_number']))echo $_POST['user_number'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="email" name="user_email" value="<?php if(isset($_POST['user_email']))echo $_POST['user_email'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="password" id="password" name="user_password" value="<?php if(isset($_POST['user_password']))echo $_POST['user_password'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="password" name="user_repassword"  id="confirm_password" required="" onkeyup='check();'>
                                    </td>
                                    <span id='message'></span>
                                    <td data-checkbox="true">
                                       <input name="user_type" type="number" min="1" max="2" class="form-control text-center" value="1">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
        
                        <script>
	var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Trùng khớp';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Không trùng khớp ';
  }
}  </script>
                        <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                </div>
                </form>
                
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->