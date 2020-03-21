<!--?php
require_once($GLOBALS['basepath'].'model/modelProf.php');
require_once($GLOBALS['basepath'].'model/modelTecLab.php');
class log {
    function logIn(){
        if(empty($_SESSION)){
            require_once $GLOBALS['basepath']."view/login/login.phtml";
            if(isset($_POST['submeter'])) {
                $data['email'] = $_POST['user'];
                $data['pass'] = $_POST['pass']; 
                $prof = new ModelProf();
                $tec = new ModelTecLab();
                $logerProf = $prof->login($data);
                $logerTec = $tec->login($data);
                if($data = $logerProf->fetch(PDO::FETCH_ASSOC)){
                    $_SESSION['access'] = 'prof';
                    $_SESSION['id'] = $data['idProf'];
                    header('Location: '.$GLOBALS['referer']."/prof/home");
                }
                else if($data = $logerTec->fetch(PDO::FETCH_ASSOC)){
                    $_SESSION['access'] = 'admin'; 
                    $_SESSION['id'] = $data['idTecLab'];
                    header('Location: '.$GLOBALS['referer']."/admin/home");
                }
                else{
                    echo $erro;
                }
            }
        }
        else if($_SESSION['access'] == 'prof')
            header('Location: '.$GLOBALS['referer'].'/prof/home');
        else if($_SESSION['access'] == 'admin')
            header('Location: '.$GLOBALS['referer'].'/admin/home');  
        else
            $this->logOut();
    }
    function logOut(){
        session_destroy();
        header('Location: '.$GLOBALS['referer']);
    }
    function signIn(){
        //Requerindo a view
        if(empty($_SESSION)){
            require_once $GLOBALS['basepath']."view/login/login.phtml";
            /*if(isset($_POST['submeter'])) {
                $data['email'] = $_POST['user'];
                $data['pass'] = $_POST['pass']; 
                $prof = new ModelProf();
                $tec = new ModelTecLab();
                $logerProf = $prof->login($data);
                $logerTec = $tec->login($data);
                if($data = $logerProf->fetch(PDO::FETCH_ASSOC)){
                    $_SESSION['access'] = 'prof';
                    $_SESSION['id'] = $data['idProf'];
                    header('Location: '.$GLOBALS['referer']."/prof/home");
                }
                else if($data = $logerTec->fetch(PDO::FETCH_ASSOC)){
                    $_SESSION['access'] = 'admin'; 
                    $_SESSION['id'] = $data['idTecLab'];
                    header('Location: '.$GLOBALS['referer']."/admin/home");
                }
                else{
                    echo $erro;
                }
            }*/
        }
        else if($_SESSION['access'] == 'prof')
            header('Location: '.$GLOBALS['referer'].'/prof/home');
        else if($_SESSION['access'] == 'admin')
            header('Location: '.$GLOBALS['referer'].'/admin/home');  
        else
            $this->logOut();
    }

}-->