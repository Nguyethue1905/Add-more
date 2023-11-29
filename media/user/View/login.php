<div class="login_forms">
  <div class="ols">
    <div class="content" class="imj">
    <a title="" href="index.php?act=home" style=""><img src="../user/View/images/runn.png" alt="" class=""><img src="../user/View/images/name-removebg.png" alt="" style=" max-width: 50%;"></a>
      <form class="content__form" method="POST">
        <?php
        $singin = new singin();
        $sin = $singin->sigin();
        ?>
        <div class="content__inputs">
          <label>
            <input required="" name="username" type="text" class="il">
            <span>Tên đăng nhập</span>
          </label>
          <label>
            <input required="" name="password" type="password" class="il">
            <span>Mật khẩu</span>
          </label>
        </div>
        <button type="submit" name="btn">Đăng nhập</button>
      </form>
      <div class="content__or-text">
        <span></span>
        <span>OR</span>
        <span></span>
      </div>
      <div class="content__forgot-buttons">
        <a href="./index.php?act=register">Đăng ký</a>
        <a href="./index.php?act=forgot_password">Quên mật khẩu</a>
      </div>
    </div>
  </div>


</div>