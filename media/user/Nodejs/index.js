// server.js

const WebSocket = require('ws');
const server = new WebSocket.Server({ port: 3000 });

const clients = new Map(); 
const mysql = require('mysql2');// Dùng để lưu trữ thông tin của các client

server.on('connection', (socket) => {
    console.log('Client connected');
    socket.on('message', (message) => {
        console.log(`Received message: ${message}`);
        const data = JSON.parse(message);

        if (data.type === 'register') {
            // Ghi đăng ký thông tin của client
            clients.set(socket, { userData: data.userData });
            console.log(`${data.userData} registered.`);

                const userid = data.userData;                   
                // const userid = clients.get(socket).userData;
                // Tạo kết nối đến MySQL
                const connection = mysql.createConnection({
                host: 'localhost',
                user: 'root',
                password: '1905',
                database: 'database_web'
                });

                // Kết nối đến MySQL
                connection.connect((err) => {
                if (err) {
                    console.error('Error connecting to MySQL:', err);
                    return;
                }
                console.log('Connected to MySQL');
                });

                // Truy vấn MySQL
                const sqlQuery = "SELECT * FROM users WHERE user_id = ?";
                connection.query(sqlQuery,[userid], (err, results) => {
                if (err) {
                    console.error('Error executing query:', err);
                    return;
                }

                console.log('Query results:', results);

                // Đóng kết nối sau khi hoàn thành
                connection.end();
                });

                



        } else if (data.type === 'message') {
            // Gửi tin nhắn đến một client cụ thể hoặc tất cả
            if (data.target && clients.has(data.target)) {
                const targetSocket = data.target;
                targetSocket.send(JSON.stringify({
                    type: 'message',
                    sender: clients.get(socket).userData,
                    content: data.content,  
                }));
            } else {
                // Gửi đến tất cả các client nếu không có đối tượng mục tiêu
                server.clients.forEach((client) => {
                    if (client !== socket && client.readyState === WebSocket.OPEN) {
                        client.send(JSON.stringify({
                            type: 'message',
                            sender: clients.get(socket).userData,
                            content: data.content,
                        }));
                    }
                });
            }
        }
    });

    socket.on('close', () => {
        console.log('Client disconnected');
        // Xóa thông tin của client khi họ đóng kết nối
        clients.delete(socket);
    });
});