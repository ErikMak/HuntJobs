// WEB-SOCKET CONNECTION
let socket = new WebSocket('ws://localhost:8282');
let client = {
    user_id: currentUser.user_id,
    recipient_id: null,
    type: 'socket',
    token: null,
    message: null
};

socket.onopen = function (e) {
    socket.send(JSON.stringify(client));
};

socket.onmessage = function (e) {
    let data = JSON.parse(e.data);

    toastr.info(data['message']);
};