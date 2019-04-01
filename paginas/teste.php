<?php
require_once '../core/config.php';

$totalTreinamentos=selectTotalTreinamentosPorStatus($conn,"FORMAÇÃO");

echo "o valor e ".$totalTreinamentos;



