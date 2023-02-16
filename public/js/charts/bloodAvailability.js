// chart1.js




window.addEventListener("load", ()=>{
    // create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // specify the request type and URL
    xhr.open('POST', 'http://localhost/reports/bloodAvailReport_Gen', true);


    // specify the function to run when the request is complete
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // parse the JSON-encoded data
                var data = JSON.parse(xhr.responseText);
                console.log(data);
                // process the data
                // ...
            } else {
                console.log('Error: ' + xhr.status);
            }
        }
    };

    // send the request
    xhr.send();
});














// Blood availability graph
var ctx = document.getElementById('blood-availability').getContext('2d');
console.log(ctx);
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Blood Bank 1','Blood Bank 2','Blood Bank 3','Blood Bank 4','Blood Bank 5'],
        datasets: [{
            label: 'Amount available',
            data: [100, 300, 200, 50, 400],
            backgroundColor: [
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
            text: 'Blood availability : Western Province',
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
                categoryPercentage: 0.5,
                scaleLabel: {
                    display: true,
                    labelString: 'Blood banks',
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