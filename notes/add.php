<?php
require "../filestype.php";
include "../connect.php";

$title = filterRequest("title");
$content = filterRequest("content");
$userid = filterRequest("userid");
$image = imageUploade("file");

if($image!='fail'){

$stmt = $con->prepare("INSERT INTO `notes` (`note_title`, `note_content`,`note_image` ,`notes_users`) VALUES (?,?,?,?)  ");
$stmt->execute(array($title,$content,$image,$userid));

$count = $stmt->rowCount();

if($count>0){
    echo json_encode((array("status" => "success")));
}else{
    echo json_encode(array("status"=>"fail"));
}
}else{
    echo json_encode(array("status"=>"fail"));
}
?>