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
});