<?php
include "allowHeader.php";

$output=new stdClass;
$output->status=false;
$output->path=$url;
$output->data="null";
$sql="SELECT * FROM album WHERE sort_path IS NOT NULL ORDER BY id DESC LIMIT 10";
include "../config.php";
$result=mysqli_query($conn,$sql) or die(json_encode($output));
if(mysqli_num_rows($result)>0)
{
    $output->status=true;
    $output->data=mysqli_fetch_all($result,MYSQLI_ASSOC);
}
echo json_encode($output);
?>