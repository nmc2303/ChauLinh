<?php  
    $sqldm="SELECT * FROM dmsanpham";
    $querydm= mysqli_query($conn, $sqldm);
    $rowdm=mysqli_fetch_array($querydm);

    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page =1;
    }
    $rowPerPage=8;
    $perRow= $page*$rowPerPage-$rowPerPage;
    $sql="SELECT * FROM sanpham LIMIT $perRow,$rowPerPage";
    $query=mysqli_query($conn, $sql);

    $totalRow=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham "));
    $totalPage=ceil($totalRow/$rowPerPage);
    $list_page="";
    for($i=1;$i<=$totalPage;$i++){
        if($page==$i){
            $list_page.='<li class="active"><a href="index.php?page_layout=danhsachallsp&page='.$i.'" >'.$i.'</a></li>';
        }else{
            $list_page.='<li><a href="index.php?page_layout=danhsachallsp&page='.$i.'">'.$i.'</a></li>';
        }
    }
?>

<div class="products">
    <h2 class="h2-bar"><?php echo "Tất cả sản phẩm"; ?> </h2>
    <div class="row">
        <?php 
            while ($row=mysqli_fetch_array($query)) {
        ?>
        <div class="col-md-3 col-sm-6 product-item text-center">
            <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp']; ?>"></a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh']; ?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang']; ?></p>
            <p class="price">Giá: <?php echo number_format( $row['gia_sp']); ?> VNĐ</p>
        </div>
        <?php  
            }
        ?>
    </div>
</div>
<!-- Pagination -->
<div id="pagination">
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <?php  
            echo $list_page;
        ?>
      </ul>
    </nav>
</div>            
<!-- End Pagination -->    