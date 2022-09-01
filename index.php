<?php
session_start();



require_once 'config.php';


require_once 'functions/url.php';
require_once 'functions/message.php';
require_once 'functions/auth.php';


if (empty($_GET['route'])) {
    $page = 'login';
} else {
    $page = $_GET['route'];
}



switch ($page) {
    case 'dashboard':

        require_once 'controllers/dashboard.php';
        break;
    case 'authenticate':

        require_once 'controllers/authenticate.php';
        break;
    case 'logout':

        require_once 'controllers/logout.php';
        break;

    default:

        break;
}


$page_template = 'templates/page_' . $page . '.php';


require_once 'templates/head.php';



if (file_exists($page_template)) {
    require_once $page_template;
} else {

    require_once 'templates/page_not_found.php';
}

require_once 'templates/foot.php';
