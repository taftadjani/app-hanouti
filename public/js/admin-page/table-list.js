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
init();
