let min = 100;
let max = 10000

$(function () {
    const sales30 = document.getElementById('sales30').getContext('2d');
    const sales30Chart = new Chart(sales30, {
        type: 'line',
        data: {
            labels: ['KW ' + (getCalenderWeek() - 2), 'KW ' + (getCalenderWeek() - 2), 'KW ' + (getCalenderWeek() - 1), 'KW ' + getCalenderWeek()],
            datasets: [{
                label: 'Verkäufe',
                data: [randomInt(min, max), randomInt(min, max), randomInt(min, max), randomInt(min, max)],
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
            },
            pointHoverRadius: 5,
            borderWidth: 2,
            tension: .3,
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    padding: 20
                }
            }
        }
    });

    const salesWeek = document.getElementById('salesWeek').getContext('2d');
    const salesWeekChart = new Chart(salesWeek, {
        type: 'line',
        data: {
            labels: [getCurrentWeekdayName(-6), getCurrentWeekdayName(-5), getCurrentWeekdayName(-4), getCurrentWeekdayName(-3), getCurrentWeekdayName(-2), getCurrentWeekdayName(-1), getCurrentWeekdayName()],
            datasets: [{
                label: 'Verkäufe',
                data: [randomInt(min, max), randomInt(min, max), randomInt(min, max), randomInt(min, max), randomInt(min, max), randomInt(min, max), randomInt(min, max)],
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
            },
            pointHoverRadius: 5,
            borderWidth: 2,
            tension: .3,
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    padding: 20
                }
            }
        }
    });
});