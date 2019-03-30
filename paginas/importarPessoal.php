<?php
# Gerenciamento de sessao #
include '../funcoes/sessaoValida.php';

# Includes utilizadas no projetos (CLASSES E FUNCOES) #
require_once '../core/config.php';
# Includes utilizadas no projetos (CLASSES E FUNCOES) #

# Estrutura superior da pagina
require_once '../estrutura/estruturaSuperiorPagina.php';
# Estrutura superior da pagina

?>

<!--Adicionar codigo abaixo desta linha-->
<script> function Confirmar()
{
alert("Confirma Upload??");
}
</script>
<center>
    <div style="width:900px; height: 300px; ">
<div class="custom-file-input">
<form method="post" action="recebe_upload.php" enctype="multipart/form-data">
<label>Upload Arquivo:</label>
<input type="file" name="arquivo"  class="btn btn-group-lg"/>
</div>
<div style="margin-left: 490px; margin-top: -40px;">
<input style="margin-top: - 90px;" type="submit" class="btn btn-primary" onclick="Confirmar()" value="Enviar" />
</form>
</div>
</div>
</center>
<!--Adicionar codigo acima desta linha->
<?php
#Estrutura inferior da pagina
require_once '../estrutura/estruturaInferiorPagina.php';
#Estrutura inferior da pagina
?>

