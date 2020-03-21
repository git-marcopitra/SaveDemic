<?php
class Controller {
    function callView($_path,$_view){
        require_once(app::$basepath."/view$_path/$_view.phtml");
    }
}