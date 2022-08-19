<?php

/**
 * Esta função faz um redirecionamento
 * de acordo com os valores do array associativo
 * passados como parâmetro.
 * 
 * Notem o parâmetro -----> $values = [] em ---> url_redirect($values = []) {....
 * Isto significa que se nenhum valor for passado como parâmetro para
 * esta função, então ele assume um array vazio como valor padrão
 * para esta variável.
 * 
 * @param $values array
 */
function url_redirect($values = []) {
    // A função "http_build_query" converte um array associativo em uma query string
    // Exemplo: 
    // Este array associativo --------> ['route' => 'home']
    // Vai se transformar nesta query string ------> route=home
    
    // Leia mais sobre a função "http_build_query" no site oficial do PHP.
    // https://www.php.net/manual/en/function.http-build-query.php
    $buildQueryString = http_build_query($values);

    // a função "header" modifica o cabeçalho de um pedido/resposta do servidor, ou seja,
    // uma destas modificações é responder com um redirecionamento como mostro no exemplo abaixo.

    // Leia mais sobre a função "header" no site oficial do PHP.
    // https://www.php.net/manual/en/function.header
    header('Location: http://localhost/exemplos/exercicios?' . $buildQueryString);

    /*
     * Se a variável $values tiver um array associativo com o este conteúdo ----> ['route' => 'dashboard']
     * então iremos ser redirecionado para o endereço ---> http://localhost/?route=dashboard
     * 
     * Iremos sempre ser redirecionado, isto só depende do conteúdo passado na nossa variável $values.
     */
    
    // Este "exit" diz para o PHP parar toda a execução do código
    // isto porque não queremos exibir nenhum conteúdo enquanto o redirecionamento é feito.
    exit; 
}