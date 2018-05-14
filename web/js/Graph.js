function Graph(resultTopTen) {
    this.resultTopTen = resultTopTen;
    
    this.initGraph();
}



Graph.prototype.initGraph = function() {
    var self = this;

    var ctx = document.getElementById("myChart");

    var words = [];
    var timesRepeated = [];

    $.each(self.resultTopTen, function( index, value ) {
      words.push(index);
      timesRepeated.push(value);
    }); 

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: words,
            datasets: [{
                label: 'Words Counter',
                data: timesRepeated,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(200, 102, 255, 0.2)',
                    'rgba(153, 142, 16, 0.2)',
                    'rgba(153, 182, 28, 0.2)',
                    'rgba(153, 192, 79, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 50,
                    bottom: 50
                }
            }
        }
    });
}