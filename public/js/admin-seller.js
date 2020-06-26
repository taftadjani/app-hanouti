const main_title = document.querySelector('#main-title span');
const main_content = document.getElementById('main-content');
const add_product_store_link = document.getElementById('add-product-store-link');
const list_product_store_link = document.getElementById('list-product-store-link');
const list_users_link = document.getElementById('list-users-link');


const update_main = function(title, content) {
    main_title.innerHTML = title;
    main_content.innerHTML = content;
}

// Eventlsteners

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
            script.id = 'table-list';
            script.setAttribute('src', 'http://localhost/app-hanouti/public/js/admin-page/table-list.js');
            if ((document.getElementById('table-list') ? true : false)) {
                document.getElementById('table-list').parentElement.removeChild(document.getElementById('table-list'));
                document.getElementsByTagName('body')[0].appendChild(script);
            } else {
                document.getElementsByTagName('body')[0].appendChild(script);
            }
        }
    }
    xhr.send();
});

list_users_link.addEventListener('click', e => {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open('GET', e.target.href, true);
    xhr.onreadystatechange = function() {
        //Call a function when the state changes.
        if (xhr.readyState == 4 && xhr.status == 200) {
            // console.log(this.responseText);
            update_main("List Users", this.responseText);

            const link = document.createElement('link');
            link.setAttribute('rel', 'stylesheet');
            link.setAttribute('href', 'http://localhost/app-hanouti/public/css/admin-page/user-list.css');
            document.getElementsByTagName('head')[0].appendChild(link);

            const script = document.createElement('script');
            script.id = 'table-list';
            script.setAttribute('src', 'http://localhost/app-hanouti/public/js/admin-page/table-list.js');
            if ((document.getElementById('table-list') ? true : false)) {
                document.getElementById('table-list').parentElement.removeChild(document.getElementById('table-list'));
                document.getElementsByTagName('body')[0].appendChild(script);
            } else {
                document.getElementsByTagName('body')[0].appendChild(script);
            }
        }
    }
    xhr.send();
});


// Functions
const sortTableByColumn = (table, column, number = false, asc = true) => {
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll('tr'));
    // Sort each row
    const sortedRows = rows.sort((a, b) => {
        let aColText = a.querySelector(`td:nth-child(${column+1})`).textContent.trim();
        let bColText = b.querySelector(`td:nth-child(${column+1})`).textContent.trim();
        if (number) {
            aColText = parseInt(aColText);
            bColText = parseInt(bColText);
        }

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });
    // Remove all existing tr from table
    while (tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    }
    // Re-add the newly sorted rows
    tBody.append(...sortedRows);
    // Remember how the column is currently sorted
    table.querySelectorAll('th').forEach(th => th.classList.remove('th-sort-asc', 'th-sort-desc'));
    table.querySelector(`th:nth-child(${column +1})`).classList.toggle('th-sort-asc', asc);
    table.querySelector(`th:nth-child(${column +1})`).classList.toggle('th-sort-desc', !asc);
}

// Searchable
const tableData = _ => {
    const searchData = [];
    const tableEl = document.getElementById('data-table');
    Array.from(tableEl.children[1].children).forEach(_bodyRowEl => {
        searchData.push(Array.from(_bodyRowEl.children).map(_cellEl => _cellEl.innerHTML));
    });
    return searchData;
}

const createSearchInputElement = _ => {
    const el = document.createElement('input');
    el.classList.add('search-input');
    el.id = 'search-input';
    return el;
}

const search = (arr, searchTerm) => {
    if (!searchTerm) return arr;
    return arr.filter(_row => {
        return _row.find(_item => _item.toLowerCase().includes(searchTerm.toLowerCase()));
    })
}

const refreshTable = data => {
    const tableBody = document.getElementById('data-table').children[1];
    tableBody.innerHTML = '';
    data.forEach(_row => {
        const curRow = document.createElement('tr');
        _row.forEach(_dataItem => {
            const curCell = document.createElement('td');
            curCell.innerHTML = _dataItem;
            curRow.appendChild(curCell);
        });
        tableBody.appendChild(curRow);
    })
}
const init = _ => {
    document.querySelector('#search-root').appendChild(createSearchInputElement());
    const initTableData = tableData();
    const searchInput = document.getElementById('search-input');
    searchInput.addEventListener('keyup', e => {
        refreshTable(search(initTableData, e.target.value));
    });
}
