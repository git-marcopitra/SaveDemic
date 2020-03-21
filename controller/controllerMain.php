<?
app::controller();
class Main extends Controller {
    function index(){
        $this->callView('/main','index');
    }
}