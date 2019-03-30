<style>
#grafico5 {
height: 400px;
max-width: 800px;
margin: 0 auto;
}

/* Link the series colors to axis colors */
.highcharts-color-0 {
fill: #7cb5ec;
stroke: #7cb5ec;
}
.highcharts-axis.highcharts-color-0 .highcharts-axis-line {
stroke: #7cb5ec;
}
.highcharts-axis.highcharts-color-0 text {
fill: #7cb5ec;
}
.highcharts-color-1 {
fill: #90ed7d;
stroke: #90ed7d;
}
.highcharts-axis.highcharts-color-1 .highcharts-axis-line {
stroke: #90ed7d;
}
.highcharts-axis.highcharts-color-1 text {
fill: #90ed7d;
}


.highcharts-yaxis .highcharts-axis-line {
stroke-width: 2px;
}

</style>
</head>
<body>
    
    <div id="grafico5"></div>


    <script type="text/javascript">

        Highcharts.chart('grafico5', {

            chart: {
                type: 'column'
            },

            title: {
                text: 'Styling axes and columns'
            },

            yAxis: [{
                    className: 'highcharts-color-0',
                    title: {
                        text: 'Primary axis'
                    }
                }, {
                    className: 'highcharts-color-1',
                    opposite: true,
                    title: {
                        text: 'Secondary axis'
                    }
                }],

            plotOptions: {
                column: {
                    borderRadius: 5
                }
            },

            series: [{
                    data: [1, 3, 2, 4]
                }, {
                    data: [324, 124, 547, 221],
                    yAxis: 1
                }]

        });
    </script>