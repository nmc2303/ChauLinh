<?php 
	if (isset($_SESSION['user_name'])){
?>
<div id="login" class="col-md-4 col-sm-12 col-xs-12 text-right">
    <div id="login-main">
        <ul>
        	<li id="user">Xin chào <?php echo $_SESSION['user_name'];?>
                <div>
                    <ul id="user-main">
                        <li><a href="./quantri/chucnang/dangxuat/dangxuat.php" class="btn btn-danger">Logout</a></li>
                    </ul>      
                </div>
            </li>
        </ul>
    </div>
</div>
<?php  
	}else{
?>
<div id="login" class="col-md-4 col-sm-12 col-xs-12 text-right" style="padding-top: 7px; margin-bottom: -4px;">
    <div id="login-main">
        <p><a href="./quantri/index.php" class="btn btn-success">Đăng nhập</a> <span> / </span> <a href="./chucnang/tao_tk/taotk.php" class="btn btn-primary">Đăng Ký</a></p>
    </div>
</div>
<?php  
	}
?>