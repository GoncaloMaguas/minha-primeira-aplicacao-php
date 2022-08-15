<?php

session_start();

require "config.php";
require "functions/url.php";

if (empty($GET["route"])){
    $page="login";
} else {
    $page=$GET_["route"];
}


switch($page){
    case "dashboard":

    require_once ("controllers/dashboard.php");
    break;

    case "authenticate":

    require_once ("controllers/authenticate.php");
    break;


    case "logout":

    require_once ("controllers/logout.php");
    break;
    
}

$page_template= "templates/page_" . $page . ".php";

require_once ("templates/head.php");

if($page_template != NULL){  //diferente parte 4 story 9

        require_once ($page_template);
} else {
    require_once ("templates/page_not_found.php");
}


require_once ("templates/foot.php");
