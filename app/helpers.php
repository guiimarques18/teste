<?php

function layout()
{
    return \Request::is('admin/*') ? 'layouts.admin' : 'layouts.app';
}

function isAdmin()
{
    return \Request::is('admin/*') ? true : false;
}

function encodeBase64($texto)
{
    return  isset($texto) ? base64_encode($texto) : null;
}

function decodeBase64($texto)
{
    return  isset($texto) ? base64_decode($texto) : null;
}

/**
 * Funcao que verifica se o CPF fornecido
 */
function validar_cpf($CPF)
{

    $cpf = RemoveNaoNumerico($CPF);

    $arr = array("00000000000", "11111111111", "22222222222", "33333333333", "44444444444", "55555555555", "66666666666", "77777777777", "88888888888", "99999999999");

    if (!is_numeric($cpf) || strlen($cpf) != 11)
        return false;
    else if (!in_array($cpf, $arr)) {
        $numero[] = intval(substr($cpf, 0, 1));
        $numero[] = intval(substr($cpf, 1, 1));
        $numero[] = intval(substr($cpf, 2, 1));
        $numero[] = intval(substr($cpf, 3, 1));
        $numero[] = intval(substr($cpf, 4, 1));
        $numero[] = intval(substr($cpf, 5, 1));
        $numero[] = intval(substr($cpf, 6, 1));
        $numero[] = intval(substr($cpf, 7, 1));
        $numero[] = intval(substr($cpf, 8, 1));
        $numero[] = intval(substr($cpf, 9, 1));
        $numero[] = intval(substr($cpf, 10, 1));

        $soma1 = (10 * $numero[0] + 9 * $numero[1] + 8 * $numero[2] + 7 * $numero[3] + 6 * $numero[4] + 5 * $numero[5] + 4 * $numero[6] + 3 * $numero[7] + 2 * $numero[8]);
        $resto1 = $soma1 - (11 * (intval($soma1 / 11)));

        if ($resto1 < 2)
            $dv1 = 0;
        else
            $dv1 = (11 - $resto1);

        if ($dv1 != $numero[9])
            return false;
        else {
            $soma2 = (11 * $numero[0] + 10 * $numero[1] + 9 * $numero[2] + 8 * $numero[3] + 7 * $numero[4] + 6 * $numero[5] + 5 * $numero[6] + 4 * $numero[7] + 3 * $numero[8] + 2 * $dv1);
            $resto2 = $soma2 - (11 * (intval($soma2 / 11)));

            if ($resto2 < 2)
                $dv2 = 0;
            else
                $dv2 = (11 - $resto2);


            if ($dv2 != $numero[10])
                return false;
            else
                return true;
        }
    }
}

/**
 * Funcao que remove todo caracter nao numerico
 */
function RemoveNaoNumerico($str)
{
    $str = preg_replace('(\D)', '', $str);
    return $str;
}

