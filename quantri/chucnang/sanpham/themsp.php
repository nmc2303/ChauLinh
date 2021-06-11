<?php  
    $sqldm="SELECT * FROM category";
    $querydm= mysqli_query($conn, $sqldm);
     $sqlpc="SELECT * FROM producer";
    $querypc= mysqli_query($conn, $sqlpc);
    
    if(isset($_POST['submit'])){
        $ten_sp=$_POST['ten_sp'];
        $gia_sp=$_POST['gia_sp'];
        $so_luong=$_POST['soluong'];
        $trash=$_POST['trash'];
        $sale=$_POST['sale'];
        $trang_thai=$_POST['trang_thai'];
        $ngay_nhap=$_POST['date'];
        $chi_tiet_sp=$_POST['chi_tiet_sp'];

        if($_FILES['anh_sp']['name']==''){
            $error_anh_sp='<span style="color: red;">(*)</span>';
        }
        else{
            $anh_sp=$_FILES['anh_sp']['name'];
            $tmp_name=$_FILES['anh_sp']['tmp_name'];
        }

        if($_POST['category']=='unselect'){
            $error_id_dm='<span style="color: red;">(*)</span>';          
        }else{
            $id_dm=$_POST['category'];
        }
        if($_POST['producer']=='unselect'){
            $error_producer='<span style="color: red;">(*)</span>';          
        }else{
            $producer=$_POST['producer'];
        }
        $dac_biet=$_POST['dac_biet'];
        if (isset($ten_sp) && isset($gia_sp) && isset($so_luong) && isset($trash)  && isset($sale) && isset($trang_thai) && isset($ngay_nhap) && isset($chi_tiet_sp) && isset($anh_sp) && isset($id_dm) && isset($producer) && isset($dac_biet)) {
            move_uploaded_file($tmp_name, 'anh/'.$anh_sp);
            $sql="INSERT INTO product(product_name,product_price,product_amount,product_trash,product_sale,product_status,product_date,product_content,product_image,cat_code,producer_code,product_ps) VALUES('$ten_sp','$gia_sp','$so_luong','$trash','$sale','$trang_thai','$ngay_nhap','$chi_tiet_sp','$anh_sp','$id_dm','$producer','$dac_biet')";
            $query= mysqli_query($conn , $sql);
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
        <h1 class="page-header">Thêm sản phẩm mới</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm sản phẩm mới</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control"  name="ten_sp" required="">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="gia_sp" placeholder=" VNĐ" required="">
                        </div>

                        <div class="form-group">
                            <label>Số lượng nhập vào</label>
                            <input type="text" class="form-control" name="soluong" value="0" required="">
                        </div>

                        <div class="form-group">
                            <label>Còn lại</label>
                            <input type="text" class="form-control" name="trash" value="0" required="">
                        </div>


                        <div class="form-group">
                            <label>Ảnh mô tả</label>
                            <input type="file" name="anh_sp">
                        </div>
                        <div class="form-group">
                            <label>trạng thái</label>
                            <select class="form-control" name="trang_thai">
                                      <option value="0">Không</option>
                                      <option value="1">Hiện</option>
                                    </select>
                        </div>
                        <div class="form-group">
                            <label>Loại giày</label>
                            <select name="category" class="form-control">
                                <option value="unselect" selected>Lựa chọn Loại giày</option>
                                <?php
                                    while($rowdm= mysqli_fetch_array($querydm)){
                                ?>
                                <option value="<?php echo $rowdm['cat_code']; ?>"><?php echo $rowdm['cat_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sale</label>
                            <input type="text" class="form-control" name="sale" placeholder="10%" required="">
                        </div>
                       
                        <div class="form-group">
                            <label>Ngày nhập</label>
                            <input type="date" class="form-control" name="date" required="">
                        </div>
                        <div class="form-group">
                            <label>Sản phẩm đặc biệt</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="dac_biet" id="optionsRadios1" value=1>Có
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="dac_biet" id="optionsRadios2" value=0 checked>Không
                                </label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Nhà cung cấp</label>
                            <select name="producer" class="form-control">
                                <option value="unselect" selected>Lựa chọn nhà cung cấp</option>
                                <?php
                                    while($rowdm= mysqli_fetch_array($querypc)){
                                ?>
                                <option value="<?php echo $rowdm['producer_code']; ?>"><?php echo $rowdm['producer_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thông tin chi tiết sản phẩm</label>
                            <textarea class="form-control" rows="3" name="chi_tiet_sp"></textarea><script type="text/javascript">
                                CKEDITOR.replace('chi_tiet_sp');
                            </script>
                        </div>



                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
