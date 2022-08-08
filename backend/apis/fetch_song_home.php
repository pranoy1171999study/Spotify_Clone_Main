<?php
include "allowHeader.php";
$output=new stdClass;
$output->status=false;
$output->path=$url;
$output->data="null";
$sql="SELECT * FROM songs ORDER BY id DESC LIMIT 20";//LIMIT 20   WHERE title IS NOT NULL AND audio IS NOT NULL AND image IS NOT NULL
include "../config.php";
$result=mysqli_query($conn,$sql) or die(json_encode($output));
if(mysqli_num_rows($result)>0)
{
    $output->status=true;
    $output->data=mysqli_fetch_all($result,MYSQLI_ASSOC);
}
echo json_encode($output);
?>