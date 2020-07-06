var io = require('socket.io')(6001),
    request = require('request'),
    Redis = require('ioredis'),
    redis = new Redis();

var selectedChats = {};

io.on('connection', function (socket) {
    request.get({
        url : 'http://127.0.0.1:8000/getRoom',
        headers : {cookie : socket.request.headers.cookie},
        json : true
    }, function (error, response, json) {
        if (json.room) {
            socket.join(json.room, () => {
            });
        }
        if (json.isOrderManager) {
            socket.join('orderManager', () => {
            });
        }
    });

    socket.on('dialogSelected', function (dialogId) {
        selectedChats[socket.id] = dialogId;
        socket.broadcast.to('admin').emit('dialogSelected', dialogId);
    });

    socket.on('sendMessageQuery', function (dialogId) {
        let response = false;
        for(let i in selectedChats) {
            if (selectedChats[i] == dialogId) {
                response = true;
            }
        }
        socket.emit('selectedDialogs', response);
    });

    socket.on('dialogsReload', function () {
        delete selectedChats[socket.id];
    });

    socket.on('disconnect', function () {
        delete selectedChats[socket.id];
    });
});


redis.psubscribe('*', function (error, count) {
//...
});

redis.on('pmessage', function (pattern, channel, data) {
    data = JSON.parse(data);
    data = JSON.parse(data.data.data);
    io.to(data.recipient).emit(data.type, data);
    if (data.recipient !== 'support' && data.recipient !== 'orderManager') {
        io.to('support').emit(data.type, data);
    }
});
