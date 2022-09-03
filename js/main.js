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

                        if (first_name === "Thomas" && last_name === "Schulz") {
                            element.classList.add("schulz");
                        }

                        console.log(first_name + " is " + getGender(names, first_name));
                        break;

                    default:
                        text = "ERR_NO_PLACEHOLDER_MODE";
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

    // Animate these elements
    let els = ['div', 'ul', 'ol', 'li', 'article', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
    els.forEach(tag => {
        $('main ' + tag + ':not(.ignore-animation)').waypoint(function () {
            let animation = anime({
                targets: this.element,
                keyframes: [
                    {translateY: 35, opacity: 0},
                    {translateY: 0, opacity: 1}
                ],
                duration: 925,
                easing: 'easeOutElastic(2, .8)'
            });

            // animate only on first enter of viewport
            this.destroy();
        }, {
            offset: '115%'
        });
    });
});


/* Navbar */
$(function () {
    const nav = document.querySelector("nav");

    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <=
            (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    window.addEventListener("scroll", () => {
        if (window.scrollY >= 200) {
            nav.classList.add("scrolled");
        }

        /* Active link */
        document.querySelectorAll("nav ul li a").forEach((link) => {
            if ($(link).attr("href").startsWith("#")) {
                const id = $(link).attr("href").replace("#", "");

                if (id !== "header") {
                    const anchor = document.getElementById(id);

                    if (anchor != null) {
                        if (isInViewport(anchor)) {
                            link.classList.add("active");
                        } else {
                            link.classList.remove("active");
                        }
                    }
                }
            }
        });
    });

    /* Hamburger & Mobile Navigation */
    document.querySelector("#hamburger").addEventListener("click", () => {
        document.querySelector("#mobile-nav").classList.add("open");
    });

    document
        .querySelector("#mobile-data-toggle")
        .addEventListener("click", () => {
            document.querySelector("#mobile-data").classList.add("open");
        });

    let mobileNavLinks = document.querySelector("#mobile-nav ul");
    let mobileDataLinks = document.querySelector(
        "#mobile-data #mobile-data-links"
    );

    document.querySelectorAll("nav #links li").forEach((li) => {
        if (li.id == null || li.id === "undefined" || li.id !== "logo-li" && li.id !== "hamburger") {
            mobileNavLinks.innerHTML += li.outerHTML;
        }
    });

    document.querySelectorAll("nav #header-banner div a").forEach((a) => {
        if (a.querySelector("svg") == null) {
            // Don't add svg icons
            mobileDataLinks.innerHTML += a.outerHTML;
        }
    });

    ["#mobile-close", "#mobile-nav a"].forEach((selector) => {
        document.querySelectorAll(selector).forEach((el) => {
            el.addEventListener("click", () => {
                document.querySelector("#mobile-nav").classList.remove("open");
            });
        });
    });

    ["#mobile-data-close", "#mobile-data a"].forEach((selector) => {
        document.querySelectorAll(selector).forEach((el2) => {
            el2.addEventListener("click", () => {
                document.querySelector("#mobile-data").classList.remove("open");
            });
        });
    });
});