const app = require('express')();
const http = require('http').Server(app);
const io = require('socket.io')(http);

const PORT = process.env.NODE_ENV || 3000;

io.on('connection', (socket) => {
    console.log('a user connected', socket.id);

    socket.on('receive::info', (data) => console.log('RECEIVE INFO', socket.id, data));
});

app.get('/', (req, res) => {
    io.emit('receive::info', [{
        id: 1,
        description: 'Item 01'
    }]);

    res.status(200).json('ENVIADO COM SUCESSO');
});

const httpListen = http.listen(PORT, () => {
    console.log(`listening on *:${PORT}`);
});

module.exports = httpListen;