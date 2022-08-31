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