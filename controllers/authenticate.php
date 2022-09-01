<?php


if (empty($_POST['username']) || empty($_POST['password'])) {

    set_flash_message("Todos os campos são de preenchimento obrigatório!");


    url_redirect(['route' => 'login']);
}



$login = $_POST['username'];


$password = $_POST['password'];



if ($login == USER_LOGIN && $password == USER_PASSWORD) {

    $_SESSION['is_authenticated'] = true;


    set_flash_message("Utilizador autenticado com sucesso!");

    url_redirect(['route' => 'dashboard']);


} else if ($login == USER_LOGIN && $password != USER_PASSWORD) {
    set_flash_message("Utilizador correto mas senha incorreta, tente novamente!");

    url_redirect(['route' => 'login']);


} else if ($login != USER_LOGIN && $password == USER_PASSWORD) {
    set_flash_message("Senha correta mas utilizador incorreto, tente novamente!");

    url_redirect(['route' => 'login']);


} else {

    set_flash_message("Utilizador ou senha incorreta, tente novamente!");


    url_redirect(['route' => 'login']);
}
