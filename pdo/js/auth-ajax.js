"use strict";

document.getElementsByTagName('form')[0]
    .addEventListener('submit', function (e){
        e.preventDefault();
        
        fetch('form-auth.php', {
            method: 'post',
            body: new FormData(this)
        })
            .then(response => response.text())
            .then(text => {
                if (text === 'SUCCESS') {
                    window.location.replace('/account.php');
                    // document.getElementById('finalAnswer').innerText = 'Авторизация прошла успешно';
                } else if (text === 'FAIL') {
                    this.reset();
                    document.getElementById('finalAnswer').innerText = 'Неверно введен логин и/или пароль';
                    // document.getElementsByTagName('form')[0].innerHTML = `<p>Произошла ошибка. Попробуйте войти <a href="form-auth.html">еще раз</a></p>`;
                } else {
                    this.reset();
                    document.getElementById('finalAnswer').innerText = 'Произошла ошибка. Попробуйте войти еще раз';
                }
            });
});
