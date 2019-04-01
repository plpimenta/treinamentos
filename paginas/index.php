<!--IMPORTA ESTRUTURA SUPERIOR DA PAGINA (HTML,TITLE,HEAD,...)-->
<?php require_once '../estrutura/estruturaSuperiorPagina.php';?>
<!--IMPORTA ESTRUTURA SUPERIOR DA PAGINA (HTML,TITLE,HEAD,...)-->

<!--IMPORTA MENU LATERAL ESQUERDO-->
<?php require_once '../estrutura/menuEsquerdo.php'; ?>
<!--IMPORTA MENU LATERAL ESQUERDO-->

<!--IMPORTA MENU TOP-->
<?php require_once '../estrutura/menuSuperior.php'; ?>
<!--IMPORTA MENU TOP-->

<!--pega dados para alimentar informacoes tais como graficos e dash-->
<?php
    $nr06=selectNr06($conn);
    
    $totalTreinamentosRealizados=selectTotalTreinamentosPorStatus($conn,"A VENCER");
    $totalTreinamentosRealizados=$totalTreinamentosRealizados + $nr06;
    $totalTreinamentosVencidos=selectTotalTreinamentosPorStatus($conn,"VENCIDO");
    $totalTreinamentosFormar=selectTotalTreinamentosPorStatus($conn,"FORMAÇÃO");
    $totalTreinamentos=$totalTreinamentosFormar + $totalTreinamentosVencidos + $totalTreinamentosRealizados;
    
    # Diretoria Adminsitrativa Financeira
    $diretoriaAdministrativaFormar=selectFormarDiretoria($conn,'Diretoria ADM/FINANCEIRA');
    $diretoriaAdministrativaVencidos=selectVencidosDiretoria($conn,'Diretoria ADM/FINANCEIRA');
    $diretoriaAdministrativaTreinados=selectTreinadosDiretoria($conn,'Diretoria ADM/FINANCEIRA');
    $diretoriaAdministrativaTotal= $diretoriaAdministrativaFormar + $diretoriaAdministrativaVencidos + $diretoriaAdministrativaTreinados;
    
    # Diretoria Comercial
    $diretoriaComercialFormar=selectFormarDiretoria($conn,'Diretoria Comercial');
    $diretoriaComercialVencidos=selectVencidosDiretoria($conn,'Diretoria Comercial');
    $diretoriaComercialTreinados=selectTreinadosDiretoria($conn,'Diretoria Comercial');
    $diretoriaComercialTotal= $diretoriaComercialFormar + $diretoriaComercialVencidos + $diretoriaComercialTreinados;
    
    # Diretoria Comercio Exterior
    $diretoriaComercioExterniorFormar=selectFormarDiretoria($conn,'Diretoria Comercio Exterior');
    $diretoriaComercioExterniorVencidos=selectVencidosDiretoria($conn,'Diretoria Comercio Exterior');
    $diretoriaComercioExterniorTreinados=selectTreinadosDiretoria($conn,'Diretoria Comercio Exterior');
    $diretoriaComercioExterniorTotal= $diretoriaComercioExterniorFormar + $diretoriaComercioExterniorVencidos + $diretoriaComercioExterniorTreinados;
    
    # Diretoria HSECQ
    $diretoriaQsecqFormar=selectFormarDiretoria($conn,'Diretoria HSECQ');
    $diretoriaQsecqVencidos=selectVencidosDiretoria($conn,'Diretoria HSECQ');
    $diretoriaQsecqTreinados=selectTreinadosDiretoria($conn,'Diretoria HSECQ');
    $diretoriaQsecqTotal= $diretoriaQsecqFormar + $diretoriaQsecqVencidos + $diretoriaQsecqTreinados;
    
    
    # Diretoria Oper Ind e Engenharia
    $diretoriaOperacionalFormar=selectFormarDiretoria($conn,'Diretoria Oper Ind e Engenharia');
    $diretoriaOperacionalVencidos=selectVencidosDiretoria($conn,'Diretoria Oper Ind e Engenharia');
    $diretoriaOperacionalTreinados=selectTreinadosDiretoria($conn,'Diretoria Oper Ind e Engenharia');
    $diretoriaOperacionalTotal= $diretoriaOperacionalFormar + $diretoriaOperacionalVencidos + $diretoriaOperacionalTreinados;
    
    
    # Diretoria RH e Sustentabilidade
    $diretoriaRhFormar=selectFormarDiretoria($conn,'Diretoria RH e Sustentabilidade');
    $diretoriaRhVencidos=selectVencidosDiretoria($conn,'Diretoria RH e Sustentabilidade');
    $diretoriaRhTreinados=selectTreinadosDiretoria($conn,'Diretoria RH e Sustentabilidade');
    $diretoriaRhTotal= $diretoriaRhFormar + $diretoriaRhVencidos + $diretoriaRhTreinados;
    
?>
<!--pega dados para alimentar informacoes tais como graficos e dash-->


<!-- page content -->
<div class="right_col" role="main">
<!-- top tiles -->
  <div class="row top_tiles">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align: center;color: #BDBDBD;">
          <div class="tile-stats" style="background-color: #084B8A;">
          <div class="icon"></div>
          <div class="count"><?php echo $totalTreinamentos ?></div>
          <h3>Total</h3>
          <p></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align: center;color: #BDBDBD;">
        <div class="tile-stats" style="background-color: #088A29;">
          <div class="icon"></div>
          <div class="count"><?php echo $totalTreinamentosRealizados; ?></div>
          <h3>Treinados</h3>
          <p></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12"style="text-align: center;color: #BDBDBD;">
        <div class="tile-stats"  style="background-color: #8A0808;">
          <div class="icon"></div>
          <div class="count"><?php echo $totalTreinamentosVencidos;?></div>
          <h3>Vencidos</h3>
          <p></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align: center;color: #BDBDBD;">
        <div class="tile-stats" style="background-color: #B18904;">
          <div class="icon"></div>
          <div class="count"><?php echo $totalTreinamentosFormar?></div>
          <h3>Formar</h3>
          <p></p>
        </div>
      </div>
    </div>
  <!-- /top tiles -->
  <div class="clearfix"></div>

  <hr>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <?php require_once '../graficos/grafico1.php'; ?>
      </div>
    </div>
  <!-- /top tiles -->
  <div class="clearfix"></div>
    
  <hr>
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <?php require_once '../graficos/grafico2.php'; ?>
      </div>
    </div>
 
<!--ESTRUTURA INFERIOR SCRIPTS E INCLUDES-->
<?php require_once '../estrutura/estruturaInferiorPagina.php'; ?>
<!--ESTRUTURA INFERIOR SCRIPTS E INCLUDES-->