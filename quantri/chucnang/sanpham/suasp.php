<?php  
    $product_id=$_GET['product_id'];
    $sqldm="SELECT * FROM category";
    $querydm= mysqli_query($conn,$sqldm);
     $sqlpc="SELECT * FROM producer";
    $querypc= mysqli_query($conn, $sqlpc);

    $sql="SELECT * FROM product WHERE product_id='$product_id'";
    $querypr=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($querypr);

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
            $sql="UPDATE product SET product_name='$ten_sp',product_price='$gia_sp',product_amount='$so_luong',product_trash='$trash',"
                    . "product_sale='$sale',product_status='$trang_thai',"
                    . "product_date='$ngay_nhap', product_content='$chi_tiet_sp',product_image='$anh_sp',cat_code='$id_dm',producer_code='$producer',product_ps='$dac_biet' WHERE product_id=$product_id";
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
        <h1 class="page-header">Sửa thông tin sản phẩm</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa thông tin sản phẩm</div>
            <div class="panel-body">

 <div class="panel-body">

             <!--    <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control"  name="product_name" value="<?php if(isset($_POST['product_name'])){echo $_POST['product_name'];}else{echo $row['product_name'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="gia_sp" value="<?php if(isset($_POST['gia_sp'])){echo $_POST['gia_sp'];}else{echo $row['product_price'];} ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Số lượng nhập vào</label>
                            <input type="text" class="form-control" name="soluong" value="<?php if(isset($_POST['soluong'])){echo $_POST['soluong'];}else{echo $row['product_amount'];} ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>còn lại</label>
                            <input type="text" class="form-control" name="trash" value="<?php if(isset($_POST['trash'])){echo $_POST['trash'];}else{echo $row['product_trash'];} ?>" required="">
                        </div>
                        

                        <div class="form-group">
                            <label>Ảnh mô tả</label>
                            <input type="file" name="anh_sp"><input type="hidden" name="anh_sp" value="<?php echo $row['anh_sp']; ?>">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Khuyến mãi</label>
                            <input type="text" class="form-control" name="sale" value="<?php if(isset($_POST['sale'])){echo $_POST['sale'];}else{echo $row['product_sale'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Còn hàng</label>
                            <input type="text" class="form-control" name="trang_thai" value="<?php if(isset($_POST['trang_thai'])){echo $_POST['trang_thai'];}else{echo $row['product_status'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Sản phẩm đặc biệt</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="dac_biet"
                                        <?php 
                                            if($row['product_ps']==1)
                                            {
                                                echo 'checked';
                                            }
                                         ?>

                                     id="optionsRadios1" value=1>Có
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="dac_biet"
                                        <?php 
                                            if($row['product_ps']==0)
                                            {
                                                echo 'checked';
                                            }
                                         ?>
                                     id="optionsRadios2" value=0>Không
                                </label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Nhà cung cấp</label>
                            <select name="producer" class="form-control">
                                <?php  
                                    while($rowdm= mysqli_fetch_array($querypc)) {
                                ?>
                                <option
                                    <?php
                                    if($row['producer_code']==$rowdm['producer_code']){
                                        echo 'selected="selected"'; 
                                    }?>
                                 value="<?php echo $rowdm['producer_code']; ?>"><?php echo $rowdm['producer_name']; ?></option>
                                <?php 
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Thông tin chi tiết sản phẩm</label>
                            <textarea class="form-control" rows="3" name="chi_tiet_sp"  value="<?php if(isset($_POST['chi_tiet_sp'])){echo $_POST['chi_tiet_sp'];}else{echo $row['product_content'];} ?>"></textarea>
                            <script type="text/javascript">
                                CKEDITOR.replace('chi_tiet_sp');
                            </script>
                        </div>



                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
                </form>

 -->
                 <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control"  name="ten_sp"  value="<?php if(isset($_POST['product_name'])){echo $_POST['product_name'];}else{echo $row['product_name'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="gia_sp"  value="<?php if(isset($_POST['gia_sp'])){echo $_POST['gia_sp'];}else{echo $row['product_price'];} ?>" placeholder=" VNĐ" required="">
                        </div>

                        <div class="form-group">
                            <label>Số lượng nhập vào</label>
                            <input type="text" class="form-control" name="soluong"  value="<?php if(isset($_POST['soluong'])){echo $_POST['soluong'];}else{echo $row['product_amount'];} ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Còn lại</label>
                            <input type="text" class="form-control" name="trash" value="<?php if(isset($_POST['trash'])){echo $_POST['trash'];}else{echo $row['product_trash'];} ?>"  required="">
                        </div>


                        <div class="form-group">
                            <label>Ảnh mô tả</label>
                            <input type="file" name="anh_sp">
                        </div>
                        <div class="form-group">
                            <label>trạng thái</label>
                            <select class="form-control" name="trang_thai" >
                                      <option value="0">Không</option>
                                      <option value="1">Hiện</option>
                                    </select>
                        </div>
                        <div class="form-group">
                            <label>Loại giày</label>

                            <select name="category" class="form-control" value="<?php if(isset($_POST['category'])){echo $_POST['category'];}else{echo $row['cat_code'];} ?>" >
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
                            <input type="text" class="form-control" name="sale" value="<?php if(isset($_POST['sale'])){echo $_POST['sale'];}else{echo $row['product_sale'];} ?>"required="">
                        </div>
                       
                        <div class="form-group">
                            <label>Ngày nhập sửa</label>
                            <input type="date" class="form-control" name="date"  value="<?php if(isset($_POST['ngay_nhap'])){echo $_POST['ngay_nhap'];}else{echo $row['product_date'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Sản phẩm đặc biệt</label>
                            <div class="radio" 
                            <input type="date" class="form-control" name="date"  value="<?php if(isset($_POST['dac_biet'])){echo $_POST['dac_biet'];}else{echo $row['product_ps'];} ?>" >
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
                            <textarea class="form-control" rows="3" name="chi_tiet_sp" value="<?php if(isset($_POST['chi_tiet_sp'])){echo $_POST['chi_tiet_sp'];}else{echo $row['product_content'];} ?>"></textarea><script type="text/javascript">
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
