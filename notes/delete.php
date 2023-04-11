<?php
include "../connect.php";


$noteid = filterRequest("noteid");
$image = filterRequest("imagename");

$stmt = $con->prepare("DELETE FROM notes where `note_id` = ?");
$stmt->execute(array($noteid));

$count = $stmt->rowCount();

if($count>0){
    deleteFile("../upload",$image);
    echo json_encode((array("status" => "success")));
}else{
    echo json_encode(array("status"=>"fail"));
}
?>