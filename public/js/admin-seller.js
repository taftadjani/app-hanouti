const main_title = document.querySelector('#main-title span');
const main_content = document.getElementById('main-content');
const add_product_store_link = document.getElementById('add-product-store-link');
const list_product_store_link = document.getElementById('list-product-store-link');


const update_main = function(title, content) {
    main_title.innerHTML = title;
    main_content.innerHTML = content;
}

// Eventlsteners

// Create store
add_product_store_link.addEventListener('click', event => {
    event.preventDefault();

    let xhr = new XMLHttpRequest();
    xhr.open('GET', event.target.href, true);
    xhr.onreadystatechange = function() {
        console.log(event.target.href);
        //Call a function when the state changes.
        if (xhr.readyState == 4 && xhr.status == 200) {
            // console.log(this.responseText);
            update_main("Add a new product store", this.responseText);

            const link = document.createElement('link');
            link.setAttribute('rel', 'stylesheet');
            link.setAttribute('href', 'http://localhost/app-hanouti/public/css/admin-page/product-store-create.css');
            document.getElementsByTagName('head')[0].appendChild(link);

            const script = document.createElement('script');
            script.setAttribute('src', 'http://localhost/app-hanouti/public/js/admin-page/product-store-create.js');
            document.getElementsByTagName('body')[0].appendChild(script);
        }
    }
    xhr.send();
});

list_product_store_link.addEventListener('click', e => {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open('GET', e.target.href, true);
    xhr.onreadystatechange = function() {
        //Call a function when the state changes.
        if (xhr.readyState == 4 && xhr.status == 200) {
            // console.log(this.responseText);
            update_main("List of product store", this.responseText);

            const link = document.createElement('link');
            link.setAttribute('rel', 'stylesheet');
            link.setAttribute('href', 'http://localhost/app-hanouti/public/css/admin-page/product-store-list.css');
            document.getElementsByTagName('head')[0].appendChild(link);

            const script = document.createElement('script');
            script.setAttribute('src', 'http://localhost/app-hanouti/public/js/admin-page/product-store-list.js');
            document.getElementsByTagName('body')[0].appendChild(script);
        }
    }
    xhr.send();
});