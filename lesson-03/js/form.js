"use strict";

document.getElementsByTagName('form')[0]
    .addEventListener('submit', function (event){
        event.preventDefault();
        
        fetch('form.php', {
            method: 'post',
            body: new FormData(this)
        })
            .then(response => response.text())
            .then(text => console.log(text));
});