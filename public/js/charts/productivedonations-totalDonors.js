// Blood availability graph
var ctx = document.getElementById('registered-donors').getContext('2d');
console.log(ctx);
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Colombo','Gampaha','Kalutara','Kandy','Rathnapura','Galle','Matara','Hambantota','Jaffna','Kilinochchi','Mannar','Mullaitivu','Vavuniya','Matale','Kurunegala','Puttalam','Anuradhapura','Polonnaruwa','Badulla','Monaragala','Trincomalee','Batticaloa','Ampara'],
        datasets: [{
            label: 'Total number of registered donors',
            data: [500,400,350,330,220,100,405,300,400,500,400,350,330,220,100,405,300,800,500,770,350,330,220,100,405],
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
                '#BF1B16',
                '#BF1B16',
                '#BF1B16'

            ],  
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Blood Donation Analysis(Registered donors) : Category A+',
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
                    labelString: 'Amount donated (pints)',
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
                categoryPercentage: 0.5,
                scaleLabel: {
                    display: true,
                    labelString: 'Districts',
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