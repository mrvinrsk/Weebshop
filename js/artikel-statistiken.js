$(function() {
    const sales30 = document.getElementById('sales30').getContext('2d');
    const sales30Chart = new Chart(sales30, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Verkäufe',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    '#d94c21'
                ],
                borderColor: [
                    '#d94c21'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});