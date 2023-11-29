const express = require('express');
const multer = require('multer');
const mysql = require('mysql2/promise');

const app = express();
const PORT = 3000;

const storage = multer.memoryStorage();
const upload = multer({ storage: storage });

// Create a pool for MySQL connections
const pool = mysql.createPool({
    host: 'localhost',
    user: 'your_mysql_username',
    password: 'your_mysql_password',
    database: 'image_uploader',
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
});

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.post('/upload', upload.array('images', 5), async (req, res) => {
    try {
        const imagesData = req.files.map(file => file.buffer.toString('base64'));

        // Insert data into MySQL
        const connection = await pool.getConnection();
        await connection.beginTransaction();

        try {
            // Insert user data
            const [userResult] = await connection.execute('INSERT INTO image (filename) VALUES (?)', [imagesData]);
            const userId = userResult.insertId;

            // Insert image data
            // for (const imageData of imagesData) {
            //     await connection.execute('INSERT INTO posts (user_id, image_data) VALUES (?, ?)', [userId, imageData]);
            // }

            // Commit the transaction
            await connection.commit();

            // Respond to the client
            res.json({ status: 'success', message: 'Data received and processed on the server.' });
        } catch (error) {
            // Rollback the transaction on error
            await connection.rollback();
            throw error;
        } finally {
            // Release the connection back to the pool
            connection.release();
        }
    } catch (error) {
        console.error('Error:', error);
        res.status(500).json({ status: 'error', message: 'Internal Server Error.' });
    }
});

app.listen(PORT, () => {
    console.log(`Server is running at http://localhost:${PORT}`);
});