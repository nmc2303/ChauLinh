<?php
    $tg = time();
    $tgout = 900;
    $tgnew = $tg - $tgout;
    $PHP_SELF = $_SERVER['PHP_SELF'];
    $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
    $sql="INSERT into useronline(tgtmp,ip,local) values('$tg','$REMOTE_ADDR','$PHP_SELF')";
    $query = mysqli_query($conn,$sql);
    $sql = "DELETE from useronline where tgtmp < $tgnew";
    $query = mysqli_query($conn,$sql);
    $sql = "SELECT DISTINCT ip FROM useronline WHERE local='$PHP_SELF'";
    $query = mysqli_query($conn,$sql);
    $user = mysqli_num_rows($query);
?>

<div id="counter">
    <h2 class="h2-bar">thống kê truy cập</h2>
    <p>Hiện có <span><?php echo $user; ?></span> người đang xem</p>
</div>