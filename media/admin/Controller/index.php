<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta http-equiv="Location" content="http://example.com/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>NewFriend</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="./images/logo/runn.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="./css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="./css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="./css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="./css/custom.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <?php
            $admin = $_SESSION['admin'] ?? "";
            if ($admin && $_GET['act']  !== 'login' &&  $_GET['act'] !== 'logout') {
                include './model/include/sidebar.php';
            } else {
                $tt = '';
            }
            ?>
            <?php
            $admin = $_SESSION['admin'] ?? "";
            if ($admin && $_GET['act'] !== 'login') {
                include './model/include/header.php';
            } else {
                $tt = '';
            }
            ?>
        </div>
        <?php
        include './cmt/cmtList.php';
        include 'Listhome.php';
        include './User/user.php';
        include './Post/postlist.php';
        include './model/model.php';
        include './model/login.php';
        $action = "home";
        if (isset($_GET['act']))
            $action = $_GET['act'];
        if (!isset($_SESSION['admin'])) {
            $action = "login";
        }
        switch ($action) {
            case "login":
                include './login.php';
                break;
            case "home":
                include './home.php';
                break;
            case "cmt":
                include './cmt/comment.php';
                break;
            case "qluser":
                include './User/dashboard.php';
                break;
            case "qlpost":
                include './post/psost.php';
                break;
            case "Ct_user":
                include './User/detail_User.php';
                break;
            case "Ct_Post":
                include './post/detail_Post.php';
                break;
            case "Ct_cmt":
                include './cmt/detail_cmt.php';
                break;
            case "add":
                include './User/user_add.php';
                break;
            case "black":
                include './User/blacklist.php';
                break;
            case "unlock":
                include './User/unlock.php';
                break;
            case "xoa":
                include './post/xoa.php';
                break;
            case "del":
                include './cmt/xoacmt.php';
                break;
            case "logout":
                unset($_SESSION['admin']);
                header("location: ./index.php?act=login");
                break;
        }
        ?>
    </div>
    </div>
    <!-- jQuery -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="./js/animate.js"></script>
    <!-- select country -->
    <script src="./js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="./js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="./js/Chart.min.js"></script>
    <script src="./js/Chart.bundle.min.js"></script>
    <script src="./js/utils.js"></script>
    <script src="./js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="./js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="./js/chart_custom_style1.js"></script>
    <script src="./js/custom.js"></script>
</body>

</html>