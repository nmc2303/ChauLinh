<script>
    function xoahoadon(){
        var conf= confirm("Bạn có chắc chắn muốn xóa hóa đơn này hay không?");
        return conf;
    }
</script>
<?php
if(isset($_POST['capnhat'])){
    $xuly = $_POST['xuly'];
    $mahang = $_POST['mahang_xuly'];
    $sql_update_hoadon = mysqli_query($conn,"UPDATE hoadon SET trangthai='$xuly' WHERE id_hd = '$mahang'");
}
?>
<?php
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $rowPerPage=5;
    $perPage=$page*$rowPerPage-$rowPerPage;
    $sql="SELECT * FROM hoadon ORDER BY id_hd ASC LIMIT $perPage,$rowPerPage";
    $query = mysqli_query($conn,$sql);
    $totalRows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM hoadon"));
    $totalPage=ceil($totalRows/$rowPerPage);
    $listPage="";
    for($i=1;$i<=$totalPage;$i++)
    {
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachhd&page='.$i.'">'.$i.'</a></li>';
        }else{
            $listPage.='<li><a href="quantri.php?page_layout=danhsachhd&page='.$i.'">'.$i.'</a></li>';
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
        <h1 class="page-header">Quản lý hóa đơn</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=themhoadon" class="btn btn-primary" style="margin: -40px 0 20px 0; position: absolute;">Thêm hóa đơn mới</a>
                <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
                <table >
                
                <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên khách</th>
                            <th data-sortable="true">Email</th>
                            <th data-sortable="true">Số điện thoại</th>
                            <th data-sortable="true">Địa chỉ</th>
                            <th data-sortable="true">Trạng thái</th>
                            <th data-sortable="true">Xử lý</th>
                            <th data-sortable="true">Cập nhật</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php  
                            while($row= mysqli_fetch_array($query)) {
                        ?>
                         
                        <tr>
                            <form action="" method="POST">
                            <td data-checkbox="true"><?php echo $row['id_hd']; ?></td>
                            <td data-checkbox="true"><?php echo $row['ten']; ?></td>
                            <td data-checkbox="true"><?php echo $row['email']; ?></td>
                            <td data-checkbox="true"><?php echo $row['sdt']; ?></td>
                            <td data-checkbox="true"><?php echo $row['diachi']; ?></td>	
                           
                            <td data-checkbox="true"><?php if ($row['trangthai'] == 0){
                                echo'Chưa xử lý';
                            }else{
                                echo 'Đã xử lý' ;
                            }
                             ?></td>	
                            <td data-checkbox="true"><select class="form-control" name="xuly">
                                <option value="0">Chưa xử lý</option>
                                <option value="1">Đã xử lý</option>
                            </select></td>
                            <td data-checkbox="true"><input type="submit" value="Cập nhật" name="capnhat" class="btn btn-success"></td>
                            
                            <input type="hidden" name="mahang_xuly" value="<?php echo $row['id_hd']?>">
                            </form>
                            <td>
                                <a href="quantri.php?page_layout=suahoadon&id_hd=<?php echo $row['id_hd']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>
                            <td>
                                <a onclick="return xoadanhmuc();" href="./chucnang/hoadon/xoahoadon.php?id_hd=<?php echo $row['id_hd']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>

                        <?php  
                            }
                        ?>

                    </tbody>
                </table>
                <ul class="pagination" style="float: right;">
                    <?php  
                        echo $listPage;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->	
