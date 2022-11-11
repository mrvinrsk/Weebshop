function search() {
    var search = document.getElementById("search").value;
    if (search === "") return;

    window.location = window.location.origin + "/search/" + search;
}

$(function () {
    document.querySelector('#search').addEventListener('keyup', function (event) {
        // when the user presses enter, search
        if (event.keyCode === 13) {
            search();
        }
    });

    document.querySelector('#search-button').addEventListener('click', function (event) {
        search();
    });
});