var ctx = document.getElementById('expiry-piechart').getContext('2d');
var x = 1100;
var chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Used', 'Expired'],
        datasets: [{
            data: [3, 2],
            backgroundColor: ['#BF1B16', '#F0817E']
        }]
    },
    options: {
    plugins: {
        legend: {
            display: true,
            position: 'bottom',
        },
        title: {
            display: true,
            text: 'Total Donations : Western Province',
            font: {
                weight: 'bold',
                size: 25,
                color: '#000000',
                family: 'Poppins',
            },
        },
        subtitle: {
            display: true,
            text: x.toString() + ' Donations in total',
            font: {
                weight: 'bold',
                size: 20,
                color: '#949494',
                family: 'Poppins',
            },
        }
    },
    responsive: true,
    maintainAspectRatio: false,
    cutout: 100,
}
});

