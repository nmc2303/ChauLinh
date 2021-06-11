<?php  
	$user_name= $_GET['user_name'];
	$user_password=$_GET['user_password'];
	$sql="SELECT * FROM user WHERE user_name='$user_name' AND user_password='$user_password'";
	$query=mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($query);
?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thông tin thành viên</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">			
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Username</th>
                            <th data-sortable="true">Mật khẩu</th>
                            <th data-sortable="true">Quyền truy cập</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['user_id']; ?></td>
                            <td data-checkbox="true"><a href="quantri.php?page_layout=suatv&user_id=<?php echo $row['user_id'];?>"><?php echo $row['user_name']; ?></a></td>
                            <td data-checkbox="true"><?php echo $row['user_password']; ?></td>
                            <td data-sortable="true"><?php echo $row['user_type']; ?></td>
                            <td>
                                <a href="quantri.php?page_layout=suatv&user_id=<?php echo $row['user_id']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>
                            <td>
                                <a onclick="return xoatv();" href="./chucnang/thanhvien/xoatv.php?user_id=<?php echo $row['user_id']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!--/.row-->	