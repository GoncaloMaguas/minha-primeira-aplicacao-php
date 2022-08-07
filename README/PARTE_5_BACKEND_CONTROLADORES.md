Minha Primeira Aplicação/Sistema PHP - Controladores
==============================

## User Story #1
Dentro do ficheiro `authenticate.php` que está na pasta `controllers`, crie uma condição `if` e verifique
se as chaves `username` **OU** `password` que estão dentro da super global `$_POST` estão vazias.

1. Se **VERDADEIRO**
- Chame a função `set_flash_message` e passe a string `"Todos os campos são de preenchimento obrigatório!"` como argumento para a função.
- Chame a função `url_redirect` e passe um array associativo com a chave `route` e o valor `login` como argumento para a função.

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução
```php
<?php

/**
 * Na condição abaixo testamos se as chaves da super global $_POST estão
 * vazios.
 * 
 * se VERDADEIRO, então criamos umas mensagem com a função "set_flash_message"
 * para ser mostrada na página de login logo após o redirecionamento
 * com a função "url_redirect".
 * 
 * Nota: a mensagem só ficará disponível por 1 segundo, depois disso após refrescar a
 * página a mensagem irá sumir.
 * 
 * Nota: Para saber o que cada umas das funções abaixo faz, veja os comentários 
 * que estão dentro do ficheiro 'functions/url.php' e 'functions/message.php'
 */
if (empty($_POST['username']) || empty($_POST['password'])) {
    /* Disparamos uma mensagem com a indicação abaixo */
    set_flash_message("Todos os campos são de preenchimento obrigatório!");
    
    /* Redirecionamos o utilizador para a página de login */
    url_redirect(['route' => 'login']);
}
```

</details>

---

## User Story #2
Dentro do ficheiro `authenticate.php`.

1. Crie uma variável chamada `$login` e atribua o valor da chave `username` que está dentro da super global `$_POST`.

2. Crie uma variável chamada `$password` e atribua o valor da chave `password` que está dentro da super global `$_POST`.

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução
```php
/* Iremos buscar as chaves 'username' e 'password' que estão dentro da super global $_POST */
/* Iremos atribuir o valor da chave 'username' para a variável $login */
$login = $_POST['username'];

/* Iremos atribuir o valor da chave 'password' para a variável $password */
$password = $_POST['password'];
```

</details>

---

## User Story #3
Dentro do ficheiro `authenticate.php`, crie uma condição `if` e verifique.

Se o valor da variável `$login` for igual ao valor da constante `USER_LOGIN` **E** o valor da variável `$password` for igual ao valor da constante `USER_PASSWORD`


1. Se **VERDADEIRO**
- Crie uma chave chamada `is_authenticated` na super global $_SESSION e atribua um valor boleano `true`
- Chame a função `set_flash_message` e passe a string `"Utilizador autenticado com sucesso!"` como argumento para a função.
- Chame a função `url_redirect` e passe um array associativo com a chave `route` e o valor `dashboard` como argumento para a função.
2. Se **FALSO**
- Chame a função `set_flash_message` e passe a string `"Utilizador ou senha incorreta, tente novamente!"` como argumento para a função.
- Chame a função `url_redirect` e passe um array associativo com a chave `route` e o valor `login` como argumento para a função.

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução
```php
/**
 * Na condição abaixo testamos se o valor das variáveis $login e $password são iguais
 * aos valores das constantes USER_LOGIN e USER_PASSWORD que que foram criadas no ficheiro config.php
 * 
 * se VERDADEIRO, então criamos uma chave chamada 'is_authenticated' dentro da super global 
 * $_SESSION e guardamos um valor boleano (true).
 * 
 * Logo a seguir, redirecionamos o utilizador para a página dashboard.
 */
if ($login == USER_LOGIN && $password == USER_PASSWORD) {
    /* Criamos uma chave chamda 'is_authenticated' na super global $_SESSION e guardamos um valor boleano (true) */
    $_SESSION['is_authenticated'] = true;

    /* Disparamos uma mensagem com a indicação abaixo */
    set_flash_message("Utilizador autenticado com sucesso!");

    /* Redirecionamos o utilizador para a página de dashboard */
    url_redirect(['route' => 'dashboard']);
} else {
    /* Disparamos uma mensagem com a indicação abaixo */
    set_flash_message("Utilizador ou senha incorreta, tente novamente!");

    /* Redirecionamos o utilizador para a página de login */
    url_redirect(['route' => 'login']);
}

```

</details>

---

## User Story #4
Dentro do ficheiro `dashboard.php` que está na pasta `controllers`, crie uma condição `if` e verifique o retorno da função `is_authenticated()`

1. Se **FALSO**
- Chame a função `set_flash_message` e passe a string `"Acesso negado: Faça login para ter acesso a esta página."` como argumento para a função.
- Chame a função `url_redirect` e passe um array associativo com a chave `route` e o valor `login` como argumento para a função.

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução
```php
<?php

/**
 * Na condição abaixo verificamos o retorno da função is_authenticated().
 * 
 * Se DIFERENTE de VERDADEIRO, então executamos o código que está entre chaves.
 */
if (!is_authenticated()) {
    /* Disparamos uma mensagem com a indicação abaixo */
    set_flash_message('Acesso negado: Faça login para ter acesso a este conteúdo.');

    /* Redirecionamos o utilizador para a página de login */
    url_redirect(['route' => 'login']);
}
```

</details>

---

## User Story #5
Dentro do ficheiro `logout.php` que está na pasta `controllers`, destrua a sessão chamando a função `session_destroy`, em seguida, chame a função `url_redirect`passando um array associativo com a chave `route` e o valor `login` como argumento para esta função.


<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução
```php
<?php
 
/**
 * Destruímos a nossa sessão atual, isto significa que a super global $_SESSION
 * será resetada, tudo será removido.
 */
session_destroy();

/* Redirecionamos o utilizador para a página de login */
url_redirect(['route' => 'login']);
```

</details>