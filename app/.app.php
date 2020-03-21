<?php
class app{
    public static $modules;
    public static $basepath;
    public static $referer;
    public static $project;
    public static $projectTitle;
    public static $module_uri;
    public static $action_uri;
    public static $params_uri;

    public static function notFound(){
        $control = new ErrorType();
        $control->notFound();
        unset($control);
    }

    public static function callPage($_module, $_action) {
        $control = new $_module();
        $control->$_action();
        unset($control);
    }

    public static function goToHome($_module, $_action){
        header('Location: '.app::$referer."/$_module/$_action");
    }

    public static function route($_module, $_actions){
        app::$modules[$_module] = $_actions;
    }

    public static function controller(){
        require_once(app::$basepath.'/app/.system/controller.php');
    }

}
