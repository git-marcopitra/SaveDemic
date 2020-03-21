<?php 


require_once(app::$basepath."/view/includes/header.phtml");

$kmods = array_keys(app::$modules);
$mods = app::$modules;
$mod = isset(app::$module_uri)?app::$module_uri : '';

if(in_array($mod, $kmods)) {

    $acts = $mods[$mod];
    $act = isset(app::$action_uri)?app::$action_uri : '';
    
    if(in_array($act,$acts)) {
        app::callPage($mod, $act);
    }
    elseif($act == ''){
        app::callPage($module, 'index');
    }
    else {
        app::notFound();
    }
}
elseif($mod == ''){
    app::callPage($kmods[0],'index');
}
else{
    app::notFound();
}



require_once(app::$basepath."/view/includes/footer.phtml");