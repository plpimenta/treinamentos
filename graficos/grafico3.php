<div id="grafico3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



<script type="text/javascript">

    Highcharts.chart('grafico3', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Column chart with negative values'
        },
        xAxis: {
            categories: ['Apples', 'Oranges']
        },
        credits: {
            enabled: false
        },
        series: [{
                name: 'John',
                data: [5, 3, 4, 7, 2]
            }, {
                name: 'Jane',
                data: [2, -2, -3, 2, 1]
            }, {
                name: 'Joe',
                data: [3, 4, 4, -2, 5]
            }]
    });
</script>