const preview_wrapper = document.getElementById('product-preview-wrapper');
const preview_clear = document.getElementById('product-preview-clear');

preview_clear.addEventListener('click', e => {
    preview_wrapper.classList.remove('open');
});

preview_wrapper.addEventListener('click', e => {
    if (e.target.classList.contains('product-preview-wrapper')) {
        preview_wrapper.classList.remove('open');
    }
})