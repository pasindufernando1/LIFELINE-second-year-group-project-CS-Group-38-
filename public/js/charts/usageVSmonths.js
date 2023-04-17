// Usage respect to months graph
var ctx = document.getElementById('usage-months').getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Blood Usage',
            data: [12, 19, 3, 5, 2, 3, 1, 2, 3, 4, 5, 6],
            backgroundColor: [
                '#BF1B16',
                '#BF1B16',
                '#BF1B16',
                '#BF1B16',
                '#BF1B16',
                '#BF1B16',
                '#BF1B16',
                '#BF1B16',
                '#BF1B16',
                '#BF1B16',
                '#BF1B16',
                '#BF1B16'
            ],   
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Blood Usage Analysis : 2021',
            // Align the chart title to the right
            fontSize: 18,
            fontColor: '#000000',
            fontFamily: 'Poppins',
            fontStyle: 'bold',
            // Display the chart horizontally on top left corner
            position: 'top',
        },
        legend: {
            labels: {
                fontColor: '#BCBCBC',
                fontFamily: 'Poppins',
                fontSize: 16,
                fontStyle: 'bold',
                position: 'right',
            }
        },
        scales: {
            yAxes: [{
                // Display the y-axis label
                scaleLabel: {
                    display: true,
                    labelString: 'No. of pints',
                    fontColor: '#BCBCBC',
                    fontFamily: 'Poppins',
                    fontSize: 16,
                    fontStyle: 'bold',
                },
                gridLines: {
                    display: true,
                    color: '#E0E0E0',
                    // Show grid lines dashed
                    borderDash: [5, 5],

                },
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Month of the year',
                    fontColor: '#BCBCBC',
                    fontFamily: 'Poppins',
                    fontSize: 16,
                    fontStyle: 'bold',
                },
                gridLines: {
                display: false
                },
                ticks: {
                    beginAtZero: true,
                    fontColor: '#BCBCBC',
                    fontFamily: 'Poppins',
                    fontsize: 400,
                    maxRotation: 90,
                    minRotation: 0,
                },
                // Make the chart responsive
                responsive: true,
                maintainAspectRatio: false,

            }]

        }


    }
});





