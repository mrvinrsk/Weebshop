$(function () {
    const mobileWrapper = document.querySelector('.compare .mobile');
    const plans = ['Starter', 'Profi', 'Unternehmen'];

    document.querySelectorAll('.compare .desktop tr:not(.header)').forEach(el => {
        const benefitCard = document.createElement('div');
        benefitCard.classList.add('benefit-card');
        let caption = document.createElement('h4');
        caption.textContent = el.querySelector('p').textContent;

        console.log('hi');

        benefitCard.appendChild(caption);

        let containContainer = document.createElement('div');
        containContainer.classList.add('contains');

        let index = 0;
        el.querySelectorAll('td:nth-child(n+2)').forEach(td => {
            let contain = document.createElement('div');
            contain.classList.add('contain');

            let plan = document.createElement('p');
            plan.textContent = plans[index++];
            contain.appendChild(plan);

            let c = document.createElement('span');
            c.innerHTML = td.querySelector('span').innerHTML;

            if (td.querySelector('span').classList.contains('icon')) {
                c.classList.add('icon');
            }

            contain.appendChild(c);
            containContainer.appendChild(contain);
        });
        index = 0;

        benefitCard.appendChild(containContainer);
        mobileWrapper.appendChild(benefitCard);
    });
});