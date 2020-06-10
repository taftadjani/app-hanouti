const user_details = document.querySelector('.container>.user-details-container');
const label_avatar_input = document.getElementById("label-avatar-input");

const f_n_content = document.querySelector('.content.first-name');
const f_n_save_btn = f_n_content.querySelector('button.save');
const f_n_cancel_btn = f_n_content.querySelector('button.cancel');
const f_n_update_btn = f_n_content.querySelector('button.update');
const f_n_input = f_n_content.querySelector('.value-container input');

const l_n_content = document.querySelector('.content.last-name');
const l_n_update_btn = l_n_content.querySelector('button.update');
const l_n_save_btn = l_n_content.querySelector('button.save');
const l_n_cancel_btn = l_n_content.querySelector('button.cancel');
const l_n_input = l_n_content.querySelector('.value-container input');

const n_n_content = document.querySelector('.content.nick-name');
const n_n_update_btn = n_n_content.querySelector('button.update');
const n_n_save_btn = n_n_content.querySelector('button.save');
const n_n_cancel_btn = n_n_content.querySelector('button.cancel');
const n_n_input = n_n_content.querySelector('.value-container input');

const email_content = document.querySelector('.content.email');
const email_update_btn = email_content.querySelector('button.update');
const email_save_btn = email_content.querySelector('button.save');
const email_cancel_btn = email_content.querySelector('button.cancel');
const email_input = email_content.querySelector('.value-container input');

const phone_content = document.querySelector('.content.phone');
const phone_update_btn = phone_content.querySelector('button.update');
const phone_save_btn = phone_content.querySelector('button.save');
const phone_cancel_btn = phone_content.querySelector('button.cancel');
const phone_input = phone_content.querySelector('.value-container input');

const birthday_content = document.querySelector('.content.birthday');
const birthday_update_btn = birthday_content.querySelector('button.update');
const birthday_save_btn = birthday_content.querySelector('button.save');
const birthday_cancel_btn = birthday_content.querySelector('button.cancel');
const birthday_input = birthday_content.querySelector('.value-container input');

const cancel_global_btn = document.querySelector('.btn.global.cancel');
const save_global_btn = document.querySelector('.btn.global.save');

const func_update = function(event, content_value, input_tag, form_id) {
    event.preventDefault();
    if (content_value.classList.contains('have-update')) {
        content_value.classList.remove('have-update');
    }
    if (!content_value.classList.contains('have-save')) {
        content_value.classList.add('have-save');
    }
    if (!content_value.classList.contains('have-cancel')) {
        content_value.classList.add('have-cancel');
    }
    input_tag.disabled = false;
    if (!cancel_global_btn.classList.contains('active')) {
        cancel_global_btn.classList.add('active');
    }
    if (!save_global_btn.classList.contains('active')) {
        save_global_btn.classList.add('active');
    }
    // Duplicating the form
    const single_update_form = document.getElementById('single-update').cloneNode(true);
    single_update_form.setAttribute('id', form_id);
    user_details.appendChild(single_update_form);
}

const func_save = function(event, content_value, input_tag, form_id) {
    event.preventDefault();
    // document.getElementById(form_id).submit();
    if (!content_value.classList.contains('have-update')) {
        content_value.classList.add('have-update');
    }
    if (content_value.classList.contains('have-save')) {
        content_value.classList.remove('have-save');
    }
    if (content_value.classList.contains('have-cancel')) {
        content_value.classList.remove('have-cancel');
    }
    input_tag.disabled = true;
}

const func_cancel = function(event, content, input_tag, form_id) {
    const content_value = content.querySelector('.value-container');
    event.preventDefault();
    if (!content_value.classList.contains('have-update')) {
        content_value.classList.add('have-update');
    }
    if (content_value.classList.contains('have-save')) {
        content_value.classList.remove('have-save');
    }
    if (content_value.classList.contains('have-cancel')) {
        content_value.classList.remove('have-cancel');
    }
    input_tag.disabled = true;
    user_details.removeChild(document.getElementById(form_id));
}

// Update listeners
f_n_update_btn.addEventListener('click', (e) => {
    func_update(e, f_n_content.querySelector('.value-container'), f_n_input, 'first-name-form');
});

l_n_update_btn.addEventListener('click', (e) => {
    func_update(e, l_n_content.querySelector('.value-container'), l_n_input, 'last-name-form');
});

n_n_update_btn.addEventListener('click', (e) => {
    func_update(e, n_n_content.querySelector('.value-container'), n_n_input, 'nick-name-form');
});

email_update_btn.addEventListener('click', (e) => {
    func_update(e, email_content.querySelector('.value-container'), email_input, 'email-form');
});

phone_update_btn.addEventListener('click', (e) => {
    func_update(e, phone_content.querySelector('.value-container'), phone_input, 'phone-form');
    selectElement('.content.phone>.value-container select').disabled = false;
});

birthday_update_btn.addEventListener('click', (e) => {
    func_update(e, birthday_content.querySelector('.value-container'), birthday_input, 'birthday-form');
});

// Les save listeners

f_n_save_btn.addEventListener('click', (e) => {
    func_save(e, f_n_content.querySelector('.value-container'), f_n_input, 'first-name-form');
});
l_n_save_btn.addEventListener('click', (e) => {
    func_save(e, l_n_content.querySelector('.value-container'), l_n_input, 'last-name-form');
});
n_n_save_btn.addEventListener('click', (e) => {
    func_save(e, n_n_content.querySelector('.value-container'), n_n_input, 'nick-name-form');
});
email_save_btn.addEventListener('click', (e) => {
    func_save(e, email_content.querySelector('.value-container'), email_input, 'email-form');
});
phone_save_btn.addEventListener('click', (e) => {
    selectElement('.content.phone>.value-container select').disabled = true;
    func_save(e, phone_content.querySelector('.value-container'), phone_input, 'phone-form');
});
birthday_save_btn.addEventListener('click', (e) => {
    func_save(e, birthday_content.querySelector('.value-container'), birthday_input, 'birthday-form');
});

// Cancel listeners

f_n_cancel_btn.addEventListener('click', (e) => {
    func_cancel(e, f_n_content, f_n_input, 'first-name-form');
});
l_n_cancel_btn.addEventListener('click', (e) => {
    func_cancel(e, l_n_content, l_n_input, 'last-name-form');
});
n_n_cancel_btn.addEventListener('click', (e) => {
    func_cancel(e, n_n_content, n_n_input, 'nick-name-form');
});
email_cancel_btn.addEventListener('click', (e) => {
    func_cancel(e, email_content, email_input, 'email-form');
});
phone_cancel_btn.addEventListener('click', (e) => {
    selectElement('.content.phone>.value-container select').disabled = true;
    func_cancel(e, phone_content, phone_input, 'phone-form');
});
birthday_cancel_btn.addEventListener('click', (e) => {
    func_cancel(e, birthday_content, birthday_input, 'birthday-form');
});
console.log(label_avatar_input);

label_avatar_input.addEventListener('click', () => {
    cancel_global_btn.classList.add('active');
    save_global_btn.classList.add('active');
});