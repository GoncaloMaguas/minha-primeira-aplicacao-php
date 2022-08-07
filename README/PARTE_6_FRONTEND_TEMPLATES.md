Minha Primeira Aplicação/Sistema PHP - Templates


## User Story #1
Dentro do ficheiro `style.css` que está na pasta `public/css`, crie a estrutura CSS abaixo

<details>
    <summary>Ver Estrutura</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Estrutura
```css
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body, html {
    font-family: system-ui;
    font-size: 14px;
}

/* utils */
.horizontal-line {
    margin: 5px 0;
    border-bottom: solid 1px #c3c3c3;
}

/* flex */
.flex {
    display: flex;
}

.flex-justify-space-between {
    justify-content: space-between;
}

.flex-col {
    flex-direction: column;
}

.page {
    padding: 5px;
    max-width: 980px;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}

/* menu */
.menu {
    width: 100%;
    background-color: #1a237e;
    border-radius: 2px;
}

.menu ul {
    height: 100%;
    
    display: flex;
    align-items: center;
}

.menu li {
    list-style-type: none;
    padding: 15px;
    transition: background-color 500ms ease;
}

.menu li:hover {
    background-color: #3949ab;
}

.menu a {
    color: white;
    text-decoration: none;
}

.menu a:hover {
    text-decoration: underline;
}

/* form */
.form .form-group {
    margin-bottom: 8px;    
}

.form input {
    width: 100%;
    border: solid 2px #9fa8da;
    outline: none;
    border-radius: 3px;
    padding: 8px;
}

.form button {
    cursor: pointer;
    background-color: #283593;
    border: solid 1px #283593;
    color: white;
    border-radius: 3px;
    padding: 5px 15px;
    font-size: 1rem;
}

.form button:hover {
    opacity: 0.9;
}

/* form-login */
.form-login {
    max-width: 480px;
    width: 100%;
}

/* flash-messages */
.flash-messages {
    background-color: #e65100;
    padding: 8px;
    border-radius: 3px;
    color: white;
}
```

</details>

---

## User Story #2
Dentro do ficheiro `head.php` que está na pasta `templates`, crie a estrutura HTML abaixo

<details>
    <summary>Ver Estrutura</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Estrutura
```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo PAGE_TITLE; ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <div class="page">
            <nav class="menu flex flex-justify-space-between">
                <ul>
                    <li>
                        <a href="?route=home">Home</a>
                    </li>
                    <li>
                        <a href="?route=about">Sobre Nós</a>
                    </li>
                    <li>
                        <a href="?route=contact">Contacto</a>
                    </li>
                </ul>
                <ul>
                <?php if (is_authenticated()) : ?>
                    <!-- Este "li" só será exibido caso eu tenha me autenticado -->
                    <li>
                        <a href="?route=dashboard">Dashboard</a>
                    </li>
                <?php endif; ?>
                    <li>
                <?php if (is_authenticated()) : ?>
                        <!-- Este hyperlink só será exibido caso eu tenha me autenticado -->
                        <a class="user-login-button" href="?route=logout">Fazer Logout</a>
                <?php else : ?>
                        <!-- Este hyperlink só será exibido caso eu não tenha me autenticado -->
                        <a class="user-login-button" href="?route=login">Fazer Login</a>
                <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <?php if (get_flash_message()) : ?>
        <div class="page">
            <div class="flash-messages">
                <p><?php echo get_flash_message(); ?></p>
            </div>
        </div>
    <?php endif; ?>
```

</details>

--- 
**Nota:** Reparem que temos 3 blocos PHP, cada um dos blocos com uma condição `if`

1. Para o **primeiro** `if`, estamos `verificando` o retorno da função `is_authenticated()`
- Se **VERDADEIRO**, então mostramos o elemento `li` abaixo.
```html
<?php if (is_authenticated()) : ?>
    <!-- Este "li" só será exibido caso eu tenha me autenticado -->
    <li>
        <a href="?route=dashboard">Dashboard</a>
    </li>
<?php endif; ?>
```

---

2. Para o **segundo** `if`, estamos `verificando` o retorno da função `is_authenticated()`
- Se **VERDADEIRO**, então mostramos o `hyperlink` abaixo.

```html
<!-- Este hyperlink só será exibido caso eu tenha me autenticado -->
<a class="user-login-button" href="?route=logout">Fazer Logout</a>
```

- Se **FALSO**, então mostramos o outro `hyperlink` abaixo.
```html
<!-- Este hyperlink só será exibido caso eu não tenha me autenticado -->
<a class="user-login-button" href="?route=login">Fazer Login</a>
```

*Notem que o **href** e o **texto** de cada hyperlink acima é diferente*

---

3. Para o **terceiro** e último `if`, estamos `verificando` o retorno da função `get_flash_message()`
- Se retornar uma `string/mensagem`, ou seja **VERDADEIRO**, então mostramos o conteúdo retornado da função.
```html
<?php if (get_flash_message()) : ?>
     <div class="page">
         <div class="flash-messages">
             <p><?php echo get_flash_message(); ?></p>
         </div>
     </div>
<?php endif; ?>
```

---

## User Story #3
Dentro do ficheiro `foot.php` que está na pasta `templates`, crie a estrutura HTML abaixo

<details>
    <summary>Ver Estrutura</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Estrutura
```html
</body>
</html>
```

</details>

---

## User Story #4
Dentro do ficheiro `page_login.php` que está na pasta `templates`, crie a estrutura HTML abaixo

<details>
    <summary>Ver Estrutura</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Estrutura
```html
<div class="page">
    <form action="?route=authenticate" method="POST" class="form form-login">
        <h1>Área reservada</h1>
        <div class="horizontal-line"></div>
        <div class="form-group flex flex-col">
            <label for="username">Utilizador:</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-group flex flex-col">
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <button>Login</button>
        </div>
    </form>
</div>
```

</details>

---

## User Story #5
Dentro do ficheiro `page_dashboard.php` que está na pasta `templates`, crie a estrutura HTML abaixo

<details>
    <summary>Ver Estrutura</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Estrutura
```html
<div class="page">
    <h1>Bem vindo ao Dashboard</h1>
    <div class="horizontal-line"></div>
    <p>Esta página só será exibida apenas se o utilizador fizer uma autenticação bem-sucedida</p>
</div>
```

</details>

---

## User Story #6
Dentro do ficheiro `page_not_found.php` que está na pasta `templates`, crie a estrutura HTML abaixo

<details>
    <summary>Ver Estrutura</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Estrutura
```html
<div class="page">
    <h1>404 - Page Not Found</h1>
    <div class="horizontal-line"></div>
    <p>A página solicitada não existe.</p>
</div>
```

</details>