function loadPlaceholders(path_to_root = "./") {
    let json_ = $.ajax({
        method: "GET",
        url: path_to_root + "placeholders.json",
        success: function (data) {
            let json = JSON.parse(JSON.stringify(data));

            function getRandomFromList(list) {
                return list[Math.floor(Math.random() * list.length)];
            }

            document.querySelectorAll('[data-placeholder]').forEach(element => {
                let text = "";

                function getGender(names, name) {
                    if (names.first_names.male.includes(name)) return "male";
                    if (names.first_names.female.includes(name)) return "female";
                    return "ERR_NAME_NOT_FOUND";
                }

                switch (element.dataset.placeholder) {
                    case "name":
                        let names = json.names;
                        let nameList = names.first_names.male.concat(names.first_names.female);

                        let first_name = getRandomFromList(nameList);
                        let last_name = getRandomFromList(names.last_names);
                        text = first_name + " " + last_name;

                        if(first_name === "Thomas" && last_name === "Schulz") {
                            element.classList.add("schulz");
                        }

                        console.log(first_name + " is " + getGender(names, first_name));
                        break;

                    default:
                        text = "ERR_NO_MODE";
                        break;
                }

                element.textContent = text;
            });
        }
    });
}

$(function () {
    /* Smooth scrolling */
    // Smooth scroll
    $('a[href^="#"]').on("click", function (e) {
        e.preventDefault();

        var target = this.hash,
            $target = $(target);

        $("html, body")
            .stop()
            .animate(
                {
                    scrollTop: $target.offset().top - 150
                },
                1200,
                "swing"
            );
    });
    /* Smooth scrolling end */

    document.querySelectorAll('.parallax').forEach(parallax => {
        parallax.style.backgroundImage = `url(${parallax.dataset.image})`;
    });
});