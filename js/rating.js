let unselectedClasses = ['bi-hand-thumbs-up', 'bi-hand-thumbs-down'];
let selectedClasses = ['bi-hand-thumbs-up-fill', 'bi-hand-thumbs-down-fill'];

$(function () {
    document.querySelectorAll('.thumb').forEach(thumb => {
        let parent = thumb.parentElement;

        thumb.addEventListener('click', function () {
            parent.querySelectorAll('.thumb').forEach(parThum => {
                selectedClasses.forEach(selectedClass => {
                    if (parThum.classList.contains(selectedClass)) {
                        parThum.classList.remove(selectedClass);
                    }

                    if(parThum.classList.contains('thumb-up')) {
                        parThum.classList.add(unselectedClasses[0]);
                    } else {
                        parThum.classList.add(unselectedClasses[1]);
                    }

                    parThum.classList.remove('selected');
                });
            });

            if(thumb.classList.contains('thumb-up')) {
                thumb.classList.remove(unselectedClasses[0]);
                thumb.classList.add(selectedClasses[0]);
            }else {
                thumb.classList.remove(unselectedClasses[1]);
                thumb.classList.add(selectedClasses[1]);
            }

            thumb.classList.add('selected');
        });
    });
});