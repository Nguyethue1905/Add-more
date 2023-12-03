<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>NewFriend</title>
    <link rel="icon" href="./View/images/runn.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="./View/css/main.min.css">
    <link rel="stylesheet" href="./View/css/style.css">
    <link rel="stylesheet" href="./View/css/color.css">
    <link rel="stylesheet" href="./View/css/responsive.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./View/asset/css/login.css">
    <link rel="stylesheet" href="./View/asset/css/upload.css">

</head>
<?php
    include './Model/login.php';
    include './Model/model.php';
    include './Model/signup.php';
    include './Model/profile.php';
    include './Model/upload-img.php';
    include './Model/posts.php';
    include './Model/looking_for_friends.php';
    include './Model/comment.php';

$action = "home";
?>

<body>
    <div class="theme-layout">
        <?php
        $user = $_SESSION['user'] ?? "";
        if ($user) {
            include './model/include/header.php';
        }else{
          $tl = "";
        }
  
        if(!isset($_GET['act'])){
          $v = "";
        }elseif($_GET['act'] === "myacount"){
          include './Model/include/all.php';
        }
        ?>
        <section>
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="page-contents">
                                <?php
                                $contact = $_GET['act'] ?? "";
                                $user = $_SESSION['user'] ?? "";
                                $x = $_GET['act'] ?? "";
                                if ($user &&  $x !== 'contact') {
                                    include './Model/include/sidebar.php';
                                }

                                ?>
                                <?php
                                $action = "home";
                                if (isset($_GET['act']))
                                    $action = $_GET['act'];
                                if (!isset($_SESSION['user'])) {
                                    $action = "login";
                                    $v = $_GET['act'] ?? "";
                                    if ($v == 'register') {
                                        $action = "register";
                                    }
                                    if ($v == 'forgot_password') {
                                        $action = "forgot_password";
                                    }
                                }
                                switch ($action) {
                                    case "home":
                                        include './View/home.php';
                                        break;
                                    case "register":
                                        include './View/register.php';
                                        break;
                                    case "login":
                                        include './View/login.php';
                                        break;
                                    case "myacount":
                                        include './View/myacount.php';
                                        break;
                                    case "friend":
                                        include './View/friend.php';
                                        break;
                                    case "searchfr":
                                        include './View/searchfr.php';
                                        break;
                                    case "edit":
                                        include './View/editacount.php';
                                        break;
                                    case "information":
                                        include './View/information.php';
                                        break;
                                    case "ib":
                                        include './View/chat.php';
                                        break;
                                    case "messages":
                                        include './View/messages.php';
                                        break;
                                    case "contact":
                                        include './View/contact.php';
                                        break;
                                    case "register":
                                        include './View/register.php';
                                        break;
                                    case "forgot_password":
                                        include './View/Forgot_password.php';
                                        break;
                                    case "searchfr":
                                        include './View/searchfr.php';
                                        break;
                                    case "send_friend_request":
                                        include './View/send_friend_request.php';
                                        break;
                                    case "logout":
                                        unset($_SESSION['user']);
                                        header("Location: index.php?act=login");
                                        break;
                                }
                                ?>
                                <?php
                                $user = $_SESSION['user'] ?? "";
                                if ($user && $x !== 'contact') {
                                    include './Model/include/listfen.php';
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    $p = $_GET['act'] ?? "";
    if ($p == 'contact') {
        include './Model/include/footer.php';
    } elseif ($p) {
        "";
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="./View/js/main.min.js"></script>
    <script src="./View/js/script.js"></script>
    <script src="./View/js/map-init.js"></script>
    <script src="./View/asset/js/post.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

    <!-- <script src="./asset/js/login.js"></script>  -->

</body>

</html>
<?php
    ob_end_flush();
?>