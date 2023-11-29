<!-- index.php
	<div id="chat"></div>
    <div id="user-chat"></div>
    <input type="text" id="messageInput" placeholder="Type your message...">
    <input type="text" id="targetInput" placeholder="Enter target username...">
    <button onclick="sendMessage()">Send</button>

    <?php
        // $user_id = $_SESSION['id'];
    ?>

    <script>

        const socket = new WebSocket('ws://localhost:3000');

        socket.addEventListener('open', (event) => {
            console.log('Connected to WebSocket server');
            const userData = <?php ?>;
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
            const userData = <?php ?>;
            // Gửi tin nhắn đến máy chủ
            socket.send(JSON.stringify({ type: 'message', content: message, target }));
            messageInput.value = '';
            targetInput.value = '';
            user_chat.innerHTML += `<br><p><b>${userData}: </b>${message}</p>`;
            
        }
        // socket.on('open', (response) => {
        // console.log('Server response:', response);
        // });
    </script> -->
