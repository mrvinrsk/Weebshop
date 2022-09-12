$(function () {
    document.querySelectorAll('.slider').forEach(slider => {
        slider.dataset.availableSlides = slider.children.length;
        slider.dataset.sliderStart = 1;
        let index = 0;

        let before = document.createElement('span');
        before.classList.add('slider-previous', 'icon');
        before.textContent = "chevron_left";

        let after = document.createElement('span');
        after.classList.add('slider-next', 'icon');
        after.textContent = "chevron_right";

        slider.appendChild(before);
        slider.appendChild(after);

        before.addEventListener('click', () => {
            slider.dataset.sliderStart = parseInt(slider.dataset.sliderStart + 3);
            if (slider.dataset.sliderStart > slider.dataset.availableSlides) {
                slider.dataset.sliderStart = 1;
            }
        });

        after.addEventListener('click', () => {
            slider.dataset.sliderStart = parseInt(slider.dataset.sliderStart - 3);
            if (slider.dataset.sliderStart < 1) {
                slider.dataset.sliderStart = slider.dataset.availableSlides;
            }
        });

        document.querySelectorAll('.slide').forEach(slide => {
            slide.dataset.slideIndex = ++index;
        });
    });
});
