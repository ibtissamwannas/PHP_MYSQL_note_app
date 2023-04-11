<?php

require "../filestype.php";
include "../connect.php";

$noteid = filterRequest("noteid");
$title = filterRequest("title");
$content = filterRequest("content");
$image = filterRequest("image");
print_r($image);
// if(isset($_FILES('file'))){
deleteFile("../upload",$image);
    $image = imageUploade("file");
// }

$stmt = $con->prepare("UPDATE `notes` SET `note_title`=?,`note_content`=?,`note_image`=? WHERE `note_id`=? ");
$stmt->execute(array($title,$content,$image,$noteid));

$count = $stmt->rowCount();

if($count>0){
    echo json_encode((array("status" => "success")));
}else{
    echo json_encode(array("status"=>"fail"));
}
?>