<?php
function filterRequest($requestname){
 return  htmlspecialchars(strip_tags($_POST[$requestname]));
}

function deleteFile($dir,$filename){
    if(file_exists($dir. "/" . $filename)){
        unlink($dir. "/" . $filename);
    }else{
    }
}

function checkAuthenticate(){
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {

        if ($_SERVER['PHP_AUTH_USER'] != "ibtissam" ||  $_SERVER['PHP_AUTH_PW'] != "sam12345"){
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }
}
?>