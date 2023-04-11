<?php

define('MB',1048576);

function imageUploade($imageRequest){
    global $msgError;
    $imagename = rand(100,1000).$_FILES[$imageRequest]['name'];
    $imagetmp = $_FILES[$imageRequest]['tmp_name'];
    $imagesize = $_FILES[$imageRequest]['size'];
    $allowExt = array("jpeg","jpg","png","gif","mp3","pdf");
    $stringToarray = explode(".",$imagename);

    $ext = end($stringToarray);
    $ext = strtolower($ext);
    if(!empty($imagename) && !in_array($ext,$allowExt)){
        $msgError[] = "Ext";

    }
    if($imagesize > 2 * MB){
        $msgError[]="size";
    }
    if(empty($msgError)){
        move_uploaded_file($imagetmp,"../upload/" .$imagename);
        return $imagename;
    }else{
        echo "<pre>";
        print_r($msgError);
        echo "<pre>";
        return "fail";
    }

}

?>