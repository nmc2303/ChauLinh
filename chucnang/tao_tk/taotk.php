<?php  
include_once '../../cauhinh/ketnoi.php';
session_start();
	if (isset($_POST['submit'])) {
        $user_name=$_POST['user_name'];
        $user_address=$_POST['user_address'];
        $user_number=$_POST['user_number'];
		$user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $sql="select * from user where user_name='$user_name'";
        $kt=mysqli_query($conn,$sql);
        if(mysqli_num_rows($kt) >0)
        {
            echo '<center class=" alert alert-danger">Đã có tài khoản</center>'; 
        }
    else
    {
        $sql = "INSERT INTO user(user_name,user_address,user_number,user_email,user_password,user_type) VALUES ('$user_name','$user_address','$user_number','$user_email','$user_password','1')";
           mysqli_query($conn,$sql);
           echo '<center class=" alert alert-success">Chúc mừng bạn đã đăng ký thành công</center>'; 
    }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nguyen Chau Shop</title>

        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/datepicker3.css" rel="stylesheet">
        <link href="../../css/styles.css" rel="stylesheet">
    </head>

    <body>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">Đăng ký </div>
                    <div class="panel-body">
                        <form method="post" role="form">
                            <fieldset>
                            <div class="form-group">
                                    Username: <input class="form-control"  name="user_name" type="text" autofocus="" required="">
                                </div>
                            <div class="form-group">
                                    Address: <input class="form-control"  name="user_address" type="text" autofocus="" required="">
                                </div>
                            <div class="form-group">
                                    Phone number: <input class="form-control"  name="user_number" type="tel" autofocus="" required="">
                                </div>
                                <div class="form-group">
                                    Email: <input class="form-control"  name="user_email" type="email" autofocus="" required="">
                                </div>
                                <div class="form-group">
                                    Mật khẩu: <input class="form-control" id="password" name="user_password" type="password" required="">
                                </div>
                                <div class="form-group">
                                   Nhập lại Mật khẩu: <input class="form-control" id="confirm_password" name="re_user_password" type="password" required=""onkeyup='check();'>
                                </div>
                                <span id='message'></span>
                                <br/>
                                <input   type="submit" name="submit" value="Đăng ký" class="btn btn-primary">
                      
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
                                <input type="reset" name="resset" value="Làm mới" class="btn btn-danger" />
                                <a href="../../index.php"><input type="button" value="Trở về" class="btn btn-default" /></a>				
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->	
     
        <script src="../../js/jquery-1.11.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/chart.min.js"></script>
        <script src="../../js/chart-data.js"></script>
        <script src="../../js/easypiechart.js"></script>
        <script src="../../js/easypiechart-data.js"></script>
        <script src="../../js/bootstrap-datepicker.js"></script>
        <script>
            !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768)
                    $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767)
                    $('#sidebar-collapse').collapse('hide')
            })
        </script>
          
        
    </body>
</html>	