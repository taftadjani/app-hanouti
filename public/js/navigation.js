 // Start of Hamburger menu
 //* Select elements
 selectElement('.header-top .hamburger').addEventListener('click', (e) => {
     console.log(e.target.classList);
     e.target.classList.toggle('close');
 });
 // End of Hamburger menu

 //  Start of the search handle
 selectElement('#top-search-link').addEventListener('click', (e) => {
     if (!(selectElement('#top-search-input').value === undefined ||
             selectElement('#top-search-input').value === "")) {
         selectElement('#search-form').submit();
     } else {
         e.target.preventDefault();
     }
 })
 selectElement('#top-search-input').addEventListener('keydown', (e) => {
     if (e.key == 'Enter') {
         if ((selectElement('#top-search-input').value === undefined ||
                 selectElement('#top-search-input').value === "")) {
             e.preventDefault();
         }
     } else {
         console.log(e.key);
     }
 });
 // End of the search handle

 //  Cart quantity add and minus
 const cart_detail_remove_forms = selectElement('.cart-detail-remove-form');
 const cart_detail_remove_btns = selectElement('.cart-detail-remove-btn');
 const products = document.querySelectorAll('.cart-products-container .product');
 const cart_total = document.querySelector('.cart-total-container >.total');

 if (products != null && products != undefined) {
     products.forEach(product => {
         product.querySelector('.quantity-minus').addEventListener('click', (e) => {
             product.querySelector('.quantity-input').value = parseInt(product.querySelector('.quantity-input').value) - 1;
         });
         product.querySelector('.quantity-add').addEventListener('click', (e) => {
             product.querySelector('.quantity-input').value = parseInt(product.querySelector('.quantity-input').value) + 1;
         });

         product.querySelector('.quantity-form-update').addEventListener('submit', (e) => {
             e.preventDefault();
             let xhr = new XMLHttpRequest();
             xhr.open("POST", product.querySelector('.quantity-form-update').action, true);
             xhr.onload = function() {
                 //  Quantity updated
                 //  console.log(this.responseText);
                 quantityUpdateTotal();
             }
             xhr.send(new FormData(product.querySelector('.quantity-form-update')));
         });
     });
 }

 function quantityUpdateTotal() {
     let total = 0;
     products.forEach(product => {
         total += product.querySelector('.price span').innerHTML * product.querySelector('.quantity-input').value;
     });
     cart_total.innerHTML = total;
 }
