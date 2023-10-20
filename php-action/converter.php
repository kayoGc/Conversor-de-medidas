<?php 
    include_once 'php-class/conversor.php';
    $conversor = new Conversor;

    isset($_GET['sltDe']) ? $options = $conversor->gerarOptionsMedida($_GET['sltDe'], $_GET['sltPara']) : $options = $conversor->gerarOptionsMedida();

    if (isset($_GET['sltDe'])) {
        $conversor->colocarValores($_GET['numQuantidade'], $_GET['sltDe'], $_GET['sltPara']);
        $numero = $_GET['numQuantidade'];
        $conversor->fazerResultado();
        $resultado = $conversor->getResultado();
        $mensagem = "<small>{$_GET['numQuantidade']} {$_GET['sltDe']} é {$resultado} {$_GET['sltPara']}</small>";
    } else {    
        $resultado = 0;
        $numero = 0;
        $mensagem = '';
    }
?>

