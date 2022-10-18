function remove_article(id) {
    if (document.querySelector('.cart-item.cart-' + id) != null) {
        document.querySelector('.cart-item.cart-' + id).remove();
    }

    if (document.querySelectorAll('.card-item').length === 0) {
        console.log();
        document.querySelector('.no-items').classList.remove('hidden');
    }
}

$(function () {
    if (document.querySelector('#cart-section') != null) {
        if (document.querySelector('.cart-item') != null) {
            document.querySelector('.no-items').classList.add('hidden');
        }
    }

    document.querySelector('input#coupon').addEventListener('keyup', function (e) {
        // Enter
        if (e.keyCode === 13) {
            addCoupon(this.value);
        }
    });
})


function add_article(id) {
    untoasted({
        title: 'Zum Korb hinzugefügt',
        content: 'Artikel wurde zum Korb hinzugefügt',
        buttons: [
            {
                text: 'Zum Warenkorb',
                onClick: function () {
                    window.location.href = 'cart.php';
                }
            }
        ],
        autoClose: {
            delay: 5000
        }
    });
}

function addCoupon(code) {
    let success = true;
    let title = "Gutscheincode ungültig";
    let content = "Der eingegebene Gutscheincode ist ungültig oder wurde bereits verwendet.";

    let container = document.querySelector('.coupon') || document.createElement('div');
    container.classList.add('sflex', 'coupon');
    container.innerHTML = "<strong>Gutschein (" + code + ")</strong><p>-0,00€</p>";

    if(document.querySelector('.coupon') == null) {
        document.querySelector('.details').appendChild(container);
    }

    if (success) {
        title = "Gutscheincode erfolgreich";
        content = "Der Gutscheincode wurde erfolgreich hinzugefügt.";
    }

    untoasted({
        title: title,
        content: content,
        autoClose: {
            delay: 5000
        }
    });
}