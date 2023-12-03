const express = require('express');
const webpush = require('web-push');
const bodyParser = require('body-parser');
const path = require('path');

// Create express app.
const app = express();

// Use body parser which we will use to parse request body that sending from client.
app.use(bodyParser.json());

// We will store our client files in ./client directory.
app.use(express.static(path.join(__dirname, "client")))

const publicVapidKey = "BJXcJjiyjsAZJj0TKCoZ9n8swDABwNPmEAWSam7rNwtYkL09gUJidMltTxbKWt8UVwFEwyhwD4Pya0JF7va4ljA";

const privateVapidKey = "Xzu5dDIfQD948n1YyUdzciaUHP0est5zAqI3UfeVO54";

// Setup the public and private VAPID keys to web-push library.
webpush.setVapidDetails("mailto:vominhtam1610sp@gmail.com", publicVapidKey, privateVapidKey);

// Create route for allow client to subscribe to push notification.
app.post('/subscribe', (req, res) => {
    const subscription = req.body;
    res.status(201).json({});
    const payload = JSON.stringify({ title: "Hello World", body: "This is your first push notification" });

    webpush.sendNotification(subscription, payload).catch(console.log);
})

const PORT = 5001;

app.listen(PORT, () => {
    console.log("Server started on port " + PORT);
});