firebase.initializeApp({
    messagingSenderId: '261332650361'
});

// браузер поддерживает уведомления
// вообще, эту проверку должна делать библиотека Firebase, но она этого не делает
if ('Notification' in window) {
    var messaging = firebase.messaging();

//моя функция которая отображает кнопки
push();

    messaging.onMessage(function(payload) {
        console.log('Message received. ', payload);

        // регистрируем пустой ServiceWorker каждый раз
        navigator.serviceWorker.register('/firebase-messaging-sw.js');

        // запрашиваем права на показ уведомлений если еще не получили их
        Notification.requestPermission(function(result) {
            if (result === 'granted') {
                navigator.serviceWorker.ready.then(function(registration) {
                    // теперь мы можем показать уведомление
                    payload.notification.data = payload.notification;
                    return registration.showNotification(payload.notification.title, payload.notification);
                }).catch(function(error) {
                    console.log('ServiceWorker registration failed', error);
                });
            }
        });
    });



}

function subscribe() {
    // запрашиваем разрешение на получение уведомлений
    messaging.requestPermission()
        .then(function () {
            // получаем ID устройства
            messaging.getToken()
                .then(function (currentToken) {
                    console.log(currentToken);

                    if (currentToken) {
                        sendTokenToServer(currentToken);
                        push();
                    } else {
                        console.warn('Не удалось получить токен.');
                        setTokenSentToServer(false);
                    }
                })
                .catch(function (err) {
                    console.warn('При получении токена произошла ошибка.', err);
                    setTokenSentToServer(false);
                });
        })
        .catch(function (err) {
            console.warn('Не удалось получить разрешение на показ уведомлений.', err);
        });
}

//Удалить токен из базы и локальной истории
function deleteToken() {
    if (localStorage.getItem('sentFirebaseMessagingToken') !==null ){
       localStorage.removeItem('sentFirebaseMessagingToken');
        var url = '/admin/site/delete'; // адрес скрипта на сервере который сохраняет ID устройства
        $.post(url);
        push();
    }

}
// отправка ID на сервер
function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer(currentToken)) {
        console.log('Отправка токена на сервер...');

        var url = '/admin/site/save'; // адрес скрипта на сервере который сохраняет ID устройства
        $.post(url, {
            push_token: currentToken // токен
        });

        setTokenSentToServer(currentToken);
    } else {
        console.log('Токен уже отправлен на сервер.');
    }
}

// используем localStorage для отметки того,
// что пользователь уже подписался на уведомления
function isTokenSentToServer(currentToken) {
    return localStorage.getItem('sentFirebaseMessagingToken') == currentToken;
}

function setTokenSentToServer(currentToken) {
    window.localStorage.setItem(
        'sentFirebaseMessagingToken',
        currentToken ? currentToken : ''
    );
}

// отобразить кнопки для подписии и отписания
function push() {
    if (localStorage.getItem('sentFirebaseMessagingToken') === null){
        $('#reder').text('').append('<a href="#" onclick="subscribe();"> <i class="far fa-share-square"></i>Подписаться на Push</a>');
    } else {
        $('#reder').html('').append('<a href="#" onclick="deleteToken();"> <i class="far fa-share-square"></i>Отписаться от Push</a>');
    }
}