"use strict";

let modal = document.getElementById('myModal');
let openModal = document.querySelectorAll('.personal');

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
            .then(response => response.json())
            .then(element => {
                modal.style.display = "block";
                modal.innerHTML = `
                    <div class="modal-content">
        
                        <div class="modal-header">
                            <span class="close">&times;</span>
                            <h2>${element.name}</h2>
                        </div>
            
                        <div class="info">
                            <p>${element.description}</p>
                            <p>Стоимость: ${element.price} ${element.currency}</p>
                            <div class="img">
                                <img src="/images/${element.main_img}">
                            </div>
                            <div class="buy">
                                <a href="#">Заказать</a>
                            </div>
                        </div>
                    </div>`;
                
                let closeModal = document.getElementsByClassName("close")[0];
                
                closeModal.addEventListener('click', function (event){
                    modal.style.display = "none";
                })
        });
    });
});

/*
<div class="imgs">
    <? foreach ($cake['imgs'] as $img): ?>
    <img src="/images/<?= $img?>">
    <? endforeach; ?>
</div>

<div class="img">
    <img src="images/${element.main_img}">
</div>
*/