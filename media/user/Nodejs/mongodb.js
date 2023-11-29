const express = require('express');
const { MongoClient } = require('mongodb');
const app = express();
const port = 4000;

const mongoDBURL = 'mongodb+srv://minhtam02:PZbGmi1nbqM3VHVR@atlascluster.zmmrco4.mongodb.net/database_web?retryWrites=true&w=majority';
const dbName = 'database_web';

app.get('/getData', async (req, res) => {
    const client = new MongoClient(mongoDBURL, { useUnifiedTopology: true });

    try {
        await client.connect();

        const database = client.db(dbName);
        const collection = database.collection('database_web');

        const data = await collection.find().toArray();

        res.json(data);
    } finally {
        await client.close();
    }
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
