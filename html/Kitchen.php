<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'ohs');// database name



if(isset($_POST['QuickView']))
{
    $product_id= $_POST['id'];
    $_SESSION['product_id_s']=$product_id;
    header('location:Product-detail.php');
}


if(isset($_POST['Search']))
{

    $dep_name=$_POST['Dep'];
    $department_name=trim($dep_name);
    $query = "SELECT * FROM department where dep_name ='$department_name'" ;
    $query_run = mysqli_query($connection, $query);
    $row=mysqli_fetch_array($query_run);

    if($row['dep_id']=='1'){
        header('location:Furniture.php');

    }
    elseif($row['dep_id']=='2'){
        header('location:Bedding&Bath.php');

    }
    elseif($row['dep_id']=='3'){
        header('location:Appliances.php');

    }
    elseif($row['dep_id']=='4'){
        header('location:Lighting.php');

    }
    elseif($row['dep_id']=='5'){
        header('location:Decor&Pillows.php');

    }
    else{
        header('location:Kitchen.php');
    }


}
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"
    ></script>

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!--title of site-->
    <title>Kitchen</title>

    <!--favicon png-->
    <link rel="shortcut icon" type="image/icon" href="../Images/logo/favicon.png"/>

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="../css/HomeCSS/font-awesome.min.css">

    <!--linear icon css-->
    <link rel="stylesheet" href="../css/HomeCSS/linearicons.css">


    <!--===ICONS===-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>


    <!--animate.css-->
    <link rel="stylesheet" href="../css/HomeCSS/animate.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="../css/HomeCSS/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/HomeCSS/owl.theme.default.min.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="../css/HomeCSS/bootstrap.min.css">

    <!--bootsnav-->
    <link rel="stylesheet" href="../css/HomeCSS/bootsnav.css" >

    <!--style.css-->
    <link rel="stylesheet" href="../css/HomeCSS/style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="../css/HomeCSS/responsive.css">

    <link rel="stylesheet" href="../css/HomeCSS/Depstyle.css">


    <link rel="stylesheet" href="../css/AboutCSS/main.css">
    <link rel="stylesheet" href="../css/AboutCSS/util.css">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <link rel = "stylesheet" href = "../css/HomeCSS/Product.css">



</head>
<body>

<!--welcome-hero start -->
<header id="home" class="welcome-hero">

    <!-- top-area Start -->
    <div class="top-area">
        <div class="header-area">
            <!-- Start Navigation -->
            <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">


                <form method="post">
                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <div class="input-group">
                                <span class="input-group-addon"><input type="submit"  value="Search" name="Search" style="background-color: transparent; "/> </span>
                                <input type="text" class="form-control" placeholder="By Department" name="Dep">
                                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Search -->
                </form>



                <div class="container">
                    <!-- Start Atribute Navigation -->
                    <div class="container">
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="search">
                                    <a href="#"><span class="lnr lnr-magnifier"></span></a>
                                </li><!--/.search-->
                                <li class="nav-user">
                                    <a href="../html/UserInfo.php"><span class="lnr lnr-user"></span></a>
                                </li><!--/.search-->
                                <li class="dropdown">
                                    <a href="ShoppingCart.php" class="dropdown-toggle" data-toggle="dropdown" >
                                        <span class="lnr lnr-cart"></span>

                                    </a>

                                </li><!--/.dropdown-->
                            </ul>
                        </div><!--/.attr-nav-->
                        <!-- End Atribute Navigation -->


                        <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a href="Home.php" class="header-logo">
                            <img src="../Images/logo/logo.PNG" alt="OHS's logo" width="250" height="100">
                        </a>

                    </div><!--/.navbar-header-->
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                            <li><a href="../html/Home.php">home</a></li>
                            <li><a href="../html/Home.php#populer-products">shop</a></li>
                            <li><a href="../html/About.php">About</a></li>
                            <li><a href="../html/Contact.php">contact</a></li>
                            <li><a href="SignIn&SignUp.php">Log Out</a></li>

                        </ul><!--/.nav -->
                    </div><!-- /.navbar-collapse -->
                </div><!--/.container-->
            </nav><!--/nav-->
            <!-- End Navigation -->
        </div><!--/.header-area-->
        <div class="clearfix"></div>

    </div><!-- /.top-area-->
    <!-- top-area End -->

    <!-- For Products page content-->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../Images/About/about0.PNG');">
        <h2 class="ltext-105 cl0 txt-center">
            Kitchen Department
        </h2>
    </section>


    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class = "main-wrapper">
                <div class = "container">
                    <div class = "main-title">
                        <h1>Kitchen Shop List</h1>
                    </div>
                    <div class = "item-list">
                        <?php
                        $query = "SELECT * FROM product WHERE dep_id='6'";
                        $query_run = mysqli_query($connection, $query);
                        while($row=mysqli_fetch_array($query_run))
                        {
                        ?>
                        <form method="post">

                            <div class = "item" style=" width:400px; height:400px">
                                <div class = "item-img" style="width:400px; height:300px">
                                    <img src = "<?php  echo $row['product_img']; ?> ">

                                    <div> <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>"> </div>

                                    <div class = "icon-list" >

                                        <input type="submit" style ="margin: 5px; background-color: #1a1a1a;" value="Quick View" name="QuickView" class="stext-103 cl2 size-102 bg0 bor2 hov-btn1 ">

                                    </div>

                                </div>
                        </form>
                        <div class = "item-detail">
                            <div  class = "item-name"><?php  echo $row['product_name'] ?></div>
                            <div class = "item-price">
                                <?php  echo $row['product_price'] ?>$
                            </div>

                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
        </div>
    </section>




</header><!--/.welcome-hero-->
<!--welcome-hero end -->
<!--container-footer -->
<section id="container-footer"  class="container-footer">
    <div class="container">
        <div class="hm-footer-details">
            <div class="row">

                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>COLLECTIONS</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-menu">
                            <ul>
                                <li><a href="../html/Furniture.php">Furniture</a></li><!--/li-->
                                <li><a href="../html/Bedding&Bath.php">Bedding & Bath</a></li><!--/li-->
                                <li><a href="../html/Decor&Pillows.php">Décor & Pillows</a></li><!--/li-->
                                <li><a href="../html/Lighting.php">Lighting</a></li><!--/li-->
                                <li><a href="../html/Appliances.php">Appliances</a></li><!--/li-->
                                <li><a href="../html/Kitchen.php">Kitchen </a></li><!--/li-->


                            </ul><!--/ul-->
                        </div><!--/.hm-foot-menu-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->

                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>MY ACCOUNT</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-menu">
                            <ul>
                                <li><a href="#">my account</a></li><!--/li-->
                                <li><a href="../html/ShoppingCart.php">my cart</a></li><!--/li-->

                            </ul><!--/ul-->
                        </div><!--/.hm-foot-menu-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->

                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>INFORMATION</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-menu">
                            <ul>
                                <li><a href="../html/About.php">about us</a></li><!--/li-->
                                <li><a href="../html/Contact.php">contact us</a></li><!--/li-->

                            </ul><!--/ul-->
                        </div><!--/.hm-foot-menu-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->

                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>FOLLOW US</h4>
                        </div><!--/.hm-foot-title-->
                        <a href="https://www.facebook.com/tala.hamad.99" target="_blank"class="footer__social"><i class="bx bxl-facebook-square"></i></a>
                        <a href="https://www.instagram.com/" class="footer__social" target="_blank"><i class="bx bxl-instagram-alt"></i></a>
                        <a href="https://twitter.com/talahamad21" class="footer__social" target="_blank"><i class="bx bxl-twitter"></i></a>
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.hm-footer-details-->

    </div><!--/.container-->
</section><!--/container-footer-->
<!--container-footer end -->

<!-- Include all js compiled plugins (below), or include individual files as needed -->

<script src="../js/HomeJS/jquery.js"></script>

<!--modernizr.min.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!--bootstrap.min.js-->
<script src="../js/HomeJS/bootstrap.min.js"></script>

<!-- bootsnav js -->
<script src="../js/HomeJS/bootsnav.js"></script>

<!--owl.carousel.js-->
<script src="../js/HomeJS/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src= url="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css"> </script>
<!--Custom JS-->
<script src="../js/HomeJS/custom.js"></script>
<script src = "../js/HomeJS/Product.js"></script>

</body>
</html>




