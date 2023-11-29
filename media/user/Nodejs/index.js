// server.js
const express = require('express');
const { MongoClient } = require('mongodb');
const WebSocket = require('ws');

const app = express();
const port = 4000;

const mongoDBURL = 'mongodb+srv://minhtam02:PZbGmi1nbqM3VHVR@atlascluster.zmmrco4.mongodb.net/database_web?retryWrites=true&w=majority';
const dbName = 'database_web';
const collectionName = 'database_web';

// WebSocket server
const wss = new WebSocket.Server({ noServer: true });

app.server = app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});

app.server.on('upgrade', (request, socket, head) => {
    wss.handleUpgrade(request, socket, head, (ws) => {
        wss.emit('connection', ws, request);
    });
});

wss.on('connection', (ws) => {
    console.log('WebSocket connection established');

    // Gửi dữ liệu đầu tiên (dữ liệu hiện tại trong MongoDB) cho người dùng mới kết nối
    sendChatData(ws);

    // Lắng nghe tin nhắn từ người dùng và lưu vào MongoDB
    ws.on('message', (message) => {
        saveChatMessage(JSON.parse(message));
        // Gửi lại tin nhắn mới cho tất cả người dùng
        broadcastChatData();
    });
});

async function saveChatMessage(message) {
    const client = new MongoClient(mongoDBURL, { useUnifiedTopology: true });
    try {
        await client.connect();
        const database = client.db(dbName);
        const collection = database.collection(collectionName);
        await collection.insertOne(message);
    } finally {
        await client.close();
    }
}

async function getChatData() {
    const client = new MongoClient(mongoDBURL, { useUnifiedTopology: true });
    try {
        await client.connect();
        const database = client.db(dbName);
        const collection = database.collection(collectionName);
        return await collection.find().toArray();
    } finally {
        await client.close();
    }
}

function sendChatData(ws) {
    getChatData().then(data => {
        ws.send(JSON.stringify(data));
    });
}

function broadcastChatData() {
    wss.clients.forEach(client => {
        if (client.readyState === WebSocket.OPEN) {
            sendChatData(client);
        }
    });
}




