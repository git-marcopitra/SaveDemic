<?php

app::controller();

class ErrorType extends Controller {
    function notFound(){
        $this->callView('','notFound');
    }

    function denied(){
        $this->callView('','accessDenied');
    }
}