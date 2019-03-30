
 
?>

<div id="grafico2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



<script type="text/javascript">

Highcharts.Color.prototype.parsers.push({
	regex: /^[a-z]+$/,
    parse: function (result) {
    	var rgb = new RGBColor(result[0]);
        if (rgb.ok) {
        	return [rgb.r, rgb.g, rgb.b, 1]; // returns rgba to Highcharts
        }
    }
});

    Highcharts.chart('grafico2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Treinamentos Gerais'
        },
        
        subtitle: {
            text: 'Origem : Planilha de Treinamentos'
        },
        colors: ['red', 'orange', 'green', 'blue'],
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Colaboradores'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
                
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
                
        series: [{
                name: 'Total Treinamento',
                data: [<?php echo $totalTreinamentos;?>, 71, 106]

            }, {
                name: 'Vencidos',
                data: [83, 78, 98]

            }, {
                name: 'Treinados',
                data: [48, 38, 39]

            }, {
                name: 'Em andamento',
                data: [42, 33, 34]

            }]
    });
</script>