<?php 

@session_start();//Instaciar uma sessão

require_once("./app/custom/routes.php");
require_once('./app/custom/details.php');

app::$basepath = $_SERVER['DOCUMENT_ROOT'].'/'.app::$project; //Definir caminho no disco

app::$referer = '/'.app::$project.'/index.php'; //Definir caminhos no browser

foreach (app::$modules as $module => $actions){
    require_once(app::$basepath.'/controller/controller'.$module.'.php'); //Including Controllers
}

if(!empty($_SERVER['PATH_INFO'])){ //Receber o URI
    $uri = $_SERVER['PATH_INFO'];
    $uriPart = explode("/", $uri); //Separando a URI pelas barras invertidas
    app::$module_uri = $uriPart[1];
    app::$action_uri = $uriPart[2];
    app::$params_uri = !empty($uriPart[3]) ? $uriPart[3] : null;
}

