<?php 
    include_once 'php-class/conversor.php';
    $conversor = !isset($_GET['sltDe']) ? new Conversor() : new Conversor($_GET['numQuantidade'], $_GET['sltDe'], $_GET['sltPara']);
?>

