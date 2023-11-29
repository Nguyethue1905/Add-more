<div class="col-lg-6">
	<div class="central-meta">
		<div class="onoff-options">
			<h5 class="f-title"><i class="ti-settings"></i>Thông tin tài khoản</h5>
			<p>Chỉ bạn mới có thể xem và thay đổi thông tin cá nhân của mình</p>
			<?php
			$user_id = $_SESSION['id'];
			$data = new profile();
			$retart = $data->getList($user_id);
			?>
			<div class="setting">
				<span>Tên Đăng nhập</span>
				<p><?= $retart['username'] ?? "..." ?></p>
			</div>
			<div class="setting">
				<span>Mật khẩu</span>
				<p><?=str_pad("", strlen( $retart['password']), "*") ?></p>
			</div>
			<div class="setting">
				<span>Tên tài khoản</span>
				<p><?= $retart['name_count'] ?? "..." ?></p>
			</div>
			<div class="setting">
				<span>Email</span>
				<p><?= $retart['email'] ?? "..." ?></p>
			</div>
			<div class="setting">
				<span>Phone</span>
				<p><?= $retart['phone'] ?? "..." ?></p>
			</div>
			<div class="setting">
				<span>Giới tính</span>
				<p><?= $retart['gander'] ?? "..." ?></p>
			</div>
			<div class="setting">
				<span>Địa chỉ</span>
				<p><?= $retart['address'] ?? "..." ?></p>
			</div>
			<div class="submit-btns">
				<a href="./index.php?act=edit"><button type="submit" class="edit-btn"><span>Thay đổi</span></button></a>
			</div>
		</div>
	</div>
</div><!-- centerl meta -->