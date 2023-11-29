<?php
$displaycode = "none";
$displaypass = "none";
$displayemail = "block";
$not_email = "none";
?>
<?php
if (isset($_POST['send'])) {
    $email = $_POST['email'] ?? "";
    $_SESSION['email'] = $_POST['email'];
    $data = new signup();
    $reset = $data->checkIfEmailExists($email);
    if ($reset["count"] === "1") {
        $displayemail = 'none';
        $displaycode = 'block';
        echo '
                <div class="dangki" style="display:<?= $displaycode ?>;">
            <form class="form lko" method="post">
                <p class="title">Nhập mã code </p>
                <label>
                    <span class="ll">Mã</span>
                    <input placeholder="" type="text" class="input" name="code">
                </label>
                <p class="signin">Nhận mã mới qua email</p>
                <button class="submit" type="submit" name="resend">Gửi lại</button>
                <p style="color:red;">Mã OTP mã gửi đến email của bạn</p>
                <p class="signin">Nhập mật khẩu mới!<button class="submit" type="submit" name="next">Tiếp tục</button></p>
            </form>
        </div>
        ';
        include './Model/send_mail.php';
    } else {
        echo '<div class="eror">Email chưa có tài khoản</div>';
        $displayemail = 'block';
    }
} elseif (isset($_POST['resend'])) {
    $displayemail = 'none';
    $displaycode = 'block';
    echo '
            <div class="dangki" style="display:<?= $displaycode ?>;">
        <form class="form lko" method="post">
            <p class="title">Nhập mã code </p>
            <label>
                <span class="ll">Mã</span>
                <input placeholder="" type="text" class="input" name="code">
            </label>
            <p class="signin">Nhận mã mới qua email</p>
            <button class="submit" type="submit" name="resend">Gửi lại</button>
            <p class="signin">Nhập mật khẩu mới!<button class="submit" type="submit" name="next">Tiếp tục</button></p>
        </form>
        </div>
    ';
    include './Model/send_mail.php';
} elseif (isset($_POST['next'])) {
    if ($_SESSION['code'] == $_POST['code']) {
        $displayemail = 'none';
        $displaypass = 'block';
        echo '
                <div class="dangki" style="display:<?= $displaypass ?>;">
                <form class="form lko" method="post">
                    <p class="title">Quên mật khẩu</p>
                    <label>
                        <span class="ll">Nhập mật khẩu mới</span>
                        <input required="" placeholder="" type="text" class="input" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Ít nhất 8 ký tự, gồm ít nhất một chữ cái và một số" required>
                    </label>
                    <label>
                        <span class="ll">Nhập lại mật khẩu mới</span>
                        <input required="" placeholder="" type="text" class="input" name="re_password">
                    </label>
                    <button class="submit" name="btn-readd">Cập nhật</button>
                </form>
            </div>
        ';
    } else {
        $displayemail = 'none';
        $displaycode = 'block';
        echo '
        <div class="dangki" style="display:<?= $displaycode ?>;">
        <form class="form lko" method="post">
            <p class="title">Nhập mã code </p>
            <div style="color:red;">Mã code chưa đúng</div>
            <label>
                <span class="ll">Mã</span>
                <input placeholder="" type="text" class="input" name="code">
            </label>
            <p class="signin">Nhận mã mới qua email</p>
            <button class="submit" type="submit" name="resend">Gửi lại</button>
            <p class="signin">Nhập mật khẩu mới!<button class="submit" type="submit" name="next">Tiếp tục</button></p>
        </form>
    </div>
        ';

        include './Model/send_mail.php';
    }
} elseif (isset($_POST['btn-readd'])) {
    if ($_POST['password'] == $_POST['re_password']) {
        $email = $_SESSION['email'];
        $password = $_POST['password'] ?? "";
        $db = new signup();
        $reset = $db->addpassword($password, $email);
        header('Location: ./index.php?act=home');
    } else {
        $displaypass = "block";
        $displayemail = "none";
        echo ' 
            <div class="dangki" style="display:<?= $displaypass ?>;">
                <form class="form lko" method="post">
                   <p class="title">Quên mật khẩu</p>
                    <div style="color:red;">Mật khẩu chưa trùng khớp</div>
                    <label>
                        <span class="ll">Nhập mật khẩu mới</span>
                        <input required="" placeholder="" type="text" class="input" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Ít nhất 8 ký tự, gồm ít nhất một chữ cái và một số" required>
                    </label>
                    <label>
                        <span class="ll">Nhập lại mật khẩu mới</span>
                        <input required="" placeholder="" type="text" class="input" name="re_password">
                    </label>
                    <button class="submit" name="btn-readd"  onclick="openPopup()">Xác nhận</button>
                </form>
            </div>
            ';
    }
}

?>

<script>
    function openPopup() {
        // Mở cửa sổ popup
        var popup = window.open('https://www.example.com', 'popupWindow', 'width=600,height=400');
    }
</script>

<div class="dangki " style="display: <?=$displayemail?>;">
    <form class="form lko" method="post">
        <p class="title">Quên mật khẩu</p>
        <div style="display:<?=$not_email?>;color:red;">Email chưa có tài khoản</div>
        <label>
            <span class="ll">Email</span>
            <input required="" placeholder="" type="email" class="input" name="email">
        </label>
        <p class="signin">Nhận mật khẩu mới qua email</p>
        <button class="submit" type="submit" name="send">Gửi</button>
        <p class="signin">Bạn đã nhớ mật khẩu ? <a href="./index.php?act=login">Đăng nhập</a></p>
    </form>
</div>
