

    <!-- <ul id="chatList"></ul>
    <input type="text" id="messageInput" placeholder="Type your message...">
    <button onclick="sendMessage()">Send</button> -->

	<div class="col-lg-6">
						<div class="central-meta">
									<div class="messages">
										<h5 class="f-title"><i class="ti-bell"></i>All Messages <span class="more-options"><i class="fa fa-ellipsis-h"></i></span></h5>
										<div class="message-box">
											<ul class="peoples">
										
													<!-- // $login = new login();
													// $all = $login->getByall();
													// foreach ($all as $alls) {
													// 	echo $tl = '<li>
													// 		<figure><img src="./View/images/resources/userlist-1.jpg" alt="">
													// 			<span class="status f-online"></span>
													// 		</figure>
													// 		<div class="people-name">
													// 			<span>' . $alls['username'] . '</span>
													// 		</div>
													// 	</li>';
													// } -->
													
										
											</ul>
											<div class="peoples-mesg-box">
												<div class="conversation-head">
													<figure><img src="images/resources/friend-avatar.jpg" alt=""></figure>
													<span>jason bourne <i>online</i></span>
												</div>
												<ul class="chatting-area" id="chatList">
													
													
												</ul>
												<div class="message-text-container">
												<input type="text" id="messageInput" placeholder="Type your message...">
    											<button onclick="sendMessage()">Send</button>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>

	<?php
		$user_id = $_SESSION['id'];
		$login = new login();
		$add = $login->getById($user_id);
		$username = $add['username'];
	?>
    <script>
        const socket = new WebSocket('ws://localhost:4000');

        socket.addEventListener('open', (event) => {
            console.log('Connected to WebSocket server');
        });

			socket.addEventListener('message', (event) => {
			const data = JSON.parse(event.data);
			const user_id = <?php echo $user_id ?>; // Assuming this is PHP code to echo the user_id
			const chatList = document.getElementById('chatList');

			let htmlOutput = '';

			data.forEach(item => {
				if (user_id !== item.userData) {
					htmlOutput += `<li class="you">
					<figure><img src="./View/images/resources/userlist-1.jpg" alt=""></figure>
					<p>${item.userData}: ${item.content}</p>
					</li>`;
				}else{
					htmlOutput += `<li class="me">
									<figure><img src=".userlist-1.jpg" alt=""></figure>
									<p>${item.userData}: ${item.content}</p>
									</li>`;
				}
				
			});

			chatList.innerHTML = htmlOutput;	
			// chatList.getElementsByTagName('li');
			// var listItems = chatList.getElementsByTagName('li');
			// if (listItems.length > 0) {
			// // Lấy phần tử cuối cùng
			// var lastItem = listItems[listItems.length - 1];

			// // Bây giờ bạn có thể làm bất cứ điều gì với phần tử cuối cùng
			// console.log(lastItem);
			// lastItem.scrollTop = lastItem.scrollHeight;
			// } else {
			// console.log('Danh sách không có phần tử.');
			// }
			// htmlOutput.focus();

		});
		



        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const message = messageInput.value;
            const userData = '<? echo $username ?>';
			const user_id = <? echo $user_id ?>;   // Thay thế bằng thông tin người dùng đăng nhập

            // Gửi tin nhắn đến server
            socket.send(JSON.stringify({ userData, content: message, user_id}));

            // Xóa nội dung của input sau khi gửi
            messageInput.value = '';
        }
		
    </script>


