<?php

/**
 * Esta função tem como objetivo dizer se o utilizador
 * está ou não autenticado.
 * 
 * Para validar se o utilizador está ou não autenticado no site,
 * dentro da função, nós retornamos verdadeiro ou falso no seu retorno.
 * 
 * Como sabemos se o utilizador está ou não autenticado?
 * 
 * Caso a chave 'is_authenticated' esteja presente
 * na super global $_SESSION e tenha algum valor lá dentro, então
 * retornamos VERDADEIRO, senão, retornamos FAlSO.
 * 
 * @return bool
 */
function is_authenticated()
{
    if (empty($_SESSION['is_authenticated'])) {
        return false;
    } else {
        return true;
    }
}
