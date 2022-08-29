$(function () {
    $('.grid-item').waypoint(function () {
        let animation = anime({
            targets: this.element,
            translateY: 0,
            opacity: 1
        });
    }, {
        offset: '100%'
    });
});