<div class="col-lg-6">
    <div class="central-meta">
        <div class="editing-info">
            <h5 class="f-title"><i class="ti-info-alt"></i> Thay đổi Thông tin Tài khoản</h5>
            <form method="post">
                <?php
                $user_id = $_SESSION['id'];
                $data = new profile();
                $retart = $data->getList($user_id);
                ?>

                <div class="form-group half">
                    <input type="text" id="input" required="required" name="username" value="<?= $retart['username'] ?? "" ?>" />
                    <label class="control-label" for="input">Tên đăng nhập</label>
                </div>
                <div class="form-group half">
                    <input type="password" required="required" name="password" value="<?= $retart['password'] ?? "" ?>"/>
                    <label class="control-label" for="input">Mật khẩu</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" name="name_acount" value="<?= $retart['name_count'] ?? "" ?>" />
                    <label class="control-label" for="input">Tên tài khoản</label>
                </div>
                <div class="form-group half">
                    <input type="phone" required="required" name="phone_name" value="<?= $retart['phone'] ?? "" ?>" />
                    <label class="control-label" for="input">Số điện thoại.</label>
                </div>
                <div class="form-group">
                    <input type="date" required="required" name="date_time" value="<?= $retart['brithdate'] ?? "" ?>" />
                    <label class="control-label" for="input">Ngày sinh</label>
                </div>
                <div class="form-group half">
                    <input type="text" required="required" name="gander" value="<?= $retart['gander'] ?? "" ?>" />
                    <label class="control-label" for="input">Giới tính</label>
                </div>
                <div class="form-group">
                    <textarea rows="2" id="textarea" required="required" name="address"><?= $retart['address'] ?? "..." ?></textarea>
                    <label class="control-label" for="textarea">Địa chỉ</label>
                </div>
                <div class="submit-btns">
                    <button type="submit" name="exit-btn" class="exit-btn">Thoát</button>
                    <button type="submit" name="edit-btn" class="edit-btn">Thay đổi</button>
                </div>
                <?php
                $db = new update_user();
                $rt = $db->update();
   
?>
            </form>
        </div>
    </div>
</div><!-- centerl meta -->
