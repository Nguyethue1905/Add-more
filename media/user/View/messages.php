<div class="col-lg-6">
	<div class="central-meta">
		<div class="messages">
			<h5 class="f-title"><i class="fa-solid fa-comment" style="color: #936fff;"></i>Tất cả tin nhắn <span class="more-options"></span></h5>
			<div class="message-box">
				<ul class="peoples">
					<li>
						<figure>
							<img src="./View/images/resources/friend-avatar2.jpg" alt="">
							<span class="status f-online"></span>
						</figure>
						<div class="people-name">
							<span>Molly cyrus</span>
						</div>
					</li>
					<li>

						<figure><img src="./View/images/resources/friend-avatar3.jpg" alt="">
							<span class="status f-away"></span>
						</figure>
						<div class="people-name">
							<span>Andrew</span>
						</div>
					</li>
					<li>

						<figure>
							<img src="./View/images/resources/friend-avatar.jpg" alt="">
							<span class="status f-online"></span>
						</figure>

						<div class="people-name">
							<span>jason bourne</span>
						</div>
					</li>
					<li>

						<figure><img src="./View/images/resources/friend-avatar4.jpg" alt="">
							<span class="status off-online"></span>
						</figure>
						<div class="people-name">
							<span>Sarah Grey</span>
						</div>
					</li>
					<li>

						<figure><img src="./View/images/resources/friend-avatar5.jpg" alt="">
							<span class="status f-online"></span>
						</figure>
						<div class="people-name">
							<span>bill doe</span>
						</div>
					</li>
					<li>

						<figure><img src="./View/images/resources/friend-avatar6.jpg" alt="">
							<span class="status f-away"></span>
						</figure>
						<div class="people-name">
							<span>shen cornery</span>
						</div>
					</li>
					<li>

						<figure><img src="./View/images/resources/friend-avatar7.jpg" alt="">
							<span class="status off-online"></span>
						</figure>
						<div class="people-name">
							<span>kill bill</span>
						</div>
					</li>
					<li>

						<figure><img src="./View/images/resources/friend-avatar8.jpg" alt="">
							<span class="status f-online"></span>
						</figure>
						<div class="people-name">
							<span>jasmin walia</span>
						</div>
					</li>
					<li>

						<figure><img src="./View/images/resources/friend-avatar6.jpg" alt="">
							<span class="status f-online"></span>
						</figure>
						<div class="people-name">
							<span>neclos cage</span>
						</div>
					</li>
				</ul>
				<div class="peoples-mesg-box" >
					<div class="conversation-head">
						<figure><img src="./View/images/resources/friend-avatar.jpg" alt=""></figure>
						<span>jason bourne <i>online</i></span>
					</div>
					<ul class="chatting-area">
						<li class="you">
							<figure><img src="./View/images/resources/userlist-2.jpg" alt=""></figure>
							<div id="user-chat"></div>
						</li>
						<li class="me">
							<figure><img src="./View/images/resources/userlist-1.jpg" alt=""></figure>
							
							<div id="chat"></div>
						</li>
					</ul>
					<div class="message-text-container">

						<input type="text" id="messageInput" placeholder="Type your message...">
    						<input type="text" id="targetInput" placeholder="Enter target username...">
							<button title="send" onclick="sendMessage()"><i class="fa fa-paper-plane"></i></button>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- centerl meta -->

<?php
        $user_id = $_SESSION['id'];
    ?>

    <script>

        const socket = new WebSocket('ws://localhost:3000');

        socket.addEventListener('open', (event) => {
            console.log('Connected to WebSocket server');
            const userData = <?php echo $user_id ?>;
            // Đăng ký thông tin của client
            // const username = prompt('Enter your username:');
            socket.send(JSON.stringify({ type: 'register', userData }));    
        });

        socket.addEventListener('message', (event) => {
            const data = JSON.parse(event.data);
            console.log(data);
            const chatDiv = document.getElementById('chat');
            chatDiv.innerHTML += `<p><b>${data.sender}:</b> ${data.content}</p>`;
            
        });

        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const targetInput = document.getElementById('targetInput');
            const message = messageInput.value;
            const target = targetInput.value;
            const user_chat = document.getElementById('user-chat');
            const userData = <?php echo $user_id ?>;
            // Gửi tin nhắn đến máy chủ
            socket.send(JSON.stringify({ type: 'message', content: message, target }));
            messageInput.value = '';
            targetInput.value = '';
            user_chat.innerHTML += `<br><p><b>${userData}: </b>${message}</p>`;
            
        }
        // socket.on('open', (response) => {
        // console.log('Server response:', response);
        // });
    </script>
	