<?php
    function validColor($color){
        global $f3;
        return in_array($color, $f3->get('colors'));
    }

    function validString(){
        global $f3;
        return is_string($f3->get('animal'));
    }