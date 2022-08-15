Minha Primeira Aplicação/Sistema PHP - Backend
==============================

## User Story #1
No ficheiro `config.php`, defina três constantes com a função `define`, uma chamada `USER_LOGIN` com o valor `admin` e a outra constante chamada `USER_PASSWORD` com o valor `123456` e por último, uma chamada `PAGE_TITLE` com o valor `Exercício PHP N.03 - Minha Primeira Aplicação/Sistema PHP`

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">Considere sempre fazer suas próprias pesquisas antes de utilizar este recurso.</span>

<span style="font-size: 0.9rem">**Dica:** *Veja os vários materiais e exemplos que fizemos até agora, as vezes a solução poderá estar lá*.</span>

Solução

```php
<?php
// define uma constante chamada USER_LOGIN e atribui o valor 'admin'
define('USER_LOGIN', 'admin');
// define uma constante chamada USER_PASSWORD e atribui o valor '12345'
define('USER_PASSWORD', '12345');
// define uma constante chamada PAGE_TITLE e atribui o valor 'Exercício PHP N.03 - Minha Primeira Aplicação/Sistema PHP'
define('PAGE_TITLE', 'Exercício PHP N.03 - Minha Primeira Aplicação/Sistema PHP');
```

</details>

---

## User Story #2
No topo do ficheiro `index.php`, chame a função `session_start` para fazermos o uso de sessões

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
<?php
session_start();
```

</details>

---

## User Story #3
No `index.php`, importe os seguintes ficheiros por ordem com a instrução `require_once`.

1. **config.php**
2. functions/**url.php**


<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
/* Vamos importar o ficheiro de configuração */
require_once 'config.php';

/* 
 * Vamos importar os ficheiros da pasta "functions"
 * Nesta pasta iremos ter algumas funções úteis.
 * 
 * O objetivo é fazer reaproveitamento de código para
 * sermos mais produtivos na hora de escrever.
 */
require_once 'functions/url.php';
require_once 'functions/message.php';
```

</details>

---


## User Story #4
Todas as chaves e valores de uma query string podem ser consultadas dentro da super global `$_GET`

A estrutura de uma query string pode ser escrita da seguinte maneira

```
?nome=Maria
```

Ou poderá ser escrita assim para mais que uma **chave/valor**:

```
?nome=Maria&idade=46
```

Dentro do ficheiro `index.php`, verifique se a chave `route` da super global `$_GET` está vazia.

- **Se Verdadeiro**, dentro da condição `if`, crie uma variável chamada `$page` e atribua o valor `login`

- **Se Falso**, dentro da condição `else`, crie uma variável chamada `$page` e atribua o **valor da chave** `route` que está na super global `$_GET`

**Nota:** `login` é o nosso valor padrão.

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
if (empty($_GET['route'])) {
    $page = 'login';
} else {
    $page = $_GET['route'];
}
```

</details>

---

## User Story #5
Crie uma pasta chamada `controllers`, crie os seguintes ficheiros.

1. **authenticate.php**
2. **dashboard.php**
2. **logout.php**

```
.
└── minha-primeira-aplicacao-php/
    ├── index.php
    ├── config.php
    ├── templates/
    │   ├── head.php
    │   ├── foot.php
    │   ├── page_login.php
    │   ├── page_dashboard.php
    │   └── page_not_found.php
    └── functions/
        ├── message.php
        ├── url.php
        └── auth.php
    └── controllers/
        ├── authenticate.php
        ├── dashboard.php
        └── logout.php
```

## User Story #6
Dentro do ficheiro `index.php`, logo abaixo da primeira condição do `if`, crie uma estrutura de controle `switch`
que recebe como parâmetro a variável `$page` que testa o seguinte caso

1. Caso o valor de `$page` seja igual a string `"dashboard"`, então importe com a instrução `require_once` o ficheiro `dashboard.php` que está na pasta `controllers`

2. Caso o valor de `$page` seja igual a string `"authenticate"`, então importe com a instrução `require_once` o ficheiro `authenticate.php` que está na pasta `controllers`


3. Caso o valor de `$page` seja igual a string `"logout"`, então importe com a instrução `require_once` o ficheiro `logout.php` que está na pasta `controllers`


**Nota Importante:** Esta estrutura de controle `switch`, servirá como um `torre de controlo`, `validador` ou `polícia`.

Para facilitar o entendimento, nós iremos chamar este fluxo de `controllers`, portanto, antes mesmo de exibir a página solicitada, os nossos `controladores` ou `polícia`, fazem algumas validações `caso` entrem na estrutura de controlo `switch`.

Ao entrar na estrutura de controlo `switch`, algumas medidas serão tomadas caso os `polícias` detectem alguma `irregularidade`, como exemplo, tentar aceder a uma página na qual eu não tenha acesso por não estar autenticado ou não ter preenchido todas as informações de um formulário enviado.


<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
/* código de controlo */
switch ($page) {
    case 'dashboard':
        /* importa o controlador/polícia para o dashboard */
        require_once 'controllers/dashboard.php';
        break;
    case 'authenticate':
        /* importa o controlador/polícia para o authenticate */
        require_once 'controllers/authenticate.php';
        break;
    case 'logout':
        /* importa o controlador/polícia para o logout */
        require_once 'controllers/logout.php';
        break;
    
    default:
        /* Não faz nada. */
        break;
}

```

</details>

---

## User Story #7
Dentro do ficheiro `index.php`, crie uma variável chamada `$page_template` e atribua a string abaixo concatenando com o valor da variável `$page`. 

```
'templates/page_' . $page . '.php'
```

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
/**
 * Constroi o caminho do ficheiro concatenando com o valor que vem 
 * da variável $page.
 */
$page_template = 'templates/page_' . $page . '.php';
```

</details>

---

## User Story #8
Dentro do ficheiro `index.php`, importe o ficheiro `head.php` que está dentro na pasta templates.

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
/* Importa a parte HTML de cima do nosso template */
require_once 'templates/head.php';
```

</details>

---

## User Story #9
Dentro do ficheiro `index.php`, verifique se o valor atribuído na variável `$page_template` é um ficheiro e se ele existe.

- **Se Verdadeiro**, dentroda condição `if`, importe com a instrução `require_once` o ficheiro que está representado na variável `$page_template`.

- **Se Falso**, dentro da condição `else`, importe com a instrução `require_once` o ficheiro `page_not_found.php` que está na pasta templates.


<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
/* Importa a parte HTML do meio do nosso template */
if (file_exists($page_template)) {
    require_once $page_template;
} else {
    /* importa a página de erro 404 not found */
    require_once 'templates/page_not_found.php';
}
```

</details>

---

## User Story #10
Por último ainda no ficheiro `index.php`, importe com a instrução `require_once` o ficheiro `foot.php` que está dentro na pasta templates.

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
/* Importa a parte HTML de baixo do nosso template */
require_once 'templates/foot.php';
```

</details>

---