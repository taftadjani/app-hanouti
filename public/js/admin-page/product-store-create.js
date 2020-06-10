const detail_add_btn = document.getElementById('detail-add-btn');

let detail_delete_btns = document.querySelectorAll('.detail-content .detail-value .detail-delete-btn');
let titles = document.querySelectorAll('input.detail-input-name');
let values = document.querySelectorAll('input.detail-input-value');

detail_add_btn.addEventListener('click', e => {
    e.preventDefault();

    const details_number = document.getElementById('details_number');
    const details_content = document.getElementById('detail-content-value');

    const div_detail = document.createElement('div');
    div_detail.setAttribute('class', 'detail-content');

    const div_title = document.createElement('div');
    div_title.setAttribute('class', 'detail-title');

    const title_input = document.createElement('input');
    title_input.setAttribute('type', 'text');
    title_input.setAttribute('placeholder', 'Detail name');
    title_input.setAttribute('name', 'detail_name_' + (parseInt(details_number.value) + 1));
    title_input.setAttribute('required', 'required');
    title_input.setAttribute('class', 'detail-input-name');

    const div_value = document.createElement('div');
    div_value.setAttribute('class', 'detail-value');

    const value_input = document.createElement('input');
    value_input.setAttribute('type', 'text');
    value_input.setAttribute('placeholder', 'Detail value');
    value_input.setAttribute('name', 'detail_value_' + (parseInt(details_number.value) + 1));
    value_input.setAttribute('required', 'required');
    value_input.setAttribute('class', 'detail-input-value');

    const value_button = document.createElement('button');
    value_button.setAttribute('class', 'detail-delete-btn');
    const value_button_span = document.createElement('span');
    value_button_span.setAttribute('class', 'material-icons');

    value_button_span.innerHTML = 'delete';

    div_title.appendChild(title_input);
    value_button.appendChild(value_button_span);
    div_value.appendChild(value_input);
    div_value.appendChild(value_button);
    div_detail.appendChild(div_title);
    div_detail.appendChild(div_value);

    details_content.appendChild(div_detail);

    details_number.value = parseInt(details_number.value) + 1;

    value_button.addEventListener('click', e => {
        e.preventDefault();
        e.target.parentNode.parentNode.parentNode.removeChild(e.target.parentNode.parentNode);
        details_number.value = parseInt(details_number.value) - 1;
        resetNames();
    });
});
detail_delete_btns.forEach(btn => {
    btn.addEventListener('click', e => {
        e.preventDefault();
        e.target.parentNode.parentNode.parentNode.removeChild(e.target.parentNode.parentNode);
        details_number.value = parseInt(details_number.value) - 1;
        resetNames();
    });
});
const resetNames = _ => {
    titles = document.querySelectorAll('input.detail-input-name');
    values = document.querySelectorAll('input.detail-input-value');
    titles.forEach((title, index) => {
        title.name = 'detail_name_' + (index + 1);
    });
    values.forEach((value, index) => {
        value.name = 'detail_value_' + (index + 1);
    })
}