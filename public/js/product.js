// Start quantity
const quantity_input = document.querySelector('.quantity.product.info>.value>input');
const quantity_minus = document.querySelector('.quantity.product.info>.value>button.minus');
const quantity_plus = document.querySelector('.quantity.product.info>.value>button.plus');

const add_shopping_cart_form_quantity = document.querySelector('#add_shopping_cart_form> .quantity');
// console.log(quantity_input);

quantity_input.addEventListener('keydown', (e) => {
    if (!(e.key === "0" ||
            e.key === "1" ||
            e.key === "2" ||
            e.key === "3" ||
            e.key === "4" ||
            e.key === "5" ||
            e.key === "6" ||
            e.key === "7" ||
            e.key === "8" ||
            e.key === "9")) {
        e.preventDefault();
    }
});

quantity_minus.addEventListener('click', (e) => {
    if (quantity_input.value > 0) {
        quantity_input.value = parseInt(quantity_input.value) - 1;
        add_shopping_cart_form_quantity.value = quantity_input.value;
    }
    if (quantity_input.value == 0) {
        quantity_minus.classList.add('deactivated');
    }
});

quantity_plus.addEventListener('click', (e) => {
    if (quantity_input.value >= 0) {
        quantity_minus.classList.remove('deactivated');
    }
    quantity_input.value = parseInt(quantity_input.value) + 1;
    add_shopping_cart_form_quantity.value = quantity_input.value;
});

// End quantity

// Start of actions on top

const shopping_cart = document.querySelector('#add_shopping_cart')
const buy_now = document.querySelector('#btn-buy-now');

document.querySelector('body').onload = _ => {

    if (shopping_cart.innerHTML.trim() == '' || shopping_cart.innerHTML == null) {
        shopping_cart.innerHTML = 'add_shopping_cart';
    }
}


shopping_cart.onclick = e => {
    e.preventDefault();
    // console.log(document.querySelector('#add_shopping_cart_form').action);
    add_shopping_cart_form_quantity.value = quantity_input.value;
    const addFormData = new FormData(document.querySelector('#add_shopping_cart_form'));
    const deleteFormData = new FormData(document.querySelector('#delete_shopping_cart_form'));
    console.log(add_shopping_cart_form_quantity.value);


    if (shopping_cart.innerHTML !== 'add_shopping_cart') {
        let xhr = new XMLHttpRequest();
        xhr.onloadend = function() {
            shopping_cart.innerHTML = 'add_shopping_cart';
        }
        xhr.open('POST', document.querySelector('#delete_shopping_cart_form').action, true);
        xhr.send(deleteFormData);
    } else {
        // document.querySelector('#add_shopping_cart_form').submit();
        let xhr = new XMLHttpRequest();
        xhr.onloadend = function() {
            if (this.responseText == "1") {
                shopping_cart.innerHTML = 'shopping_cart';
            }
            console.log(this.responseText);

        }
        xhr.open('POST', document.querySelector('#add_shopping_cart_form').action, true);
        xhr.send(addFormData);
    }

    if (shopping_cart.innerHTML == '' || shopping_cart.innerHTML == null) {
        shopping_cart.innerHTML == add_shopping_cart;
    }
};

buy_now.onclick = e => {
    e.preventDefault();
    add_shopping_cart_form_quantity.value = quantity_input.value;
    const addFormData = new FormData(document.querySelector('#add_shopping_cart_form'));
    let xhr = new XMLHttpRequest();
    xhr.onloadend = function() {
        document.querySelector('#link-buy-now').click();
    }
    xhr.open('POST', document.querySelector('#add_shopping_cart_form').action, true);
    xhr.send(addFormData);
}

// End of actions on top

// Start of add review
const add_stars_btns = document.querySelectorAll('#add-review .add-star-container button');

add_stars_btns.forEach(btn => {
    btn.addEventListener('mouseenter', _ => {
        for (let i = 0; i < 5; i++) {
            add_stars_btns[i].classList.remove('active');
        }
        for (let i = 1; i <= btn.getAttribute('data-value'); i++) {
            if (add_stars_btns[i - 1].getAttribute("data-value") <= i) {
                add_stars_btns[i - 1].classList.add('active');
            }
        }
    });
    btn.addEventListener('mouseleave', _ => {
        for (let i = 0; i < 5; i++) {
            add_stars_btns[i].classList.remove('active');
        }
    });
});
// End of add review