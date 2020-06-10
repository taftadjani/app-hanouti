// Start quantity

const quantity_minuss = document.querySelectorAll('.cart-detail .details-container .right  button.minus.btn');
const quantity_pluss = document.querySelectorAll('.cart-detail .details-container .right  button.plus.btn');

quantity_minuss.forEach(minus => {

    const input = minus.parentNode.querySelector('input.quantity');
    if (input.value <= 0) {
        minus.classList.add('deactivated');
    }

    minus.addEventListener('click', (e) => {
        console.log(e.target);
        console.log(minus);

        if (input.value > 0) {
            input.value = parseInt(input.value) - 1;
        }
        if (input.value <= 0) {
            minus.classList.add('deactivated');
        }
    });

});


quantity_pluss.forEach(plus => {

    const input = plus.parentNode.querySelector('input.quantity');
    if (input.value > 0) {
        plus.parentNode.querySelector('button.btn.minus').classList.remove('deactivated');
    }
    plus.addEventListener('click', (e) => {
        input.value = parseInt(input.value) + 1;
        if (input.value > 0) {
            console.log("ok");

            plus.parentNode.querySelector('button.btn.minus').classList.remove('deactivated');
        }
    });

});
// quantity_input.addEventListener('keydown', (e) => {
//     if (!(e.key === "0" ||
//             e.key === "1" ||
//             e.key === "2" ||
//             e.key === "3" ||
//             e.key === "4" ||
//             e.key === "5" ||
//             e.key === "6" ||
//             e.key === "7" ||
//             e.key === "8" ||
//             e.key === "9")) {
//         e.preventDefault();
//     }
// });


// End quantity