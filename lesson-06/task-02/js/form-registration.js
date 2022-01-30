"use strict";

document.getElementsByTagName('form')[0]
    .addEventListener('submit', function (event){
        event.preventDefault();
        
        fetch('form-handler.php', {
            method: 'post',
            body: new FormData(this)
        })
            .then(response => response.text())
            .then(text => {
                let message =  document.getElementById("message");
                message.innerText = text;
                // console.log(text);
                setTimeout(() => {message.innerText = "";}, 3000);
            });
        this.reset();
});