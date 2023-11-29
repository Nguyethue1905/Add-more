
<div class="topbar stick">
	<div class="logo">
		<a title="" href="index.php?act=home"><img src="../user/View/images/runn.png" alt="" class="logo-img"><img src="../user/View/images/name-removebg.png" alt="" class="logo-img1"></a>
	</div>

	<div class="top-area">
		<div class="top-search">
			<form method="post" class="">
				<input type="text" placeholder="Tìm kiếm..." >
				<button data-ripple><i class="ti-search" style="color:#08d5a9"></i></button>
			</form>
		</div>
		<ul class="setting-area">
			<li>
				<a href="./index.php?act=home"><i class="fa-solid fa-house" style="color: #08d5a9;"></i></a>
			</li>
			<li>
				<a href="#" title="Notification" data-ripple="">
					<i class="fa-solid fa-bell" style="color: #08d5a9;"></i><span>9</span>
				</a>
				<div class="dropdowns">
					<span>8 thông báo mới</span>
					<ul class="drops-menu">
						<li>
							<a href="./index.php?act=notifications" title="">
								<img src="./View/images/resources/thumb-1.jpg" alt="">
								<div class="mesg-meta">
									<h6>sarah Loren</h6>
									<span>Hi, how r u dear ...?</span>
									<i>2 phút trước</i>
								</div>
							</a>
							<span class="tag green">Mới</span>
						</li>
						<li>
							<a href="notifications.html" title="">
								<img src="./View/images/resources/thumb-2.jpg" alt="">
								<div class="mesg-meta">
									<h6>Jhon doe</h6>
									<span>Hi, how r u dear ...?</span>
									<i>2 min ago</i>
								</div>
							</a>
						</li>
						<li>
							<a href="notifications.html" title="">
								<img src="./View/images/resources/thumb-3.jpg" alt="">
								<div class="mesg-meta">
									<h6>Andrew</h6>
									<span>Hi, how r u dear ...?</span>
									<i>2 min ago</i>
								</div>
							</a>
						</li>
						<li>
							<a href="notifications.html" title="">
								<img src="./View/images/resources/thumb-4.jpg" alt="">
								<div class="mesg-meta">
									<h6>Tom cruse</h6>
									<span>Hi, how r u dear ...?</span>
									<i>2 min ago</i>
								</div>
							</a>
							<span class="tag">New</span>
						</li>
						<li>
							<a href="notifications.html" title="">
								<img src="./View/images/resources/thumb-5.jpg" alt="">
								<div class="mesg-meta">
									<h6>Amy</h6>
									<span>Hi, how r u dear ...?</span>
									<i>2 min ago</i>
								</div>
							</a>
							<span class="tag">New</span>
						</li>
					</ul>
					<a href="./index.php?act=notifications" title="" class="more-mesg">Xem thêm</a>
				</div>
			</li>
			<li>
				<a href="#" title="Messages" data-ripple=""><i class="fa-solid fa-comment" style="color: #08d5a9;"></i><span>12</span></a>
				<div class="dropdowns">
					<span>5 Tin nhắn mới</span>
					<ul class="drops-menu">
						<li>
							<a href="notifications.html" title="">
								<img src="./View/images/resources/thumb-1.jpg" alt="">
								<div class="mesg-meta">
									<h6>sarah Loren</h6>
									<span>Hi how r u dear ...?</span>
									<i>2 min ago</i>
								</div>
							</a>
							<span class="tag green">New</span>
						</li>
						<li>
							<a href="notifications.html" title="">
								<img src="./View/images/resources/thumb-2.jpg" alt="">
								<div class="mesg-meta">
									<h6>Jhon doe</h6>
									<span>Hi, how r u dear ...?</span>
									<i>2 min ago</i>
								</div>
							</a>
						</li>
						<li>
							<a href="notifications.html" title="">
								<img src="./View/images/resources/thumb-3.jpg" alt="">
								<div class="mesg-meta">
									<h6>Andrew</h6>
									<span>Hi, how r u dear ...?</span>
									<i>2 min ago</i>
								</div>
							</a>
						</li>
						<li>
							<a href="notifications.html" title="">
								<img src="./View/images/resources/thumb-4.jpg" alt="">
								<div class="mesg-meta">
									<h6>Tom cruse</h6>
									<span>Hi, how r u dear ...?</span>
									<i>2 min ago</i>
								</div>
							</a>
						</li>
						<li>
							<a href="notifications.html" title="">
								<img src="./View/images/resources/thumb-5.jpg" alt="">
								<div class="mesg-meta">
									<h6>Amy</h6>
									<span>Hi, how r u dear ...?</span>
									<i>2 min ago</i>
								</div>
							</a>
						</li>
					</ul>
					<a href="./index.php?act=messages" title="" class="more-mesg">Xem thêm</a>
				</div>
			</li>
		</ul>
		<div class="user-img" >
			<?php
			$user_id = $_SESSION['id'];
			$db = new profile();
			$select = $db->getImg($user_id);
			$avatar = $select['avatar'] ??"";
			if($avatar == ""){
				echo '<img src="./View/images/uploads/avatar.jpg" alt="" class="user-avatars">';
				
			}else{
				echo '<img src="./View/images/uploads/'.$select['avatar'].'" alt="" class="user-avatars">';
			}
			?>
			<span class="status f-online"></span>
			<div class="user-setting">
				<a href="./index.php?act=information" title=""><i class="ti-user"></i>Xem thông tin</a>
				<a href="./index.php?act=" title=""><i class="ti-pencil-alt"></i>Chỉnh sửa</a>
				<a href="./index.php?act=login" title=""><i class="ti-target"></i>Chuyển tài khoản</a>
				<a href="./index.php?act=logout" title=""><i class="ti-power-off"></i>Đăng xuất</a>
			</div>
		</div>
	</div>
</div>
