<div class="container">
  <h5>Welcome Admin Marketplace</h5>
  <p class="lead">Through this panel, you can manage product categories and transactions that occur in the marketplace.</p>
  <div id="grafik-member-distrik">
    <!-- Pie chart will be rendered here -->
  </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    Highcharts.chart('grafik-member-distrik', {
        chart: {
            type: 'pie',
            backgroundColor: '#f9f3f8'  // Soft pink background for pie chart
        },
        title: {
            text: 'Members by District',
            style: {
                color: '#ec407a' /* Soft pink */
            }
        },
        tooltip: {
            valueSuffix: ' people'
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: [{
                    enabled: true,
                    distance: 20
                }, {
                    enabled: true,
                    distance: -40,
                    format: '{point.percentage:.1f}%',
                    style: {
                        fontSize: '1.2em',
                        textOutline: 'none',
                        opacity: 0.7
                    },
                    filter: {
                        operator: '>',
                        property: 'percentage',
                        value: 10
                    }
                }]
            }
        },
        series: [{
            name: 'Number of Members',
            colorByPoint: true,
            data: [
                <?php foreach ($jumlah_member_distrik as $key => $value): ?>
                {
                    name: '<?php echo $value["nama_distrik_member"] ?>',
                    y:<?php echo $value["jumlah"] ?>
                },
                <?php endforeach ?>
            ]
        }],
        colors: ['#f06292', '#f48fb1', '#f8bbd0', '#f1f8e9', '#c8e6c9']  // Soft pastel colors for pie chart slices
    });
</script>