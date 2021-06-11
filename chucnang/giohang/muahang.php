<?php  

if(isset($_POST['submitmuahang']))
{

    $warn = '';
    $flag = true;
    if(isset($_POST['name']))
    $name = $_POST['name'];
    if(isset($_POST['mail']))
        $mail = $_POST['mail'];
    if(isset($_POST['mobi']))
        $mobi = $_POST['mobi'];
    if(isset($_POST['add']))
        $add = $_POST['add'];
    if(isset($_SESSION['giohang'])&& isset($_SESSION['tongtien']))
    {
        $tt = $_SESSION['tongtien'];
        $sql = "INSERT INTO `hoadon`(`ten`, `email`, `sdt`, `diachi`) VALUES ('$name','$mail','$mobi','$add')";
        $rs = mysqli_query($conn,$sql);
        $idhd = mysqli_insert_id($conn);
        foreach($_SESSION['giohang'] as $key => $value)
        {
        $sql1 = "INSERT INTO `cthd`(`id_hd`, `idsp`, `tongtien`) VALUES ($idhd,$key,$tt)";
        $rs = mysqli_query($conn,$sql1);
        if(mysqli_affected_rows($conn)>0)
            $warn =$name." đã đặt hàng thành công";
            unset($_SESSION['giohang']);
        }
    }


}

    if(isset($_SESSION['giohang'])){
        $arrid=array();
        foreach ($_SESSION['giohang'] as $id_sp => $sl) {
            $arrid[]=$id_sp;
        }
        $strId=implode(',', $arrid);
        $sql="SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
        $query=mysqli_query($conn,$sql);
    
?>

<div id="checkout">
<h2 class="h2-bar">xác nhận hóa đơn thanh toán</h2>
<table class="table table-bordered">
    <tr>
    <thead>
    <th>tên sản phẩm</th>
    <th>giá </th>
    <th>số lượng</th>
    <th>thành tiền</th>
    </thead>
    </tr>

    <?php  
    
        $totalPriceAll=0;
            while ($row=mysqli_fetch_array($query)) {
                if($row['sale']!=null)    
                $totalPrice = $_SESSION['giohang'][$row['id_sp']]*($row['gia_sp']*(100 - $row['sale'])/100); 
               else 
               $totalPrice = $_SESSION['giohang'][$row['id_sp']]*($row['gia_sp']);
    ?>
    <tr>
        <td><?php echo $row['ten_sp']; ?></td>
        <td><span><?php if($row['sale']!=null) echo number_format( $row['gia_sp']*(100-$row['sale'])/100); else echo number_format( $row['gia_sp']); ?> VNĐ</span></td>
        <td><?php echo $_SESSION['giohang'][$row['id_sp']]; ?></td>
        <td><span><?php echo number_format( $totalPrice); ?> VNĐ</span></td>
    </tr>
    <?php
        $totalPriceAll+=$totalPrice;  
        }
    
    ?>
    <tr>
        <td>Tổng giá trị hóa đơn:</td>
        <td colspan="2"></td>
        <td><b><span><?php echo number_format( $totalPriceAll); ?> VNĐ</span></b></td>
    </tr>
    <?php } ?>
</table>
</div>

<div id="custom-form" class="col-md-6 col-sm-8 col-xs-12">
<form method="post" action="index.php?page_layout=muahang">
    <div class="form-group">
        <label>Tên khách hàng</label>
        <input required type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>Địa chỉ Email</label>
        <input required type="text" class="form-control" name="mail">
    </div>
    <div class="form-group">
        <label>Số Điện thoại</label>
        <input required type="text" class="form-control" name="mobi">
    </div>
    <div class="form-group">
        <label>Địa chỉ nhận hàng</label>
        <input required type="text" class="form-control" name="add">
    </div>
    <button class="btn btn-info" type="submit" name="submitmuahang">Mua hàng</button>
</form>
<?php if(isset($warn)) echo $warn; ?>
</div>