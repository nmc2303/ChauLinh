
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Trang chủ quản trị</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-blue panel-widget ">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php $sql="select count('id_sp') from sanpham";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
?></div>
                    <div class="text-muted">Sản Phẩm</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-orange panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php $sql="select count('id_bl') from blsanpham";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
?></div>
                    <div class="text-muted">Bình luận</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php $sql="select count('id_thanhvien') from thanhvien";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
?></div>
                    <div class="text-muted">Thành viên</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-red panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php $sql="select count('id_dm') from dmsanpham";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
?></div>
                    <div class="text-muted">Danh mục sản phẩm </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <p></p>



                    <br/>
                   
                        <b>Nguyen Chau shop!</b></p>
                
            </div>
        </div>
    </div>
</div><!--/.row-->

