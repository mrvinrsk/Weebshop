$(function () {
    document.querySelectorAll('.settings-category').forEach((category) => {
        let loaded = document.querySelector('.settings-wrapper');
        let load = category.dataset?.settingsLoad ?? '404';
        let path = "settingspage/" + load + ".php";

        category.addEventListener('click', () => {
            $.ajax({
                url: path,
                success: function (data) {
                    loaded.innerHTML = data;

                    document.querySelectorAll('.settings-category.active').forEach((active) => {
                        active.classList.remove('active');
                    });
                    loaded.classList.remove('s-nothing');
                    loaded.classList.add('s-' + load);
                    category.classList.add('active');

                    $('.settings-wrapper script').each(function (index, element) {
                        eval(element.innerHTML);
                    });
                },
                error: function () {
                    loaded.innerHTML = "404";

                    document.querySelectorAll('.settings-category.active').forEach((active) => {
                        active.classList.remove('active');
                    });
                    removeClassesStartingWith('.settings-wrapper', 's-');
                    loaded.classList.add('s-nothing');
                    category.classList.add('active');
                }
            });
        });
    });
});
