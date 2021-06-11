<?php  
$sqlhd="SELECT * FROM hoadon";
$queryhoadon= mysqli_query($conn, $sqlhd);
    if (isset($_POST['submit'])) {
        $ten=$_POST['ten'];
        $email=$_POST['email'];
        $sdt=$_POST['sdt'];
        $diachi=$_POST['diachi'];
        if(isset($ten) && isset($email) && isset($sdt) && isset($diachi)){
            $sql = "INSERT INTO hoadon(ten,email,sdt,diachi) VALUES('$ten','$email','$sdt','$diachi')";
            $query = mysqli_query($conn, $sql);
            header('location: quantri.php?page_layout=danhsachhd');
        }
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thêm mới hóa đơn</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm mới hóa đơn</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Tên khách</label>
                            <input class="form-control" type="text" required="" name="ten">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" required="" name="email">
                        </div>		
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" required="" name="sdt">
                        </div>		
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" required="" name="diachi">
                        </div>																							
                        <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
