<!-- acount -->
<?php
$user_id = $_SESSION['id'];
$db = new profile();
$select = $db->getList($user_id);
$name = $select['name_count'];
?>
<div class="feature-photo">
	<form class="form-cover" id="form-cover" enctype="multipart/form-data" method="post">
		<figure>
			<?php
			$select = $db->getList($user_id);
			$cover_img = $select['cover_img'] ??"";
			$_SESSION['cover_img'] = $cover_img;
			
			if($cover_img == ""){
				echo '<img src="./View/images/uploads/cover.jpg" alt="">';
			}else{
				echo '<img src="./View/images/uploads/'.$cover_img.'" alt="">';
			}
			?>
			
		</figure>
		<form class="edit-phto-cover" style="left:80%;">
			<label class="fileContainers" style="left:80%; bottom:50px; font-size: 14px; border-radius: 10px;">
				<i class="fa fa-camera-retro"></i>
				Đổi ảnh bìa
				<input type="file" name="image-cover" id="image-cover" accept=".jpg, .jpeg, .png" onclick="toggleElements()">
			</label>
		</form>
	</form>
	<div class="container-fluid">
		<div class="row merged">
			<div class="col-lg-2 col-sm-3">
				<form class="form-avatar" id="form" enctype="multipart/form-data" method="post">
					<div class="user-avatar">
						<figure>
							<?php
							$select = $db->getImg($user_id);
							$avatar = $select['avatar'] ??"";
							if($avatar == ""){
								echo '<img src="./View/images/uploads/avatar.jpg" alt="">';
								
							}else{
								echo '<img src="./View/images/uploads/'.$select['avatar'].'" alt="">';
							}
							?>
							
							<form class="edit-phto-ava">
								<label class="fileContainer" style=" position: absolute;top:85%;color: #08d5a9;right: 20%;">
									<i class="fa fa-camera-retro" style="font-size: 30px;"></i>
									<input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" onclick="toggleElement()">
								</label>
							</form>
						</figure>
					</div>
				</form>
			</div>
			<div class="col-lg-10 col-sm-9">
				<div class="timeline-info">
					<ul>
						<li class="admin-name">
							<span style="margin-bottom:20px;"><?=$name?></span>
							<h6>( 89 Bạn bè)</h6>
						</li>
						<li>
							<a href="./index.php?act=information" title="" class="button-view" data-ripple=""><i class="fa-solid fa-street-view" style="color: #08d5a9;"></i>Xem Thông tin</a>
						</li>
						<li>
							<a href="./index.php?act=edit" title="" class="button-view" data-ripple=""><i class="fa-solid fa-pen-to-square" style="color: #08d5a9;"></i>Chỉnh sửa</a>
						</li>
						<!-- if(frinedship ko tồn tại ) -->
						<li>
							<a href="#" type="submit" class="button-view"><i class="fa-solid fa-square-check" style="color: #08d5a9;"></i> Kết bạn</a>
						</li>
					</ul>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- //demo -->


<script>
	document.getElementById("image").onchange = function() {
		document.getElementById("form").submit();
	}
	document.getElementById("image-cover").onchange = function() {
		document.getElementById("form-cover").submit();
	}
</script>
<?php
$db = new upload();
$reupimg = $db->loadimg();
$recover = $db->loadcover();
?>