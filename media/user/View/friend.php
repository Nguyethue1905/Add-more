<div class="col-lg-6">
	<div class="central-meta">
		<div class="frnds">
			<ul class="nav nav-tabs">
				<li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Danh sách bạn</a> <span>55</span></li>
				<li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Lời mời kết bạn</a><span>60</span></li>
			</ul>

			<!-- Tab panes -->

			
			<div class="tab-content">
				<div class="tab-pane active fade show " id="frends">
					<ul class="nearby-contct">
						<li>
							<div class="nearly-pepls">
								<figure>
									<a href="time-line.html" title=""><img src="./View/images/resources/friend-avatar9.jpg" alt=""></a>
								</figure>
								<div class="pepl-info">
									<h4><a href="time-line.html" title="">jhon kates</a></h4>
									<span>2 bạn chung</span>
									<a href="#" title="" class="add-butn more-action" data-ripple="">Hủy kêt bạn</a>
									<a href="#" title="" class="add-butn" data-ripple="">Nhắn tin</a>
								</div>
							</div>
						</li>
						<li>
							<div class="nearly-pepls">
								<figure>
									<a href="time-line.html" title=""><img src="./View/images/resources/nearly1.jpg" alt=""></a>
								</figure>
								<div class="pepl-info">
									<h4><a href="time-line.html" title="">sophia Gate</a></h4>
									<span>3 bạn chung</span>
									<a href="#" title="" class="add-butn more-action" data-ripple="">Hủy kêt bạn</a>
									<a href="#" title="" class="add-butn" data-ripple="">Nhắn tin</a>
								</div>
							</div>
						</li>
						<li>
							<div class="nearly-pepls">
								<figure>
									<a href="time-line.html" title=""><img src="./View/images/resources/nearly2.jpg" alt=""></a>
								</figure>
								<div class="pepl-info">
									<h4><a href="time-line.html" title="">sara grey</a></h4>
									<span>work at IBM</span>
									<a href="#" title="" class="add-butn more-action" data-ripple="">Hủy kêt bạn</a>
									<a href="#" title="" class="add-butn" data-ripple="">Nhắn tin</a>
								</div>
							</div>
						</li>
						<li>
							<div class="nearly-pepls">
								<figure>
									<a href="time-line.html" title=""><img src="./View/images/resources/nearly3.jpg" alt=""></a>
								</figure>
								<div class="pepl-info">
									<h4><a href="time-line.html" title="">Sexy cat</a></h4>
									<span>Student</span>
									<a href="#" title="" class="add-butn more-action" data-ripple="">Hủy kêt bạn</a>
									<a href="#" title="" class="add-butn" data-ripple="">Nhắn tin</a>
								</div>
							</div>
						</li>
						<li>
							<div class="nearly-pepls">
								<figure>
									<a href="time-line.html" title=""><img src="./View/images/resources/nearly4.jpg" alt=""></a>
								</figure>
								<div class="pepl-info">
									<h4><a href="time-line.html" title="">Sara grey</a></h4>
									<span>ftv model</span>
									<a href="#" title="" class="add-butn more-action" data-ripple="">Hủy kêt bạn</a>
									<a href="#" title="" class="add-butn" data-ripple="">Nhắn tin</a>
								</div>
							</div>
						</li>
						<li>
							<div class="nearly-pepls">
								<figure>
									<a href="time-line.html" title=""><img src="./View/images/resources/nearly5.jpg" alt=""></a>
								</figure>
								<div class="pepl-info">
									<h4><a href="time-line.html" title="">Amy watson</a></h4>
									<span>Study in university</span>
									<a href="#" title="" class="add-butn more-action" data-ripple="">Hủy kêt bạn</a>
									<a href="#" title="" class="add-butn" data-ripple="">Nhắn tin</a>
								</div>
							</div>
						</li>
						<li>
							<div class="nearly-pepls">
								<figure>
									<a href="time-line.html" title=""><img src="./View/images/resources/nearly6.jpg" alt=""></a>
								</figure>
								<div class="pepl-info">
									<h4><a href="time-line.html" title="">caty lasbo</a></h4>
									<span>work as dancers</span>
									<a href="#" title="" class="add-butn more-action" data-ripple="">Hủy kêt bạn</a>
									<a href="#" title="" class="add-butn" data-ripple="">Nhắn tin</a>
								</div>
							</div>
						</li>
						<li>
							<div class="nearly-pepls">
								<figure>
									<a href="time-line.html" title=""><img src="./View/images/resources/nearly2.jpg" alt=""></a>
								</figure>
								<div class="pepl-info">
									<h4><a href="time-line.html" title="">Ema watson</a></h4>
									<span>personal business</span>
									<a href="#" title="" class="add-butn more-action" data-ripple="">Hủy kêt bạn</a>
									<a href="#" title="" class="add-butn" data-ripple="">Nhắn tin</a>
								</div>
							</div>
						</li>
					</ul>
					<div class="lodmore"><button class="btn-view btn-load-more"></button></div>
				</div>

				<!-- //ádhjas -->
				<div class="tab-pane fade" id="frends-req">
					<ul class="nearby-contct">
					
						<?php
							$user_id_s = $_SESSION['id'];
							$looking_for_friends = new looking_for_friends();
							$getidfol = $looking_for_friends-> getidfol($user_id_s);
							foreach ($getidfol as $all){
								// $user_ids = $_SESSION['id'];
								$friendship_id = $all['id_fs'];
								$_SESSION['friendship_id'] = $friendship_id;

								$following_id = $all['fl_id']; 
								$user_id = $all['idfrend'];
								$status = $all['status'];


								if ($friendship_id && $user_id_s == $following_id && $status == "Đã gữi lời mời "){
									$getalls = $looking_for_friends->getid($user_id);
									foreach ($getalls as $row){
										echo '<li>
										<div class="nearly-pepls">
											<figure>
												<a href="time-line.html" title=""><img src="./View/images/resources/nearly5.jpg" alt=""></a>
											</figure>
											<div class="pepl-info">
												<h4><a href="time-line.html" title="">'.$row['name_count'].'</a></h4>
												<span>ftv model</span>
												
												<a href="#" title="" class="add-butn more-action btnls"   data-idship="'.$friendship_id.'" data-ripple="" >Xóa lời mời</a>
												<form method="post">
												<button type ="submit" name = "btbs"><a href="#" title="" class="add-butn" data-ripple="">Đồng ý</a></button>
												</form>
											</div>
										</div>
									</li>';
									}
								}
							}
						?>
					</ul>
					<button class="btn-view btn-load-more"></button>
				</div>
			</div>
		</div>
	</div>
</div><!-- centerl meta -->

<?php
if(isset($_POST['btbs'])){
	$friendship_id = $_SESSION['friendship_id'];
	$looking_for_friends = new looking_for_friends();
	$getyes = $looking_for_friends->getyes($friendship_id);
	if ($getyes == true) {
		echo 'thành công';
	}
}

?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $(document).on("click", ".btnls", function() {
        var button = $(this);
        var idship = button.data('idship');
		console.log(idship);
        $.ajax({
            url: "/user/ajax.php",
            method: "POST",
            data: {
                action: "delete_fren",
                idship: idship,
            },
            success: function(result) {
                $("#weather-temp").html("<strong>" + result + "</strong> degrees");
                console.log(result);
				if (result == true){
					console.log("Bạn đã xoá thành công");
					button.style("display = none");
				}
            }
        });
    });
});
</script>