<?php

if (!is_authenticated()){
    set_flash_message("Acesso negado: Faça login para ter acesso a este conteúdo.");
    url_redirect(["route" => "login"]);
}