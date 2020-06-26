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

document.querySelectorAll('.table-sortable th').forEach(headerCell => {
    headerCell.addEventListener('click', _ => {
        const tableElement = headerCell.parentElement.parentElement.parentElement;
        const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const currentIsAscending = headerCell.classList.contains('th-sort-asc');
        if (headerCell.classList.contains('number')) {
            sortTableByColumn(tableElement, headerIndex, number = true, !currentIsAscending);
        } else {
            sortTableByColumn(tableElement, headerIndex, number = false, !currentIsAscending);
        }
    });
});

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
init();
