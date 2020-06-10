window.onload = _ => {
    const storeable_type = document.getElementById('storeable_type');
    const storeable_id = document.getElementById('storeable_id');

    fillOptions();
    storeable_type.onchange = _ => {
        fillOptions();
    };
}
const fillOptions = _ => {
    if (storeable_type.options[storeable_type.options.selectedIndex].getAttribute('data-type') == 'user') {
        let xhr = new XMLHttpRequest();
        let url = 'http://localhost/app-hanouti/public/connected';
        xhr.open('GET', url, true);

        //Send the proper header information along with the request
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            //Call a function when the state changes.
            if (xhr.readyState == 4 && xhr.status == 200) {
                storeable_id.innerHTML = '';
                const response = JSON.parse(xhr.responseText);
                const option = document.createElement('option');
                option.setAttribute('value', response.id);
                option.setAttribute('data-type', "user");
                option.setAttribute('selected', 'selected');
                option.innerHTML = response.first_name + " " + response.last_name;
                storeable_id.appendChild(option);
            }
        }
        xhr.send();
    } else if (storeable_type.options[storeable_type.options.selectedIndex].getAttribute('data-type') == 'company') {
        let xhr = new XMLHttpRequest();
        let url = 'http://localhost/app-hanouti/public/users/companies';
        xhr.open('GET', url, true);

        //Send the proper header information along with the request
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            //Call a function when the state changes.
            if (xhr.readyState == 4 && xhr.status == 200) {
                storeable_id.innerHTML = '';
                JSON.parse(xhr.responseText).forEach((company, index) => {
                    const option = document.createElement('option');
                    option.setAttribute('value', company.id);
                    option.setAttribute('data-type', "company");
                    option.innerHTML = company.name;
                    if (index === 0) {
                        option.setAttribute('selected', 'selected');
                    }
                    storeable_id.appendChild(option);
                });
            }
        }
        xhr.send();
    }
}