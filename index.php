<?php 
    include_once 'php-action/converter.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de medidas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
</head>
<body class="h-full flex flex-col justify-center items-center content-center py-20 bg-red-500">
    <div class="flex flex-col justify-center items-center content-center text-lg border border-black w-90 h-90 p-10 bg-white hover:ring transition">

    
    <h1 class="text-4xl">Conversor de Unidades</h1>
    <form method="get" class="flex flex-col w-full">
            <label for="numQuantidade">Digite a quantidade da medida: </label>
            <input class="border border-slate-700 rounded px-1" value="<?=$conversor->getNumero()?>"
            type="number" id="numQuantidade" name="numQuantidade" step=".01" required>
            <label for="sltDe">De:</label>
            <select class="border border-slate-700 rounded px-1" 
            name="sltDe" id="sltDe" required>
                <?=$conversor->getOptionsDe()?>
            </select>

            <label for="sltPara">Para:</label>
            <select class="border border-slate-700 rounded px-1" 
            name="sltPara" id="sltPara" required>
                <?=$conversor->getOptionsPara()?>
            </select>

        <button class="my-2 py-2 rounded bg-emerald-600 hover:bg-emerald-800 transition-colors ease-in hover:text-white" type="submit" value="c">Converter</button>
    </form>
    <div class="flex flex-col w-full">
        <label for="numResultado">Resultado:</label>
        <input class="border border-slate-700 rounded px-1 bg-gray-300 text-black" 
        type="text" id="numResultado" name="numResultado" value="<?=$conversor->getResultado()?>"readonly>
        <small><?=$conversor->getMensagem()?></small>
    </div>
    </div>
</body>
</html>