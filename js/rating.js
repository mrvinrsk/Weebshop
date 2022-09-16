const filled = "bi-star-fill";
const empty = "bi-star";

$(function () {
    document.querySelectorAll('.rating-star').forEach(star => {
        const parent = star.parentElement;
        const rating = parent.dataset.rating;

        star.classList.add(empty);
        console.log("Loaded rating stars");

        star.addEventListener('mouseenter', () => {
            parent.querySelectorAll('.rating-star').forEach(x => {
                x.classList.remove(filled);
                x.classList.add(empty);

                if (x.dataset.rating <= rating) {
                    x.classList.remove(empty);
                    x.classList.add(filled);
                }
            });
        });

        star.addEventListener('mouseleave', () => {

        });
    });
});