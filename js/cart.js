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


function add_article(id) {
    toast({
        title: 'Zum Korb hinzugefügt',
        message: 'Artikel wurde zum Korb hinzugefügt',
        buttons: [
            {
                text: 'Warenkorb',
                onClick: function () {
                    window.location.href = 'cart.php';
                }
            }
        ],
        autoClose: {
            enabled: true,
            delay: 5000,
        }
    });
}