<?php
function codificacion($strCodigo) {
    $strResultado = "";
    $intValor = 0;

    $operaciones = [
        '&' => function () use (&$strResultado, &$intValor) {
            $strResultado .= strval($intValor);
        },
        '*' => function () use (&$intValor) {
            $intValor *= $intValor;
        },
        '#' => function () use (&$intValor) {
            $intValor++;
        },
        '@' => function () use (&$intValor) {
            $intValor--;
        },
    ];

    for ($i = 0; $i < strlen($strCodigo); $i++) {
        $strCaracter = $strCodigo[$i];
        if (array_key_exists($strCaracter, $operaciones)) {
            $operaciones[$strCaracter]();
        }
    }

    return $strResultado;
}

$resultado = codificacion('&###@&*&###@@##@##&######@@#####@#@#@#@##@@@@@@@@@@@@@@@*&&@@@@@@@@@####@@@@@@@@@#########&#&##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@&');
echo $resultado;