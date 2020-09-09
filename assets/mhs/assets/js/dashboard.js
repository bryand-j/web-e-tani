(function($) {
    'use strict'; 
    $(function() {

   




//Sales Chart
    if ($("#chart-ip").length) {
        var salesChartCanvas = $("#chart-ip").get(0).getContext("2d");
       

        var gradient2 = salesChartCanvas.createLinearGradient(0, 0, 0, 330);
        gradient2.addColorStop(0, '#1bbd88');
        gradient2.addColorStop(1, 'rgba(255, 255, 255, 0)');

        var salesChart = new Chart(salesChartCanvas, {
          type: 'line',
          data: {
            labels: ["I", "II", "III", "VI", "V", "VI"],
            datasets: [
              {
                label:'Index Prestasi',
                data: [ <?=$ip;?>],
                backgroundColor: gradient2,
                borderColor: [
                  '#00b67a'
                ],
                borderWidth: 2,
                pointBorderColor: "#00b67a",
                pointBorderWidth: 2,
                pointRadius: 5,
                fill: 'origin',
              }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
              filler: {
                propagate: false
              }
            },
            scales: {
              xAxes: [{
                ticks: {
                  fontColor: "#4c4c4c"
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                scaleLabel: {
                  display: true,
                  labelString: 'Semester'
                }
              }],
              yAxes: [{

                ticks: {
                  fontColor: "#4c4c4c",
                  stepSize: 0.5,
                  min: 0,
                  max: 4.0
                },
                gridLines: {
                  drawBorder: false,
                  color: "rgba(101, 103, 119, 0.21)",
                  zeroLineColor: "rgba(101, 103, 119, 0.21)"
                },
                scaleLabel: {
                  display: true,
                  labelString: 'Index Prestasi'
                }
              }]
            },
            legend: {
              display: false
            },
            tooltips: {
              enabled: true
            },
            // elements: {
            //     line: {
            //         tension: 0
            //     }
            // }
          }
        });
      
    }

     //Sales Chart
    if ($("#chart-absen").length) {
        var salesChartCanvas = $("#chart-absen").get(0).getContext("2d");
        var gradient1 = salesChartCanvas.createLinearGradient(0, 0, 0, 300);
        gradient1.addColorStop(0, '#ff385c');
        gradient1.addColorStop(1, 'rgba(255, 255, 255, 0)');

        var gradient2 = salesChartCanvas.createLinearGradient(0, 0, 0, 330);
        gradient2.addColorStop(0, '#1bbd88');
        gradient2.addColorStop(1, 'rgba(255, 255, 255, 0)');

         var gradient3 = salesChartCanvas.createLinearGradient(0, 0, 0, 330);
        gradient3.addColorStop(0, '#08bdde');
        gradient3.addColorStop(1, 'rgba(255, 255, 255, 0)');



        var salesChart = new Chart(salesChartCanvas, {
          type: 'line',
          data: {
            labels: ["I", "II", "III", "VI", "V", "VI"],
            datasets: [{
                label:"Alpa",
                data: [50, 20, 23, 25, 12, 13],
                backgroundColor: gradient1,
                borderColor: [
                  '#ff385c'
                ],
                borderWidth: 2,
                pointBorderColor: "#ff385c",
                pointBorderWidth: 2,
                pointRadius: 5,
                fill: 'origin',
              },

              {
                label:"Sakit",
                data: [5, 7, 3, 10, 11, 5],
                backgroundColor: gradient2,
                borderColor: [
                  '#1bbd88'
                ],
                borderWidth: 2,
                pointBorderColor: "#1bbd88",
                pointBorderWidth: 2,
                pointRadius: 5,
                fill: 'origin',
              },

              {
                label:"Injin",
                data: [10, 12, 5, 6, 8, 6],
                backgroundColor: gradient3,
                borderColor: [
                  '#08bdde'
                ],
                borderWidth: 2,
                pointBorderColor: "#08bdde",
                pointBorderWidth: 2,
                pointRadius: 5,
                fill: 'origin',
              },
             
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
              filler: {
                propagate: false
              }
            },
            scales: {
              xAxes: [{
                ticks: {
                  fontColor: "#4c4c4c"
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                scaleLabel: {
                  display: true,
                  labelString: 'Semester'
                }
              }],
              yAxes: [{
                ticks: {
                  fontColor: "#4c4c4c",
                  stepSize: 20,
                  min: 0,
                  max: 100
                },
                gridLines: {
                  drawBorder: false,
                  color: "rgba(101, 103, 119, 0.21)",
                  zeroLineColor: "rgba(101, 103, 119, 0.21)"
                },
                
                scaleLabel: {
                  display: true,
                  labelString: 'Alpa (jam)'
                }
              }]
            },
            legend: {
              display: true
            },
            tooltips: {
              enabled: true
            },
            elements: {
                line: {
                    tension: 0
                }
            },
            
          }
        });
      
    }


    });
})(jQuery);



