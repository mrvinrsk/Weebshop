function loadPlaceholders(path_to_root = "./") {
    let json_ = $.ajax({
        method: "GET",
        url: path_to_root + "placeholders.json",
        success: function (data) {
            let json = JSON.parse(JSON.stringify(data));

            function getRandomFromList(list) {
                return list[Math.floor(Math.random() * list.length)];
            }

            document.querySelectorAll('[data-placeholder]:not([data-placeholder-given])').forEach(element => {
                let text = "";

                switch (element.dataset.placeholder.toLowerCase()) {
                    case "firstname":
                        let fnames = json.names.first_names.male.concat(json.names.first_names.female);
                        text = getRandomFromList(fnames);
                        break;

                    case "female_firstname":
                        let ffnames = json.names.first_names.female;
                        text = getRandomFromList(ffnames);
                        break;

                    case "male_firstname":
                        let mfnames = json.names.first_names.male;
                        text = getRandomFromList(mfnames);
                        break;

                    case "lastname":
                        let lnames = json.names.last_names;
                        text = getRandomFromList(lnames);
                        break;

                    case "name":
                        let names = json.names;
                        let nameList = names.first_names.male.concat(names.first_names.female);

                        let first_name = getRandomFromList(nameList);
                        let last_name = getRandomFromList(names.last_names);
                        text = first_name + " " + last_name;

                        if (first_name === "Thomas" && last_name === "Schulz") {
                            element.classList.add("schulz");
                        }
                        break;

                    case "female_name":
                        let fmnames = json.names;
                        let fnameList = fmnames.first_names.female;

                        let ffirst_name = getRandomFromList(fnameList);
                        let flast_name = getRandomFromList(fmnames.last_names);
                        text = ffirst_name + " " + flast_name;
                        break;

                    case "male_name":
                        let mnames = json.names;
                        let mnameList = mnames.first_names.male;

                        let mfirst_name = getRandomFromList(mnameList);
                        let mlast_name = getRandomFromList(mnames.last_names);
                        text = mfirst_name + " " + mlast_name;
                        break;

                    case "mail":
                        let namesx = json.names;
                        let nameListx = namesx.first_names.male.concat(namesx.first_names.female);
                        let mailps = json.mail_providers;
                        let mailp = getRandomFromList(mailps);

                        let first_namex = getRandomFromList(nameListx).toLowerCase();
                        let last_namex = getRandomFromList(namesx.last_names).toLowerCase();
                        let name = first_namex + "." + last_namex;
                        text = name + "@" + mailp;
                        break;

                    case "phone":
                        let phones = json.phone;
                        text = getRandomFromList(phones);
                        break;

                    default:
                        text = "ERR_NO_PLACEHOLDER_MODE";
                        break;
                }

                element.textContent = text;
                element.dataset.placeholderGiven = true;
            });
        }
    });
}

function getCalenderWeek() {
    let currentDate = new Date();
    let startDate = new Date(currentDate.getFullYear(), 0, 1);
    let days = Math.floor((currentDate - startDate) / (24 * 60 * 60 * 1000));
    return Math.ceil(days / 7);
}

function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function getCurrentWeekdayName(offset = 0) {
    let date = new Date();
    date.setDate(date.getDate() + offset);

    let weekday = [
        "Montag",
        "Dienstag",
        "Mittwoch",
        "Donnerstag",
        "Freitag",
        "Samstag",
        "Sonntag"
    ];

    if (date.getDay() - 1 < 0) return weekday[6];
    if (date.getDay() - 1 > 6) return weekday[0];
    return weekday[date.getDay() - 1];
}

$(function () {
    /* Smooth scrolling */
    // Smooth scroll
    $('a[href^="#"]').on("click", function (e) {
        e.preventDefault();

        var target = this.hash,
            $target = $(target);

        let extra = document.querySelector(target).dataset.offset || 150;
        if (window.innerWidth < 768) {
            extra = document.querySelector(target).dataset.offsetMobile || extra;
        }

        if ($target.offset()) {
            $("html, body")
                .stop()
                .animate(
                    {
                        scrollTop: $target.offset().top - extra
                    },
                    1200,
                    "swing"
                );
        } else {
            untoasted({
                title: 'Nicht verf??gbar',
                content: 'Keine Ahnung wo du hin wolltest, aber ins Nichts kann ich dich nicht schicken, sorry.'
            });
        }
    });
    /* Smooth scrolling end */

    const url = window.location.pathname;
    const noBack = ['index', 'buy-success'];
    let filename = url.split('/').pop();
    filename = filename.substring(0, filename.lastIndexOf('.'));
    if (filename === '') filename = 'index';

    if (!noBack.includes(filename)) {
        const first = document.querySelector('section').querySelector(':first-child');

        const back = document.createElement('a');
        back.onclick = function () {
            history.back();

            setTimeout(() => {
                if (window.location.pathname === url) {
                    window.location.href = 'index.php';
                }
            }, 100);
        }
        back.classList.add('icon-text', 'large', 'fc-primary', 'no-underline', 'hoverable', 'back');
        back.innerHTML = '<span class="icon">chevron_left</span><span>Zur??ck</span>';

        first.parentNode.insertBefore(back, first);
    }

    document.querySelectorAll('.parallax').forEach(parallax => {
        parallax.style.backgroundImage = `url(${parallax.dataset.image})`;
    });

    // Animate these elements
    let els = ['div', 'ul', 'ol', 'li', 'article', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
    /*els.forEach(tag => {
        $('main ' + tag + ':not(.ignore-animation)').waypoint(function () {
            let animate = true;

            // loop through all parents
            $(this.element).parents().each(function () {
                if ($(this).hasClass('ignore-animation')) {
                    animate = false;
                }
            });

            if (animate) {
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
            }
        }, {
            offset: '115%'
        });
    });*/

    let up = document.createElement('div');
    up.classList.add("up");
    up.innerHTML = "<span class='icon'>arrow_upward</span>";
    document.body.appendChild(up);
    up.addEventListener('click', () => {
        $("html, body").animate({scrollTop: 0}, 500);
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
        let up = document.querySelector('.up');
        if (window.scrollY >= 200) {
            nav.classList.add("scrolled");
            up.classList.add("show");
        } else {
            up.classList.remove("show");
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

    document.querySelectorAll('.article').forEach(article => {
        article.addEventListener('mouseenter', () => {
            let container = article.closest('.article-grid');

            if (container !== null) {
                container.querySelectorAll('.article').forEach(atc => {
                    if (atc !== article) {
                        atc.classList.add('not-hovered');
                    }
                });
            }
        });

        article.addEventListener('mouseleave', () => {
            let container = article.closest('.article-grid');

            if (container !== null) {
                container.querySelectorAll('.article').forEach(atc => {
                    if (atc !== article) {
                        atc.classList.remove('not-hovered');
                    }
                });
            }
        });
    });

    document.querySelector('.article-stats-banner').addEventListener('click', () => {
        let id = document.querySelector('.article-stats-banner').dataset.id;
        window.location = `./article/${id}/stats`;
    });
});

function confetti(element = document.querySelector('main')) {
    if (typeof party === 'undefined') {
        console.log("party.js wurde nicht eingebunden!");
        return false;
    }

    if (element === null) {
        console.log("Element konnte nicht gefunden werden!");
        return false;
    }

    let count = element.clientWidth / 20;
    if (count > 60) count = 60;
    if (count < 25) count = 25;

    party.confetti(element, {
        count: count,
        spread: party.variation.range(30, 50),
        color: () =>
            party.random.pick([
                party.Color.fromHex("#e84412"),
                party.Color.fromHex("#ea830f"),
                party.Color.fromHex("#9d9d9d")
            ]),
        speed: party.variation.range(250, 500),
        size: party.variation.skew(1.35, 0.8),
        rotation: () => party.random.randomUnitVector().scale(180),
        shapes: ["square", "rectangle"],
        debug: true
    });
}

function buy(article) {
    $.ajax({
        url: "buy.php",
        type: "GET",
        data: {
            article: article
        },
        success: function (data) {
            $('body').append(data);

            document.querySelector('#buying-popup').addEventListener('click', (e) => {
                e.stopPropagation();
                e.stopImmediatePropagation();
            });

            document.querySelector('#page-darker').addEventListener('click', () => {
                document.querySelector('#page-darker').remove();
            });
        }
    });
}

const Modes = {
    LIGHT: 'light',
    DARK: 'dark'
};

function getMode(m) {
    if (m == null) m = Modes.LIGHT;

    for (let mode in Modes) {
        if (mode.toLowerCase() === m.toLowerCase()) return mode;
    }
    return Modes.LIGHT;
}

function updateMode() {
    let mode = Modes.LIGHT;
    if (localStorage.getItem('mode')) {
        mode = getMode(localStorage.getItem('mode'));
    }

    if (!localStorage.getItem('mode')) localStorage.setItem('mode', mode);

    switch (mode.toLowerCase()) {
        case 'dark':
            document.documentElement.classList.add('dark');
            break;

        case 'light':
            document.documentElement.classList.remove('dark');
            break;

        default:
            break;
    }

    const fl = document.getElementById('footer-logo');

    if (fl) {
        if (getCurrentMode() === 'dark') {
            fl.src = fl.src.replace('mrv.svg', 'mrv-darkmode.svg');
        } else {
            fl.src = fl.src.replace('mrv-darkmode.svg', 'mrv.svg');
        }
    }
}

function getCurrentMode() {
    if (localStorage.getItem('mode')) return localStorage.getItem('mode').toLowerCase();
    return Modes.LIGHT.toLowerCase();
}

$(function () {
    document.querySelectorAll('.icon, .material-symbols-outlined').forEach(icon => {
        icon.ariaHidden = 'true';
    });

    updateMode();

    document.querySelectorAll('.hover-gradient').forEach(hg => {
        hg.addEventListener('mousemove', (e) => {
            let rect = hg.getBoundingClientRect();
            let x = e.clientX - rect.left; //x position within the element.
            let y = e.clientY - rect.top;  //y position within the element.
            console.log("Left? : " + x + " ; Top? : " + y + ".");

            hg.classList.add('hovered');
            hg.style.setProperty('--hovergradient-x', x + 'px');
            hg.style.setProperty('--hovergradient-y', y + 'px');
        });
        hg.addEventListener('mouseleave', () => {
            hg.classList.remove('hovered');
        });
    });

    // document.querySelector('section').innerHTML = '<a class="icon-text large fc-primary no-underline hoverable" onclick="window.history.back();" style="cursor: pointer;"><span class="icon">chevron_left</span><span>Zur??ck</span></a>' + document.querySelector('section').innerHTML;
});

function removeClassesStartingWith(selector, prefix) {
    document.querySelectorAll(selector).forEach(el => {
        const classes = el.className.split(" ").filter(c => !c.startsWith(prefix));
        el.className = classes.join(" ").trim();
    });
}

