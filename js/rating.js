const filled = "bi-star-fill";
const empty = "bi-star";

$(function () {
    document.querySelectorAll('.rating-star').forEach(star => {
        const parent = star.parentElement;
        const rating = parent.dataset.rating;

        star.classList.add(empty);
        console.log("Loaded rating stars");

        star.addEventListener('mouseover', () => {
            console.log("Mouse over", star, "of", parent);

            parent.querySelectorAll('.rating-star').forEach(x => {
                x.classList.remove(filled);
                x.classList.add(empty);

                // add filled class to all stars before the hovered star and the hovered star
                if (x.dataset.value <= star.dataset.value) {
                    x.classList.remove(empty);
                    x.classList.add(filled);
                }
            });
        });

        star.addEventListener('mouseleave', () => {
            console.log("Mouse leave", star, "of", parent);
        });
    });
});