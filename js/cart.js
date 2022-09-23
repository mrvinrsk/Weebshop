function remove_article(id) {
    if (document.querySelector('.cart-item.cart-' + id) != null) {
        document.querySelector('.cart-item.cart-' + id).remove();
    }
}

$(function () {
    if (document.querySelector('#cart-section') != null) {
        if (document.querySelector('.cart-item') != null) {
            document.querySelector('.no-items').classList.add('hidden');
        }
    }
})