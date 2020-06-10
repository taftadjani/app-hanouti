//  Start of the subscribe handle
selectElement('#subscribe-link').addEventListener('click', (e) => {
    if (!(selectElement('#subscribe-input').value === undefined ||
            selectElement('#subscribe-input').value === "")) {
        selectElement('#subscribe-form').submit();
    } else {
        e.target.preventDefault();
    }
})
selectElement('#subscribe-input').addEventListener('keydown', (e) => {
    if (e.key == 'Enter') {
        if ((selectElement('#subscribe-input').value === undefined ||
                selectElement('#subscribe-input').value === "")) {
            e.preventDefault();
        }
    } else {
        console.log(e.key);
    }
});