<?php 
 
  
    include 'core/init.php' ;
    
    if (isset($_SESSION['user_id'])) {
      header('location: home.php');
    }
   
?>

<html>
	<head>
		<title>TwitterClone</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
        <!-- <link rel="stylesheet" href="assets/css/style-complete.css"/> -->
        <link rel="stylesheet" href="assets/css/index_style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/all.min.css">

		<link rel="shortcut icon" type="image/png" href="assets/images/twitter.svg"> 
	</head>
<body>
<main class="twt-main">
            <section class="twt-login">
                <?php include 'includes/login.php';  ?>
                    <div class="slow-login">
                        <img class="ImgHy61" title="Ảnh Elipchet" src="./assets/images/Elipchet.png" alt="bird">
                        <button class="login-small-display signin-btn pri-btn">Đăng nhập</button>
                        <span class="front-para">Xem những gì đang xảy ra trên thế giới ngay bây giờ</span>
                        <span class="join">Tạo tài khoản để tham gia Elipchet</span>
                        <button type="button" id="auto" onclick="" class="signup-btn pri-btn" data-toggle="modal" data-target="#exampleModalCenter">
                            Đăng ký</button>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header"><h5 style="font-weight: 700;" class="modal-title" id="exampleModalLongTitle">Sign Up For Free</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><?php  include 'includes/signup-form.php' ?></div></div></div></div>


                    </div>
            </section>
            <section class="twt-features">
                <div class="features-div">
                    <img class="twt-icon" src='https://image.ibb.co/bzvrkp/search_icon.png'>
                    <p>Tìm kiếm bạn bè</p>
                    <img class="twt-icon" src="https://image.ibb.co/mZPTWU/heart_icon.png">
                    <p>Yêu thích những bài viết khác</p>
                    <img class="twt-icon" src="https://image.ibb.co/kw2Ad9/conv_icon.png">
                    <p>Bình luận bài viết</p>
                </div>
            </section>
            <footer>
            <ul class="Cborerha5">
                    <li>Việt Nam</li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">English (UK)</a></li>
                    <li><a href="#">中文(台灣)</a></li>
                    <li><a href="#">한국어</a></li>
                    <li><a href="#">Français (France)</a></li>
                    <li><a href="#">ภาษาไทย</a></li>
                    <li><a href="#">Khu vực</a></li>
                    <li><a href="#">Thông tin server của bạn.</a></li>
                </ul>
                <ul style="margin-top: -10px;">
                    <li><a href="#">Đăng ký</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                    <li><a href="#">Messenger</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Cookies</a></li>
                    <li><a href="#">Quyền riêng tư</a></li>
                    <li><a href="#">Watch</a></li>
                    <li><a href="#">Trung tâm trợ giúp</a></li>
                    <li><a href="#">Điều tài khoản</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Thông tin nhà phát triển</a></li>
                    <!-- <li style="color:#1DA1F2;"><b>- Developed By Admin HLT2K-</b></li> -->
                </ul>
                <li>copyright© 2022 - Elipchet</li>
            </footer>
        </main>
        
        <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/mine.js"></script>
</body>
</html>
