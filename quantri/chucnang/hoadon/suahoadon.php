<?php  
    $id_hd=$_GET['id_hd'];
    $sqlhd="SELECT * FROM hoadon";
    $queryhd= mysqli_query($conn,$sqlhd);

    $sql="SELECT * FROM hoadon WHERE id_hd='$id_hd'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);

    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $email=$_POST['email'];
        $sdt=$_POST['sdt'];
        $diachi=$_POST['diachi'];

        if(isset($ten) && isset($email) && isset($sdt) && isset($diachi)){
            $sql="UPDATE hoadon SET ten='$ten',email='$email',sdt='$sdt',diachi='$diachi'WHERE id_hd=$id_hd";
            $query= mysqli_query($conn, $sql);
            header('location: quantri.php?page_layout=danhsachsp');
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
        <h1 class="page-header">Sửa thông tin hóa đơn</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa thông tin hóa đơn</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên khách</label>
                            <input type="text" class="form-control"  name="ten" value="<?php if(isset($_POST['ten'])){echo $_POST['ten'];}else{echo $row['ten'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}else{echo $row['email'];} ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" value="<?php if(isset($_POST['sdt'])){echo $_POST['sdt'];}else{echo $row['sdt'];} ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="diachi" value="<?php if(isset($_POST['diachi'])){echo $_POST['diachi'];}else{echo $row['diachi'];} ?>" required="">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
