<div id="grafico-diretorias" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">

Highcharts.chart('grafico-diretorias', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'DADOS POR DIRETORIAS'
    },
    colors:[ '#084B8A','#088A29','#8A0808','#B18904'],
    subtitle: {
        text: 'Font: Human Resources'
    },
    xAxis: {
        categories: [
            'Diretoria Oper Ind e Engenharia',
            'Diretoria Adm e Financeira',
            'Gerencia HSECQ',
            'Gerencia  RH e Sustentabilidade',
            'Diretoria Comercio Exterior',
            'Diretoria Comercial'
            
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            dataLabels: {
            enabled: true
            },
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total',
        data: [<?php echo $diretoriaOperacionalTotal?>, <?php echo $diretoriaAdministrativaTotal?>, <?php echo $diretoriaQsecqTotal?>, <?php echo $diretoriaRhTotal?>, <?php echo $diretoriaComercioExterniorTotal?>, <?php echo $diretoriaComercialTotal?>]

    }, {
        name: 'Treinados',
        data: [<?php echo $diretoriaOperacionalTreinados ?>, <?php echo $diretoriaAdministrativaTreinados?>,<?php echo $diretoriaQsecqTreinados?>, <?php echo $diretoriaRhTreinados?>, <?php echo $diretoriaComercioExterniorTreinados?>, <?php echo $diretoriaComercialTreinados?>]

    }, {
        name: 'Vencidos',
        data: [<?php echo $diretoriaOperacionalVencidos;?>,<?php echo $diretoriaAdministrativaVencidos?>, <?php echo $diretoriaQsecqVencidos?>, <?php echo $diretoriaRhVencidos?>, <?php echo $diretoriaComercioExterniorVencidos?>, <?php echo $diretoriaComercialVencidos?>]

    }, {
        name: 'Formar',
        data: [<?php echo $diretoriaOperacionalFormar?>, <?php echo $diretoriaAdministrativaFormar?>, <?php echo $diretoriaQsecqFormar?>, <?php echo $diretoriaRhFormar?>, <?php echo $diretoriaComercioExterniorFormar?>, <?php echo $diretoriaComercialFormar?>]

    }]
});
</script>