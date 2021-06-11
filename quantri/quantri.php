<?php  
    ob_start();
    session_start();
    include_once'./ketnoi.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chau Linh Shop</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="quantri.php"><span>Châu Linh SHOP</span> Trang Admin</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><span style="color: white;">Xin chào, <?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="quantri.php?page_layout=thongtin&user_name=<?php echo $_SESSION['user_name'];?>&user_password=<?php echo $_SESSION['user_password'];?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Thông tin thành viên</a></li>
                                <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Cài đặt</a></li>
                                <li><a href="./chucnang/dangxuat/dangxuat.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm">
                </div>
            </form>
            <ul class="nav menu">
                <li class="active"><a href="quantri.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ quản trị</a></li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=quanlytv">
                        <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý thành viên
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li>
                            <a href="quantri.php?page_layout=themtv">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
                                Thêm mới
                            </a>
                        </li>
                    </ul>			
                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=danhsachdm">
                        <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý danh mục
                    </a>
                    <ul class="children collapse" id="sub-item-2">
                        <li>
                            <a class="" href="quantri.php?page_layout=themdm">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>			
                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=danhsachsp">
                        <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý sản phẩm
                    </a>
                    <ul class="children collapse" id="sub-item-3">
                        <li>
                            <a class="" href="quantri.php?page_layout=themsp">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>				
                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=blsp">
                        <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg></span> Quản lý bình luận
                    </a>

                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=quangcao">
                        <span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý quảng cáo
                    </a>
                    <ul class="children collapse" id="sub-item-5">
                        <li>
                            <a class="" href="#">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>			
                </li>

                
                <li class="parent ">
                    <a href="quantri.php?page_layout=danhsachhd">
                        <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý hóa đơn
                    </a>
                    <ul class="children collapse" id="sub-item-2">
                        <li>
                            <a class="" href="quantri.php?page_layout=themdm">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>			

                <li role="presentation" class="divider"></li>
                <li><a href="./chucnang/dangxuat/dangxuat.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Đăng xuất</a></li>
            </ul>

        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <?php  
                //master page
                if(isset($_GET['page_layout'])){
                    switch ($_GET['page_layout']) {
                        case 'danhsachsp':include_once'./chucnang/sanpham/danhsachsp.php';
                            break;
                        case 'danhsachdm':include_once'./chucnang/danhmuc/danhsachdm.php';
                            break;
                        case 'suadm':include_once'./chucnang/danhmuc/suadm.php';
                            break;
                        case 'suasp':include_once'./chucnang/sanpham/suasp.php';
                            break;
                        case 'themsp':include_once'./chucnang/sanpham/themsp.php';
                            break;
                        case 'themdm':include_once'./chucnang/danhmuc/themdm.php';
                            break;
                        case 'blsp': include_once'./chucnang/binhluan/binhluan.php';
                            break;
                        case 'suabl': include_once'./chucnang/binhluan/suabl.php';
                            break;
                        case 'thembl': include_once'./chucnang/binhluan/thembl.php';
                            break;
                        case 'quanlytv': include_once'./chucnang/thanhvien/quanlytv.php';
                            break;
                        case 'themtv': include_once'./chucnang/thanhvien/themtv.php';
                            break;
                        case 'suatv': include_once'./chucnang/thanhvien/suatv.php';
                            break;
                        case 'quangcao': include_once'./chucnang/quangcao/quangcao.php';
                            break;
                        case 'themquangcao': include_once'./chucnang/quangcao/themquangcao.php';
                            break;
                        case 'suaquangcao': include_once'./chucnang/quangcao/suaquangcao.php';
                            break;
                        case 'danhsachhd': include_once'./chucnang/hoadon/danhsachhd.php';
                            break;
                        case 'themhoadon': include_once'./chucnang/hoadon/themhoadon.php';
                            break;
                        case 'suahoadon': include_once'./chucnang/hoadon/suahoadon.php';
                            break;
                        case 'xoahoadon': include_once'./chucnang/hoadon/xoahoadon.php';
                            break;
                        case 'thongtin': include_once'./chucnang/thanhvien/thongtin.php';
                            break;
                        default:include_once'./gioithieu.php';
                    }
                }
                else{
                    include_once'./gioithieu.php';
                }
            ?>
        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>	
        <script src="js/bootstrap-table.js"></script>
        <link rel="stylesheet" href="css/bootstrap-table.css"/>
        <script>
            $('#calendar').datepicker({
            });

            !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768)
                    $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767)
                    $('#sidebar-collapse').collapse('hide')
            })
        </script>	
    </body>

</html>
<?php  
  
?>