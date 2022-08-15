<?php

/**
 * Esta função exibe uma mensagem temporária, ou seja, se eu pedir 
 * para exibir uma mensagem temporária e a página for refrescada (reload) logo em seguida,
 * então esta mensagem irá desaparecer.
 * 
 * Notem o parâmetro -----> ($message = '') em ---> function flash_message($message = '') {....
 * isto significa que se eu não passar um valor como argumento para esta função, então uma string 
 * vazia será assumida como valor padrão dentro da variável $message.
 * para esta variável.
 * 
 * @param $message string
 * @return void
 */
function set_flash_message($message = '') {
  // Iremos usar a super global $_SESSION para fazer este "truque"
  // Vamos gravar a nossa mensagem dentro da chave 'flash_message' 
  // na super global $_SESSION
  $_SESSION['flash_message'] = $message;

  // A função "strtotime" retorna um conjunto de números que chamamos de "TIMESTAMP"

  // Por exemplo, o valor "1658587240" que representa um TIMESTAMP, se eu transformar este número 
  // em uma DATA/HORA, eu vou receber o seguinte resultado: 2022-07-23 15:40:40
  // Mais exemplos
  // 1. 1658587240 ----> 2022-07-23 15:40:40
  // 2. 1658587241 ----> 2022-07-23 15:40:41
  // 3. 1658587242 ----> 2022-07-23 15:40:42

  // Resumindo, o TIMESTAMP é um conjunto de números (1658587240 -> milissegundos)
  // e que a cada segundo/milissegundos o seu valor vai sendo incrementado.

  // Para saber mais sobre a história do TIMESTAMP, vocês podem consultar o link abaixo, é super interessante.
  // https://treinamento24.com/library/lecture/read/873865-como-funciona-o-timestamp
  // https://hkotsubo.github.io/blog/2019-05-02/o-que-e-timestamp

  // Para receber o TIMESTAMP da função "strtotime", temos que pedir para retornar o TIMESTAMP de algum momento no tempo.
  // O momento que queremos é o "agora + 1 segundo no futuro" ou seja o "now + 1 sec" ----> strtotime('now + 1 sec')
  // Fonte: https://www.php.net/manual/en/function.strtotime.php

  // Isto significa que a nossa mensagem só será exibida durante 1 segundo.
  $timestampNowPlus1Sec = strtotime('now + 1 sec');
  $_SESSION['flash_message_timestamp'] = $timestampNowPlus1Sec;
}


/**
 * Esta função exibe uma mensagem que será mantida por 1 segundo em uma sesssão no servidor.
 * Para que a mensagem seja exibida, a função 'set_flash_message' deverá ser
 * chamada antes, passando como argumento a mensagem que queremos exibir, para só depois com a 
 * função 'get_flash_message' exibirmos no ecrã a mensagem que foi mantida por 1 segundo.
 * 
 * @return void
 */
function get_flash_message() {
    // A condição abaixo testa se existe algum valor na chave 'flash_message'
    // da super global $_SESSION.
    // se não existir valores, retorna null (retorna vazio)
    if (empty($_SESSION['flash_message'])) {
        return null;
    }

    // ATENÇÃO: O código abaixo não será executado se o "return null" da condição acima
    // for executado, "return" siginfica "retorne e pare", não execute as linhas abaixo.

    // Iremos atribuir o valor da chave 'flash_message' que está na super global $_SESSION.
    // para dentro da variável $flashMessage
    $flashMessage = $_SESSION['flash_message'];

    // Iremos atribuir o conjunto de números que representa o TIMESTAMP deste exacto momento
    // dentro da variável $timestampNow
    $timestampNow = strtotime('now');

    // Iremos atribuir o valor da chave 'flash_message_timestamp' que está na super global $_SESSION.
    // para dentro da variável $timestampFlashMessage
    $timestampFlashMessage = $_SESSION['flash_message_timestamp'];

    // Se o TIMESTAMP que representa o agora (now) for superior ao TIMESTAMP que foi gravado
    // na chave 'flash_message_timestamp', então removemos as chaves
    // 'flash_message' e 'flash_message_timestamp' de dentro da super global $_SESSION.

    // A função "unset" nos casos que iremos usar logo abaixo
    // remove uma chave (chave do array associativo) de dentro da super global $_SESSION.
    // https://www.php.net/manual/en/function.isset.php
        
    /*
     *  Exemplo
     * 
     *  Array
     *  (
     *      [is_authenticated] => true
     *      [flash_message] => "Minha mensagem de teste"
     *      [flash_message_timestamp] => 1658591365
     *  )
     * 
     * Depois de usar a função "unset"
     *
     * unset($_SESSION['flash_message']);
     * unset($_SESSION['flash_message_timestamp']);
     * 
     * Vamos ter o resultado abaixo, mas reparem que as 2 chaves 'flash_message' e 'flash_message_timestamp'
     * desapareceram, ficando apenas a chave 'is_authenticated'.
     * 
     *  Array
     *  (
     *      [is_authenticated] => true
     *  )
     */
    if ($timestampNow > $timestampFlashMessage) {
        // Removemos a chave 'flash_message' de dentro da super global $_SESSION.
        unset($_SESSION['flash_message']);
        // Removemos a chave 'flash_message_timestamp' de dentro da super global $_SESSION.
        unset($_SESSION['flash_message_timestamp']);
        // retornamos o valor null (vazio)
        return null;
    } else {
        // Se entrar neste else, então retornamos a mensagem que foi gravada em sessão no servidor
        // durante o 1 segundo.
        return $flashMessage;
    }
}