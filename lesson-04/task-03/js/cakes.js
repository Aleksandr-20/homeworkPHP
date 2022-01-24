"use strict";

let modal = document.getElementById('myModal');
let openModal = document.querySelectorAll('.personal');
let closeModal = document.getElementsByClassName('close')[0];

closeModal.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}

openModal.forEach(element => {
    element.addEventListener('click', function (event){
        event.preventDefault();
        let idCake = event.target.id;
        console.log(idCake);
        fetch(`cakes-handler.php?id=${idCake}`)
            .then(response => response.text())
            .then(element => {
                modal.style.display = "block";
            });
    });
});