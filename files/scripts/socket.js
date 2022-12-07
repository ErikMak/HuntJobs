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
    const navbar_item = document.querySelectorAll('.header-item');
    const notification_circle = navbar_item[2].querySelector('.notification-circle');
    const sm_navbar_item = document.querySelectorAll('.sm-navbar-item');
    const sm_notification_circle = sm_navbar_item[2].querySelector('.notification-circle');

    toastr.info(data['message']);
    notification_circle.classList.add('show');
    sm_notification_circle.classList.add('show');
};