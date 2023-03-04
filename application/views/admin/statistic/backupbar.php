  //-------------
    //- BAR CHART -
    //-------------
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
   var barChartData = {
      labels  : [

       <?php foreach ($get_vote as $k):

             ?>
          '<?php echo $k['nama_calon']; ?>',
          <?php endforeach; ?>

      ],
      datasets: [
      
        {
          label               : 'Jumlah Suara',
          backgroundColor     : '#00a65a',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [


       <?php foreach ($get_vote as $k):

             ?>
          '<?php echo $k['jumlah_vote']; ?>',
          <?php endforeach; ?>

          ]
        },
      ]
    }

    var barChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var barChart       = new Chart(barChartCanvas, { 
      type: 'bar',
      data: barChartData,
         options: barChartOptions
    })